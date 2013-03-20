<script type="text/javascript">
$(document).ready(function(){
	
	$("#flex1").flexigrid
			(
			{
			url: 'semiems/js/flexigrid/post2.php',
			dataType: 'json',
			colModel : [
				{display: 'ID', name : 'id', width : 40, sortable : true, align: 'center'},
				{display: 'Nombre', name : 'nombre', width : 200, sortable : true, align: 'center'},
				{display: 'Medidas', name : 'medidas', width : 80, sortable : true, align: 'center'},
				{display: 'Puertas', name : 'puertas', width : 40, sortable : true, align: 'center'},
				{display: 'Modulos', name : 'modulos', width : 40, sortable : true, align: 'center'},
				{display: 'Fecha', name : 'date', width : 100, sortable : true, align: 'center'}
				
				],
			buttons : [
				{name: 'Nuevo', bclass: 'add', onpress : doCommand},
				{name: 'Cargar', bclass: 'loadd', onpress : doCommand},
				{name: 'Presupuesto', bclass: 'budget', onpress : doCommand},
				{name: 'Delete', bclass: 'delete', onpress : doCommand}
				],
			searchitems : [
				{display: 'ID', name : 'id'},
				{display: 'Fecha', name : 'date', isdefault: true}
				],
			sortname: "id",
			sortorder: "asc",
			usepager: true,
			title: 'Presupuestos',
			useRp: true,
			rp: 10,
			showTableToggleBtn: true,
			width: 700,
			height: 255,
			singleSelect: true
			}
			);   
	
});

function doCommand(com,grid)
{
	if (com=='Nuevo')
        {
            Close_popup();           
        }
	else if (com=='Cargar')
        {
            var idt = $('.trSelected',grid);
            idt = idt[0].id.substr(3);
            cargarJson(idt);
            Close_popup();
                       
        }
    else if (com=='Presupuesto')
        {
            var idt = $('.trSelected',grid);
            idt = idt[0].id.substr(3);
            cargarJson(idt);
            $( "#tabs" ).tabs("select", 7);
            Close_popup();
                       
        }     
	else if (com=='Delete')
        {
           if($('.trSelected',grid).length>0){
		   if(confirm('Delete ' + $('.trSelected',grid).length + ' items?')){
            var items = $('.trSelected',grid);
            var itemlist ='';
        	for(i=0;i<items.length;i++){
				itemlist+= items[i].id.substr(3)+",";
			}
			$.ajax({
			   type: "POST",
			   dataType: "json",
			   url: "js/flexigrid/delete.php",
			   data: "items="+itemlist,
			   success: function(data){
			   	alert("Query: "+data.query+" - Total affected rows: "+data.total);
			   $("#flex1").flexReload();
			   }
			 });
			}
			} else {
				return false;
			} 
        }         
} 
</script>


 <div class="content-popup">
        <div class="close"><a href="#" id="close2" onClick="Close_popup();"><img src="semiems/img/close.png"/></a></div>
<table id="flex1" style="display:none"></table>
</div>