<?php

namespace App\Http\Controllers;

use App\Home;
use App\Home1;
use App\Paypal;
use App\Fondatrice;
use App\Event;
use App\Home2;
use App\Membre;
use App\Top;
use App\About;
use App\News;
use App\Newsletter;
use App\Client;
use App\Partenaire;
use App\Shop;
use App\Media;
use App\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use Stripe\Stripe;
use App\Category;

class PagesController extends Controller
{
    public function getIndex(){
        $info = Home::all();
        $post = Home1::all();
        $contenus = Home2::all();
        $members = Membre::limit(3)->get();
        $partenaires = Partenaire::limit(4)->get();
        $medias = Media::limit(4)->get();
        $events = Event::orderBy('created_at', 'DESC')->limit(2)->get();
        return view('pages.pages.index', compact('events','info', 'contenus', 'post', 'members', 'partenaires', 'medias'));
    }
    public function postIndex(Request $request){
        $this->validate($request, [
            'email' => 'required|unique:newsletters'
        ]);
        $news = new Newsletter();
        $news->email = $request->get('email');
        $news->token = str_replace('/', '', bcrypt(str_random(16)));
        $news->save();
        Session::flash('success', 'Merci pour votre inscription, vous allez maintenant recevoir des newsletters');
        return redirect()->back();
    }


    public function getShop(){
        $shops = Shop::orderBy('created_at', 'DESC')->paginate(20);
        $tops = Top::limit(3)->get();
        return view('pages.pages.shop', compact('shops', 'tops'));
    }

    public function getMembers() {
        $categories = Category::all();
        return view('pages.pages.members', compact('categories'));
    }

    public function getList($name, $id) {
        $category = Category::find($id);
        if($category) {
            $members = $category->membre;
            return view('pages.pages.members-list', compact('category', 'members'));
        }
        return redirect()->back();
    }

    public function profile($name, $id) {
        $member = Membre::find($id);
        if($member){
            return view('pages.pages.profile', compact('member'));
        }
        return redirect()->back();
    }



    public function showUnsubscribe($id, $token){
        return view('registration.unsubscribe', ['id' => $id, 'token' => $token]);
    }
    public function postUnsubscribe($id, $token){
        $news = Newsletter::where('id', $id)->where('token', $token)->first();
        if($news){
            $user = Newsletter::find($id);
            $user->delete();
            return redirect()->back()->with('success', 'Vous vous êtes desabonné avec succès');
        }else{
            return redirect()->back()->with('error', 'Aucun utilisateur n\'a été trouvé avec ces informations');
        }
    }
    public function getEvent(){
        $events = Event::orderBy('created_at', 'DESC')->paginate(1);
        return view('pages.pages.event', compact('events'));
    }


    public function getNews(){
        $medias = Media::all();
        return view('pages.pages.news', compact('medias'));
    }


    public function getFondatrice(){
        $fondatrice = Fondatrice::all();
        return view('pages.pages.fondatrice', compact('fondatrice'));
    }


    public function getAbout(){
        $abouts = About::all();
        return view('pages.pages.about', compact('abouts'));
    }


    public function getPartenaire(){
        $partenaires = Partenaire::all();
        return view('pages.pages.partenaire', compact('partenaires'));
    }

    public function getInscription(){
        return view('registration.inscription');
    }

    public function getItem($id){
        $shop = Shop::find($id);
        if($shop){
            return view('pages.pages.item', compact('shop'));
        }else{
            return redirect()->back();
        }
    }

    public function getAjoutPanier(Request $request, $id){
        $shop = Shop::find($id);
        $ancientPanier = Session::has('panier') ? Session::get('panier') : null;
        $panier = new Panier($ancientPanier);
        if($shop){
            $panier->add($shop, $shop->id);
        }
        $top = Top::find($id);
        if($top){
            $panier->add($top, $top->id);
        }
        $request->session()->put('panier', $panier);
        return redirect()->route('panier');
    }
    public function getReduirePanier($id){
        $ancientPanier = Session::has('panier') ? Session::get('panier') : null;
        $panier = new Panier($ancientPanier);
        $panier->reduceByOne($id);
        if(count($panier->items) > 0){
            Session::put('panier', $panier);
        }else{
            Session::forget('panier');
        }
        return redirect()->route('panier');
    }
    public function getPanier(){
        if(!Session::has('panier')){
            return view('pages.pages.panier', ['shops' => null]);
        }
        $ancientPanier = Session::get('panier');
        $panier = new Panier($ancientPanier);
        return view('pages.pages.panier', ['shops' => $panier->items, 'totalPrice' => $panier->totalPrice]);
    }

