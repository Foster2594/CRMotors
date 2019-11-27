<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //en esta parte yo voy a otorgar validaciones importantes para el registro de usuario.
        return Validator::make($data, [
            //todos los datos son requeridos y tienen un tamaño
            'name' => ['required', 'string', 'max:255'],
            //indica que debe ser unico en la base de datos, no puede haber otro usuario con el mismo email.
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $envio=$this->registroMail($data['name'],$data['password'],$data['email']);


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

    }

    public function registroMail($user, $pass,$email)
    {
        $data = ['user' => $user,
                'pass' => $pass,
                'email' => $email
            ];

        Mail::send('emails.registro', $data, function ($message) {

            $message->from('email@styde.net', 'Styde.Net');

//          $message->to('user@example.com')->subject('Notificación');
            $message->to('user@example.com')->subject('Registro CRM Royal Motors');

        });

        return "Se envío el email";
    }
}