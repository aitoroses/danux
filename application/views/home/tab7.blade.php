@layout('home.default')

@section('tab')

	
{{ HTML::script('semiems/js/src/tabs/tab7.js') }}

<div id="paso-8" class="ui-tabs-panel">
	<div class="row shadow bg">
	  <div class="small-10 large-11 small-centered large-centered columns">
	  	<h1>Resumen del presupuesto</h1>
	  	<h3>(Plantilla de test, NaN = "Numero no válido")</h3>
	  </div>
	</div>
	<div class="row shadow bg">
		<div class="small-12 large-10 small-centered large-centered columns">
			<div id="presupuesto"></div>
		</div>
		<a href="javascript:printIt($('#presupuesto').html());" style="margin-right: 20px;float: right;" class="button">Generar Pdf</a>
	</div>
</div>

<script type="text/javascript">

function printIt(printThis) {
	var stylePrint = new String("body {overflow: scroll;}	th,td {padding: 4px 4px 4px 4px ; text-align: center ;}	th {border-bottom: 2px solid #333333 ;}td {border-bottom: 1px dotted #999999 ;}");
	var win = window.open();
	self.focus();
	win.document.open();
	win.document.write('<'+'html'+'>');
	win.document.write('<'+'head'+'>');
	win.document.write('<link rel="stylesheet" type="text/css" media="print" href="semiems/css/stylep.css">');
	win.document.write('<link rel="stylesheet" type="text/css" media="print" href="lib/font-awesome/css/font-awesome.min.css">');
	win.document.write('<style>'+stylePrint+'</style>');
	win.document.write('</head>');
	win.document.write('<'+'body'+'>');
	win.document.write(printThis);
	win.document.write('<'+'/body'+'><'+'/html'+'>');
	win.document.close();
	win.print();
	win.close();
}
</script>

@endsection

@section('help')

<div id="close-help"><a onClick="App.Help.close();"><img src="semiems/img/close.png"/></a></div>
<h1>Ayuda Tab 8</h1>



@endsection