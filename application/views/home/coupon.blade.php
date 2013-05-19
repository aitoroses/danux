<!DOCTYPE html>

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
            {{ Form::open('confirm', 'GET', array('id' => 'coupon')) }}
            {{ Form::token() }}
                <!-- username field -->
                <h1>Crea una cuenta</h1>
                <p style="text-align: center;">Pide tu código a semiems para registrar una cuenta</p>
            <fieldset id="inputs">
                {{ Form::text('coupon',null,array('id'=>'username', 'style' => 'text-align: center;', 'placeholder'=>'Cupon (Código)')) }}
                <br>
                <div class="row">
                    <div class="large-4 large-offset-4 small-7 small-offset-3">
                        {{ Form::button('Manda tu cupón',array('style' => 'text-align: center;', 'class'=>'button')) }}
                    </div>
                </div>
            </fieldset>
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