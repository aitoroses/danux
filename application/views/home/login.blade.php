<!DOCTYPE html>

<html>
<head>
<title>{{$title}}</title>
<head>
    <!-- STYLES -->
    {{ HTML::style('semiems/css/login.css') }}
    {{ HTML::script('semiems/js/jquery-1.9.1.min.js') }}

</head>
<body>
    <!-- check for login errors flash var -->
    @if (Session::has('log_error'))
     <div style="padding:6px; background:#FDE0CE; color:#FD5E5E; font-weight:bold; border:solid 1px #FE9592; text-align:center;">Error!! Usuario o Contraseña invalido</div>
    @endif
    @if (Session::has('log_out'))
     <div style="background:#DCFDC8; border:solid 1px #A0EB70; color:#030; text-align:center; font-weight:bold; padding:4px;">Has salido, hasta pronto!!</div>
    @endif


{{ Form::open('login', 'POST', array('id' => 'login')) }}
{{ Form::token() }}
    <!-- username field -->
    <h1>Acceso al distribuidor</h1>
<fieldset id="inputs">
    {{ Form::text('username',null,array('id'=>'username','placeholder'=>'Usuario')) }}

    <!-- password field -->
    {{ Form::text('password',null, array('id'=>'password','placeholder'=>'Contraseña')) }}
</fieldset>
<fieldset id="actions">
    <!-- submit button -->
    {{ Form::submit('Acceso', array('id'=>'submit')) }}
</fieldset>
{{ Form::close() }}

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#login').addClass('show')
    })
    @if (Session::has('log_error'))
        $('#login').addClass('shake');
    @endif
</script>
</html>