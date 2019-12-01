<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController1 extends Controller
{
    // aqui se realiza el procedimeinto del email, aqui se muestra que cuando un vendedor se registre inmediatamente se enviara un corroe con su usuario y contraseña previamente registrados
  public function cotizacion($cliente, $empleado,$campaña,$campaña,$idvehiculo,$descripcion,$cantidad,$precio,$descuento,$impuesto,$subtotal,$total)
  {
      $data = ['cliente' => 'http://styde.net',
          'empleado' => 'http://styde.net',
          'campana' => 'http://styde.net',
          'idvehiculo' => 'http://styde.net',
          'descripcion' => 'http://styde.net',
          'cantidad' => 'http://styde.net',
          'precio' => 'http://styde.net',
          'descuento' => 'http://styde.net',
          'impuesto' => 'http://styde.net',
          'subtotal' => 'http://styde.net',
          'total' => 'http://styde.net' ];

      Mail::send('emails.cotizacion', $data, function ($message) {

          $message->from('email@styde.net', 'Styde.Net');


          $message->to('foster2594@gmail.com')->subject('Cambio');

      });
//mensaje de verificacion de que el email se envio exitosamente
      return "Se envío el email correctamente";


  }

}
