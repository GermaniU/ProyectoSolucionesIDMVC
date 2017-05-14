$(document).ready(function() {
	recuperarInfoPaquete();
});

function recuperarInfoPaquete(){
	$("#paqueteOpcion").change(function(){
		var x = $("#paqueteOpcion").val();
		//console.log(x);
		$.ajax({
			url: 'controllers/controllerServicio.php',
			type: 'POST',
			data: {opcion: x}
		}).done(function() {
			console.log("se mando el dato");
		}).fail(function() {
   			 console.log('Error :v');
  		});

	});
}


