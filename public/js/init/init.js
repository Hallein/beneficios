$(document).ready(function(){
	componentHandler.upgradeAllRegistered();
	Marker();
});

function MultiButtonDatatable(id){
	$('#'+id).on( 'order.dt length.dt draw.dt search.dt' , function () {
		HiddenOptionsInit();
	}).dataTable();
}