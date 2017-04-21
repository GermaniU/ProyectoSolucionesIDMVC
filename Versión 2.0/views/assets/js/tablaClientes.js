$(document).ready(function() {
    var table = $('#tdClientes').DataTable( {
        	lengthChange: true,
           	dom: 'Bfrtip',
		    buttons: [
		    	{
		            extend: 'pdfHtml5',
		            message: 'listado de todos los atributos de los clientes',
		            orientation: 'landscape',
	                title: 'DataClientes',
	                styles: {
					     header: {
	  					       fontSize: 22,
						       bold: true
						     	}
						 }
		        },
		        'colvis',
		        'excel',
		    		],
		    "language":idioma_espanol
		});
	});

var idioma_espanol = {
	    "sProcessing":     "Procesando...",
	    "sLengthMenu":     "Mostrar _MENU_ registros",
	    "sZeroRecords":    "No se encontraron resultados",
	    "sEmptyTable":     "Ningún dato disponible en esta tabla",
	    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	    "sInfoPostFix":    "",
	    "sSearch":         "Buscar cliente:",
	    "sUrl":            "",
	    "sInfoThousands":  ",",
	    "sLoadingRecords": "Cargando...",
	    "oPaginate": {
	        "sFirst":    "Primero",
	        "sLast":     "Último",
	        "sNext":     "Siguiente",
	        "sPrevious": "Anterior"
	    },
	    "oAria": {
	        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	}
};