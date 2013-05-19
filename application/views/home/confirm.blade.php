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
        <div class="row" style="position:relative;top:100px;">
            <div style="background: #fff; padding:40px;" class="shadow bg white columns large-8 large-offset-2 small-8 small-offset-2">
            {{ Form::open('account', 'POST', array('id' => 'coupon')) }}
            {{ Form::token() }}
                <!-- username field -->
                <h1>Confirma tus datos de cuenta</h1>
                <br>
                <h2>Datos de distribuidor</h2>
                <ul>
                    <li>RAYO VALLECANO</li>
                    <li>CIF: NO TIENE</li>
                </ul>
                <h2>Datos de cuenta</h2>
                <ul>
                    <li>Nombre de usuario: {{ $username }}</li>
                    <li>Contraseña: {{ $password }}</li>
                </ul>
                <p>Verifica que los datos son correctos y pulsa confirmar para terminar.</p>
                <br>
                <div class="row">
                    <div class="large-4 large-offset-4 small-7 small-offset-3">
                        <div style="width: 100%" id="submit-coupon" class="button" style="text-align: center;">Confirmar</div>
                    </div>
                </div>
            </div>
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