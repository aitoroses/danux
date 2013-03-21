@if($errors->has())
<ul id="errors">
	<li>{{ $errors->first('name') }}</li>
	<li>{{ $errors->first('width') }}</li>
	<li>{{ $errors->first('height') }}</li>
	<li>{{ $errors->first('prof') }}</li>
	<li>{{ $errors->first('typedoor') }}</li>
</ul>
@endif
