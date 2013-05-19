<html>
<head>
<title>Semiems, envía tu cupón</title>
<head>
    <!-- STYLES -->
    {{ HTML::style('semiems/css/login_zurb.css') }}
    {{ HTML::style('semiems/css/stylep.css') }}
    {{ HTML::script('semiems/js/lib/jquery-1.9.1.min.js') }}

</head>
<body>
<!-- COUPON -->
        <h1 style="width: 200px;margin-left:10px">SEMIEMS</h1>
        <div class="row">
            <div style="background: #fff; padding:40px;" class="shadow bg white columns large-8 large-offset-2 small-8 small-offset-2">
            {{ Form::open('account', 'POST', array('id' => 'coupon')) }}
            {{ Form::token() }}

                <h1>Confirma tus datos de cuenta</h1>
                <br>
                @if(isset($distribuidor))
                    <h2>Datos de distribuidor</h2>
                    <strong>Número de cupón: {{ $coupon }}</strong>
                    <p></p>
                    <table>
                      <thead>
                        <tr>
                          <th>Datos</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Nombre:</td>
                          <td>{{ $distribuidor->empresa }}</td>
                        </tr>
                        <tr>
                          <td>Dirección:</td>
                          <td>{{ $distribuidor->direccion }}</td>
                        </tr>
                        <tr>
                          <td>Provincia:</td>
                          <td>{{ $distribuidor->provincia }}</td>
                        </tr>
                        <tr>
                          <td>CIF/NIF:</td>
                          <td>{{ $distribuidor->cifnif }}</td>
                        </tr>
                        <tr>
                          <td>Código postal:</td>
                          <td>{{ $distribuidor->cod_postal }}</td>
                        </tr>
                        <tr>
                          <td>Email:</td>
                          <td>{{ $distribuidor->email }}</td>
                        </tr>
                      </tbody>
                    </table>
                    <h2>Datos de cuenta</h2>
                    <table>
                      <thead>
                        <tr>
                          <th>Datos</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Usuario:</td>
                          <td>{{ $username }}</td>
                        </tr>
                        <tr>
                          <td>Contraseña:</td>
                          <td>{{ $password }}</td>
                        </tr>
                      
                      </tbody>
                    </table>
                    <p>Verifica que los datos son correctos y pulsa confirmar para terminar.</p>
                    <p>(No se podra volver a utilizar el cupón)</p>
                    <br>
                    <div class="row">
                        <div class="large-4 large-offset-8 small-7 small-offset-5">
                            <div style="width: 100%" id="submit-coupon" class="button" style="text-align: center;">Confirmar</div>
                        </div>
                    </div>
                </div>
            @else
                <p><strong>El cupón no es válido.</strong></p>
                <a href="coupon">Regresar</a>
            @endif
            {{ Form::close() }}
        </div>
<!--ZURBing style!!-->
<script src="semiems/js/foundation/foundation.js"></script>
<script src="semiems/js/foundation/foundation.alerts.js"></script>
<script src="semiems/js/foundation/foundation.clearing.js"></script>
<script src="semiems/js/foundation/foundation.cookie.js"></script>
<script src="semiems/js/foundation/foundation.dropdown.js"></script>
<script src="semiems/js/foundation/foundation.forms.js"></script>
<script src="semiems/js/foundation/foundation.joyride.js"></script>
<script src="semiems/js/foundation/foundation.magellan.js"></script>
<script src="semiems/js/foundation/foundation.orbit.js"></script>
<script src="semiems/js/foundation/foundation.placeholder.js"></script>
<script src="semiems/js/foundation/foundation.reveal.js"></script>
<script src="semiems/js/foundation/foundation.section.js"></script>
<script src="semiems/js/foundation/foundation.tooltips.js"></script>
<script src="semiems/js/foundation/foundation.topbar.js"></script>
<script>
$(document).foundation();
</script>

</body>