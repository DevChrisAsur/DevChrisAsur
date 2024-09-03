<?php

require_once "../controladores/areas.controlador.php";
require_once "../modelos/areas.modelo.php";

class AjaxAreas{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCategoria;

	public function ajaxEditarArea(){

		$item = "id";
		$valor = $this->idCategoria;

		$respuesta = ControladorAreas::ctrMostrarAreas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idAreas"])){

	$categoria = new AjaxAreas();
	$categoria -> idCategoria = $_POST["idAreas"];
	$categoria -> ajaxEditarArea();
}
