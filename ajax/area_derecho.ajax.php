<?php

require_once "../controladores/areasderecho.controlador.php";
require_once "../modelos/areaderecho.modelo.php";

class AjaxAreaDerecho{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idAreasDerecho;

	public function ajaxEditarAreaDerecho(){

		$item = "id_area";
		$valor = $this->idAreasDerecho;

		$respuesta = ControladorAreaDerecho::ctrVerAreasDerecho($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idAreasDerecho"])){

	$curso = new AjaxAreaDerecho();
	$curso -> idAreasDerecho = $_POST["idAreasDerecho"];
	$curso -> ajaxEditarAreaDerecho();
}
