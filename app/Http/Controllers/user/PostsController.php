<?php
namespace App\Http\Controllers\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use App\Cotisation;

class PostsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function getPayment(){
        return view('admin.user.pages.payement');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->cotisation;
        return view('admin.user.pages.index', compact('user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $key = env('STRIPE_SECRET_KEY');
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey("$key");

        \Stripe\Customer::create(array(
            'description' => 'client',
            'email' => 'gjacksongomez@gmail.com'
        ));
        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['token'];
        try{
            $charge = \Stripe\Charge::create([
                'amount' => 181 * 100,
                'currency' => 'eur',
                'description' => 'Example charge',
                'source' => $token,
            ]);
            $cotisation = new Cotisation();
            $cotisation->name = Auth::user()->name;
            $cotisation->username = Auth::user()->username;
            $cotisation->payment_id = $charge->id;
            Auth::user()->cotisation()->save($cotisation);
        }catch (\Exception $e){
            return redirect()->with('error', $e->getMessage());
        }
        return redirect()->route('dashboard.index')->with('success', 'Votre payement a été accepté, vous etes maintenant inscrit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
