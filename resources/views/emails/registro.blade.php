
{{-- Este sera el mensaje que se enviara por email, en esta parte se pondra el usuario y contraseña registrados previamente--}}
<h1>
    Bienvenido <br>
</h1>
<p>
Gracias por registrarse a nuestro CRM de Royal Motors.<br>
<hr>
Sus credenciales son las siguientes:<br>
{{-- Estos usuarios se guardaron previamente en la base de datos--}}
    Usuario: {{$user}}<br>
    Contraseña: {{$pass}}<br>
</p>
