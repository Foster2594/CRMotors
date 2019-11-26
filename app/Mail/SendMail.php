<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        $mensaje=mensaje::paginate();

        return view('CRM.mensaje.index', compact('mensaje'));
    }

    //public function send( $request)
    //{
      //  $this->validate($request, [
       //     'name'     =>  'required',
       //     'email'  =>  'required|email',
        //    'message' =>  'required'
       // ]);

      //  $data = array(
        //    'name'      =>  $request->input('name'),
       //     'message'   =>   $request->input('message')
       // );

       // $email = $request->input('email');

       // Mail::to($email)->send(new SendMail($data));

        //return back()->with('success', 'Enviado exitosamente!');

    /**
     * Build the message.
     *
     * @return $this
     */

}
