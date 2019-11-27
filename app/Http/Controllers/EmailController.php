<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    // aqui se realiza el procedimeinto del email, aqui se muestra que cuando un vendedor se registre inmediatamente se enviara un corroe con su usuario y contraseña previamente registrados
  public function registro($user,$pass){
      $data = ['user' => 'http://styde.net',
          'pass' => 'http://styde.net' ];

      Mail::send('emails.registro', $data, function ($message) {

          $message->from('email@styde.net', 'Styde.Net');


          $message->to('foster2594@gmail.com')->subject('Cambio');

      });
//mensaje de verificacion de que el email se envio exitosamente
      return "Se envío el email";


  }

}
