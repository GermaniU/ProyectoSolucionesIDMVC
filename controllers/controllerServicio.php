<?php 
 class MvcControllerServicio{
    
      public function ObtenerDatosPaquetes(){

		$respuesta = ModelPaquete::vistaPaqueteModel();
		//		<td>'.$item["idPaquete"].'</td>

		/*foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["tipoPaquete"].'</td>
				<td>'.$item["nombrePaquete"].'</td>
				<td>'.$item["descripcionPaquete"].'</td>
				<td>'.$item["costoPaquete"].'</td>
				<td><a href="index.php?action=editarPaquete&idPaquete='.$item["idPaquete"].'"><button class="btn btn-outline-primary" >Editar</button></a></td>
				</tr>';*/

				return $respuesta;

	}

 }


 ?>