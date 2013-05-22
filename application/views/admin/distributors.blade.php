@layout('admin.default')

@section('parts')

          <h1>Distribuidores</h1>
          <p>Tabla de distribuidores Semiems.</p>
  

		<div class="columns small-12 large-4 right">
			<dl class="sub-nav">
			<dt>Por pagina:</dt>
			<dd id="All"><a href="?perPage={{ $distributors->total }}">All</a></dd>
			<dd id="10"><a href="?perPage=10">10</a></dd>
			<dd id="25" class='active'><a href="?perPage=25">25</a></dd>
			<dd id="50"><a href="?perPage=50">50</a></dd>
			<dd id="100"><a href="?perPage=100">100</a></dd>
			</dl>
		</div>
		<div class="columns small-12 large-12">
          @if($distributors)
              <table class="large-12 small-12 columns">
	              <thead>
	                <tr>
	                  <th>ID</th>
	                  <th>Nombre</th>
	                  <th>Username</th>
	                  <th>Nº Cupon</th>
	                  <th>Created </th>
	                  <!-- <th>Actions</th> -->
	                </tr>
	              </thead>
	              <tbody>
	              @foreach($distributors->results as $usr)
	                <tr>
	                  <td>{{ $usr->id }}</td>
	                  <td>{{ $usr->nombre_com }}</td>
	                  <td>{{ $usr->email  }}</td>
	                  <td>{{ $usr->coupon  }}</td>
	                  {{ ( $usr->created ? '<td class="succes label"> Yes </td>' : '<td class="alert label"> No </td>' )  }}
	                  <!-- <td><a class="btn btn-primary" href="'.action('admin.users@edit', array($usr->id)).'">Edit</a> <a class="delete_toggler btn btn-danger" rel="'.$usr->id.'">Delete</a></td> -->
	                </tr>
	              @endforeach
	              </tbody>
              </table>
            @endif
        </div>
        <div class="columns small-12 large-8 large-centered">
			{{ $distributors->links(); }}
		</div>
        <!-- <a href="<?php echo action('admin.users@create')?>" class="btn btn-primary right">New User</a>-->
<script>
//Document ready
$(document).ready(function(){
	check_pagination.init();
});
check_pagination = new Object({
	vars_check: {name:'perPage',result:null},
	init: function(){
		this.action(this.vars_check);
	},
	action: function(vars){
		check_pagination.getParameterByName(vars.name);
		if(typeof check_pagination.vars_check.result !== 'undefined'){
			$("dd").removeClass('active');
			if(check_pagination.vars_check.result == "10"){
				$("#10").addClass('active');
			}else if(check_pagination.vars_check.result == "25"){
				$("#25").addClass('active');
			}else if(check_pagination.vars_check.result == "50"){
				$("#50").addClass('active');
			}else if(check_pagination.vars_check.result == "100"){
				$("#100").addClass('active');
			}else if(check_pagination.vars_check.result > "100" ){
				$("#All").addClass('active');
			}else{
				$("#25").addClass('active'); //default
			}
		}
	},
	getParameterByName: function(name){
		name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    check_pagination.vars_check.result = results == null ? null : decodeURIComponent(results[1].replace(/\+/g, " "));
	}

});

/*	var callback = function (parameter){
		result = getParameterByName(parameter.name);
		var logger = function() {
			console.log('Campos ' + parameter.name + ' resultado ' + result);
		}
		logger();

		if (name == 'orderBy'){
			if (name == 'orderType'){
				if(result == 'DESC'){

				}else{

				}
			}else{

			}
		}else if (name == 'perPage'){

		}else if (name == 'page'){

		}
	}
	result = vars_check.forEach(callback,this);
	console.log(vars_check);
}*/

var filter = function(a){
	$("dd").removeClass('active');
	a.parent.addClass('active');
} 


</script>
@endsection