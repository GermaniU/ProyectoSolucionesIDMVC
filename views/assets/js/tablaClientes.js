$(document).ready(function() {
    var table = $('#tdClientes').DataTable( {
        	lengthChange: true,
        	responsive: true,
           	dom: 'Bfrtipl',
		    buttons: [
		        {
		        	text:'<i class="fa fa-plus-circle" aria-hidden="true"></i>',
		        	className: 'btn color btn-success',
		        	titleAttr: 'Agregar Cliente',
		        	action: function( e, dt, node, config ){
		        		location.href="index.php?action=agregarCliente";
		        	}
		        },
		    	{
		    		text:'<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
		            extend: 'pdfHtml5',
		            titleAttr: 'Importa a PDF',
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
		        {
		        	text:'<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
		        	extend:	'excel',
		        	titleAttr: 'Importar a Excel'
		        },
		        {
		        	text:'Visualizar',
		        	extend: 'colvis',
		        	titleAttr: 'Visualizar columnas'
		        }

		    		],
		    "language": idioma_espanol = {
				    "sProcessing":     "Procesando...",
				    "sLengthMenu":     "Mostrar _MENU_ registros",
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				    "sInfo":           "Mostrando del _START_ al _END_ de  _TOTAL_ clientes",
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
			}
		});
	});


