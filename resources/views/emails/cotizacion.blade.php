
{{-- Este sera el mensaje que se enviara por email, en esta parte se pondra el usuario y contraseña registrados previamente--}}
<h1>
    Bienvenido<br>
</h1>
<p>
Gracias por pedir una cotizacion en CRM de Royal Motors.<br>
<hr>
Los datos de la cotizacion son las siguientes:<br>
{{-- Estos usuarios se guardaron previamente en la base de datos--}}
    Cliente: {{$cliente}}<br>
    Empleado: {{$empleado}}<br>
    Campaña: {{$campana}}<br>
    Id Vehiculo: {{$idvehiculo}}<br>
Descripcion: {{$descripcion}}<br>
Cantidad: {{$cantidad}}<br>
Precio: {{$precio}}<br>
Descuento: {{$descuento}}<br>
Impuesto: {{$impuesto}}<br>
SubTotal: {{$subtotal}}<br>
Total: {{$total}}<br>
</p>
