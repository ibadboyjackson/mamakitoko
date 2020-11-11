<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\Facades\Image;
use Illuminate\Auth\Events\Registered;
use App\Notifications\RegisteredUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('registration.inscription');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'username' => ['required', 'string', 'min:2', 'max:25'],
            'lastname' => ['required', 'string', 'min:2', 'max:25'],
            'image' => ['required', 'image'],
        ]);
    }
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $user->notify(new RegisteredUsers());
        Session::flash('success', 'Votre compte a été crée mais vous devez le confirmer, un email vous a été envoyé');
        return redirect()->route('inscription');
    }
    public function confirm($id, $token, Request $request){
        $user = User::where('id', $id)->where('confirmation_token', $token)->first();
        if($user){
            $user->update(['confirmation_token' => null]);
            $this->guard()->login($user);
            Session::flash('success', 'Votre compte a bien été confirmé');
            return $this->registered($request, $user)
                ?: redirect($this->redirectPath())->with('success', 'Votre compte a été confirmé, mais vous devez cotiser pour ne pas qu\'il soit supprimer dans 24 heures');
        }else{
            return redirect()->route('inscription')->with('error', 'Ce lien ne semble plus valide');
        }
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @param Request $request
     * @return \App\User
     */
    protected function create(array $data)
    {
            $image = $data['image'];
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = '/home/clients/4da7976ef88093bd1f76a61a7c3563a5/test/images/'.$filename;

        Image::make($image)->fit(500, 500)->save($location);
            $data['image'] = $filename;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $filename,
            'username' => $data['username'],
            'lastname' => $data['lastname'],
            'confirmation_token' => str_replace('/', '', bcrypt(str_random(16)))
        ]);
    }
}
