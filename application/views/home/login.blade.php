<!DOCTYPE html>

<html>
<head>
<title>{{$title}}</title>
<head>
    <!-- STYLES -->
    {{ HTML::style('semiems/css/login_zurb.css') }}
    <!-- {{ HTML::style('semiems/css/stylep.css') }} -->

    {{ HTML::script('semiems/js/lib/jquery-1.9.1.min.js') }}

</head>
<body>
    
    <!-- check for login errors flash var -->
    @if (Session::has('log_error'))
     <div style="padding:6px; background:#FDE0CE; color:#FD5E5E; font-weight:bold; border:solid 1px #FE9592; text-align:center;">Error!! Usuario o Contraseña invalido</div>
    @endif
    @if (Session::has('log_out'))
     <div style="background:#DCFDC8; border:solid 1px #A0EB70; color:#030; text-align:center; font-weight:bold; padding:4px;">Has salido, hasta pronto!!</div>
    @endif
    @if (Session::has('log_createUser'))
     <div style="background:#DCFDC8; border:solid 1px #A0EB70; color:#030; text-align:center; font-weight:bold; padding:4px;">Usuario creado, inicia sesion.</div>
    @endif
    @if (Session::has('log_roleUser'))
     <div style="padding:6px; background:#FDE0CE; color:#FD5E5E; font-weight:bold; border:solid 1px #FE9592; text-align:center;">Error!! Necesitas ser administrador para acceder</div>
    @endif


<!-- LOGIN -->
        {{ Form::open('login', 'POST', array('id' => 'login')) }}
        {{ Form::token() }}
            <!-- username field -->
            <h1>Acceso al distribuidor</h1>
        <fieldset id="inputs">
            {{ Form::text('username',null,array('id'=>'username','placeholder'=>'Usuario')) }}

            <!-- password field -->
            {{ Form::password('password', array('id'=>'password','placeholder'=>'Contraseña')) }}
        </fieldset>
        <fieldset id="actions">
            <!-- submit button -->
            {{ Form::submit('Entrar', array('id'=>'submit','class'=>'button')) }}
        </fieldset>
        <div class="create-account">No tienes una cuenta? Registra una ahora.</div>

        {{ Form::close() }}

<!-- REGISTER -->

        {{ Form::open('register', 'GET', array('id' => 'register')) }}
        {{ Form::token() }}
            <!-- username field -->
            <h1>Registra un usuario</h1>
        <fieldset id="inputs">
            {{ Form::text('username',null,array('id'=>'username','placeholder'=>'Usuario')) }}
            <!-- password field -->
            {{ Form::password('password', array('id'=>'password','placeholder'=>'Contraseña')) }}
        </fieldset>
        <fieldset id="actions">
            <!-- submit button -->
            {{ Form::submit('Registrar', array('id'=>'submit','class'=>'button')) }}
        </fieldset>
        <div class="login-account">Entra con tu cuenta ahora.</div>
    
        {{ Form::close() }}
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#login').addClass('show')
        $register.fadeOut('fast');
    })
    @if (Session::has('log_error'))
        $('#login').addClass('shake');
    @endif
</script>
<!-- callbacks de botones para crear cuenta -->
<script type="text/javascript">
    var $login = $('#login');
    var $register = $('#register');

    // Callbacks
    $('.create-account').click(function(){
        register();
    });
    $('.login-account').click(function(){
        login();
    });

    var login = function() {
        $register.removeClass('show');
        $login.fadeIn('fast');
        setTimeout(function(){
            $login.addClass('show');
            $register.fadeOut('fast');
        }, 0);
    }
    var register = function() {
        $login.removeClass('show');
        $register.fadeIn('fast');
        setTimeout(function(){
            $register.addClass('show');
            $login.fadeOut('fast');
        }, 0);
    }

</script>
</html>