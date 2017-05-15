$(document).ready(function() {
	visualizarTablaPaquetes();
	visualizarTablaClientes();
	visualizarTablaServicios();

});

function visualizarTablaPaquetes() {
	    var table = $('#tdPaquetes').DataTable( {
	    	lengthMenu: [ 5, 10, 25, 50, 75,100 ],
        	lengthChange: true,
        	responsive: true,
           	dom: 'Bfrtipl',
		    buttons: [
		        {
		        	text:'<i class="fa fa-plus-circle" aria-hidden="true"></i>',
		        	className: 'btn color btn-success',
		        	titleAttr: 'Agregar Paquete',
		        	action: function( e, dt, node, config ){
		        		location.href="index.php?action=agregarPaquete";
		        	}
		        },
		    	{
		    		text:'<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
		            extend: 'pdfHtml5',
		            titleAttr: 'Importa a PDF',
		            message: 'listado de todos los atributos de los paquetes',
		            orientation: 'landscape',
	                title: 'DataPaquetes',
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
		    "language": idioma_espanol_paquete = {
				    "sProcessing":     "Procesando...",
				    "sLengthMenu":     "Mostrar _MENU_ registros",
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				    "sInfo":           "Mostrando del _START_ al _END_ de  _TOTAL_ paquetes",
				    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				    "sInfoPostFix":    "",
				    "sSearch":         "Buscar paquetes:",
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
}

function visualizarTablaClientes() {
	var table = $('#tdClientes').DataTable( {
			lengthMenu: [ 5, 10, 25, 50, 75,100 ],
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
		    "language": idioma_espanol_cliente = {
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
}

function visualizarTablaServicios() {
	var table = $('#tdServicios').DataTable( {
			lengthMenu: [ 5, 10, 25, 50, 75,100 ],
        	lengthChange: true,
        	responsive: true,
           	dom: 'Bfrtipl',
		    buttons: [
		    	{
		    		text:'<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
		            extend: 'pdfHtml5',
		            titleAttr: 'Importa a PDF',
		            message: 'listado de todos los atributos de los clientes',
		            orientation: 'landscape',
	                title: 'DataServicios',
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
		    "language": idioma_espanol_servicio = {
				    "sProcessing":     "Procesando...",
				    "sLengthMenu":     "Mostrar _MENU_ registros",
				    "sZeroRecords":    "No se encontraron resultados",
				    "sEmptyTable":     "Ningún dato disponible en esta tabla",
				    "sInfo":           "Mostrando del _START_ al _END_ de  _TOTAL_ servicios",
				    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				    "sInfoPostFix":    "",
				    "sSearch":         "Buscar servicio:",
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
}