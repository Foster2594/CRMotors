<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
  public function registro($user,$pass){
      $data = ['user' => 'http://styde.net',
          'pass' => 'http://styde.net' ];

      Mail::send('emails.registro', $data, function ($message) {

          $message->from('email@styde.net', 'Styde.Net');

//          $message->to('user@example.com')->subject('Notificación');
          $message->to('foster2594@gmail.com')->subject('Cambio');

      });

      return "Se envío el email";


  }

}
