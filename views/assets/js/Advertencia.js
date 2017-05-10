$(document).ready(function() {
	desplegarAdvertenciaAgregarPaquete();
	desplegarAdvertenciaAgregarCliente();
	desplegarAdvertenciaActualizarCliente();
	desplegarAdvertenciaActualizarPaquete();
});

function desplegarAdvertenciaAgregarPaquete(){
	var modal  = document.getElementById('errorAgregarPaquete');
		if( modal ){
			$('#modalError').modal('show');
			destruir = modal.parentNode;
			destruir.removeChild(modal);
		}
}

function desplegarAdvertenciaAgregarCliente(){
	var modal  = document.getElementById('errorAgregarCliente');
		if( modal ){
			$('#modalError').modal('show');
			destruir = modal.parentNode;
			destruir.removeChild(modal);
		}
}

function desplegarAdvertenciaActualizarCliente(){
	var modal  = document.getElementById('errorActualizarCliente');
		if( modal ){
			$('#modalError').modal('show');
			destruir = modal.parentNode;
			destruir.removeChild(modal);
		}
}

function desplegarAdvertenciaActualizarPaquete(){
	var modal  = document.getElementById('errorActualizarPaquete');
		if( modal ){
			$('#modalError').modal('show');
			destruir = modal.parentNode;
			destruir.removeChild(modal);
		}
}