    public function getPayment(){
        if(!Session::has('panier')){
            return redirect()->back();
        }
        $ancientPanier = Session::get('panier');
        $panier = new Panier($ancientPanier);
        return view('pages.pages.payment', ['shops' => $panier->items, 'totalPrice' => $panier->totalPrice]);
    }
    public function postPayment(Request $request){
        if(!Session::has('panier')){
            return redirect()->back();
        }
        $ancientPanier = Session::get('panier');
        $panier = new Panier($ancientPanier);
        $price = $panier->totalPrice;

        // Validate Request
        $this->validate($request, [
           'nom' => 'required|max:155|string',
           'prenom' => 'required|max:100|string',
           'username' => 'required|max:100|string',
           'email' => 'required|email',
            'adresse_1' => 'required',
            'telephone' => 'required|numeric',
            'pays' => 'required',
            'ville' => 'required',
            'zip' => 'required'
        ]);

        $key = env('STRIPE_SECRET_KEY');
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey("$key");

        \Stripe\Customer::create(array(
            'description' => 'Achat sur MamaKitoko',
            'email' => $request->get('email')
        ));
        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        try{
            $charge = \Stripe\Charge::create([
                'amount' => $price * 100,
                'currency' => 'eur',
                'description' => 'Achat sur MamaKitoko',
                'source' => $token,
            ]);
            $client = new Client();
            $client->nom = $request->get('nom');
            $client->prenom = $request->get('prenom');
            $client->username = $request->get('username');
            $client->email = $request->get('email');
            $client->telephone = $request->get('telephone');
            $client->adresse_1 = $request->get('adresse_1');
            $client->adresse_2 = $request->get('adresse_2');
            $client->pays = $request->get('pays');
            $client->ville = $request->get('ville');
            $client->zip = $request->get('zip');
            $client->charge_id = $charge->id;
            $client->montant = $charge->amount;
            $client->panier = serialize($panier);
            $client->token = str_replace('/', '', bcrypt(str_random(16)));
            $client->save();
        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
        $token = urlencode($client->token);
        $id = $client->id;
        Session::forget('panier');
        return redirect("/payement/approved/{$token}/{$id}")->with('success', 'Votre payement a été accepté');
    }
    public function getApproved($token, $id){
        $var = Client::where('token', $token)->where('id', $id)->first();
        if($var){
            $client = Client::find($id);
            $panier = unserialize($client->panier);
            return view('pages.pages.success', compact('client', 'panier'));
        }else{
            return redirect()->route('panier')->with('error', 'Vous n\'avez pas fait d\'achat ');
        }
    }

    public function getConnexion(){
        return view('registration.connexion');
    }


    public function getPaypal(){
        if(!Session::has('panier')){
            return redirect()->back();
        }
        $ancientPanier = Session::get('panier');
        $panier = new Panier($ancientPanier);
        $price = $panier->totalPrice;




        $id = env('PAYPAL_API_KEY');
        $secret = env('PAYPAL_SECRET_KEY');
        $apiContext = new ApiContext(
            new OAuthTokenCredential($id, $secret)
        );




        $list = new ItemList();
        foreach ($panier->items as $paniers){
            $item = (new Item())
                ->setName($paniers['item']['titre'])
                ->setPrice($paniers['item']['prix'])
                ->setCurrency('EUR')
                ->setQuantity($paniers['qty'])
                ->setDescription('Achat sur Mama Kitoko');
            $list->addItem($item);
        }
        $details = (new Details())
            ->setSubtotal($price);


        $amount = (new Amount())
            ->setTotal($price)
            ->setCurrency("EUR")
            ->setDetails($details);

        $transaction = (new Transaction())
            ->setItemList($list)
            ->setDescription('Achat sur Mama Kitoko')
            ->setAmount($amount)
            ->setCustom('demo-1');


        $payment = new Payment();
        $payment->setTransactions([$transaction]);


        $payment->setIntent('sale');
        $redirectUrls = (new RedirectUrls())
            ->setReturnUrl('https://test.mamakitoko.com/paypal')
            ->setCancelUrl('https://test.mamakitoko.com/panier');
        $payment->setRedirectUrls($redirectUrls);
        $payment->setPayer((new Payer())->setPaymentMethod('paypal'));

        try{
            $payment->create($apiContext);
            header('Location: '.$payment->getApprovalLink());
        }catch (PayPalConnectionException $e){
            echo $e->getData();
        }




    }

    public function getPaypalPayment(Request $request){
        if(!Session::has('panier')){
            return redirect()->back();
        }
        $ancientPanier = Session::get('panier');
        $panier = new Panier($ancientPanier);
        $price = $panier->totalPrice;


        $id = env('PAYPAL_API_KEY');
        $secret = env('PAYPAL_SECRET_KEY');
        $apiContext = new ApiContext(
            new OAuthTokenCredential($id, $secret)
        );
        $payment = Payment::get($request->paymentId, $apiContext);
        $execution = (new PaymentExecution())
            ->setPayerId($request->PayerID)
            ->setTransactions($payment->getTransactions());

        try
        {
            $payment->execute($execution, $apiContext);
            if($payment->getState() === 'approved'){
                if($payment->getTransactions()[0]->getAmount()->getTotal() == $price){
                    $paypal = new Paypal();
                    $paypal->name = $payment->getPayer()->getPayerInfo()->getFirstName();
                    $paypal->lastName = $payment->getPayer()->getPayerInfo()->getLastName();
                    $paypal->email = $payment->getPayer()->getPayerInfo()->getEmail();
                    $paypal->payer_id = $payment->getPayer()->getPayerInfo()->getPayerId();
                    $paypal->country_code = $payment->getPayer()->getPayerInfo()->getCountryCode();
                    $paypal->city = $payment->getTransactions()[0]->getItemList()->getShippingAddress()->getCity();
                    $paypal->postal_code = $payment->getTransactions()[0]->getItemList()->getShippingAddress()->getPostalCode();
                    $paypal->address_1 = $payment->getTransactions()[0]->getItemList()->getShippingAddress()->getLine1();
                    $paypal->address_2 = $payment->getTransactions()[0]->getItemList()->getShippingAddress()->getLine2();
                    $paypal->state = $payment->getTransactions()[0]->getItemList()->getShippingAddress()->getState();
                    $paypal->phone = $payment->getTransactions()[0]->getItemList()->getShippingAddress()->getPhone();
                    $paypal->amount = $payment->getTransactions()[0]->getAmount()->getTotal();
                    $paypal->phone = $payment->getPayer()->getPayerInfo()->getPhone();
                    $paypal->items = serialize($payment->getTransactions()[0]->getItemList());
                    $paypal->token = str_replace('/', '', bcrypt(str_random(16)));
                    $paypal->save();
                    $token = urlencode($paypal->token);
                    $id = $paypal->id;
                    Session::forget('panier');
                    return redirect("/payement/paypal/approved/{$token}/{$id}")->with('success', 'Votre payement a été accepté');
                }else{
                    return redirect()->route('payment')->with('error', 'Transaction Inconnue');
                }
            }else{
                return redirect()->route('payment')->with('error', 'Vérifier vos informations');
            }
        }
        catch (PayPalConnectionException $e)
        {
            echo $e->getMessage();
        }


    }

    public function getPaypalApproved($token , $id){
        $var = Paypal::where('token', $token)->where('id', $id)->first();
        if($var){
            $paypal = Paypal::find($id);
            $panier = unserialize($paypal->items);
            return view('pages.pages.paypal-success', compact('paypal', 'panier'));
        }else{
            return redirect()->route('panier')->with('error', 'Vous n\'avez pas fait d\'achat ');
        }
    }
}
