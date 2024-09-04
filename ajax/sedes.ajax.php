<?php

require_once "../controladores/sedes.controlador.php";
require_once "../modelos/sedes.modelo.php";

class AjaxSedes{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCategoria;

	public function ajaxEditarSede(){

		$item = "id_campus";
		$valor = $this->idCategoria;

		$respuesta = ControladorSedes::ctrMostrarSedes($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarNombreSede;

	public function validarNombreSede(){

		$item = "campus_name";
		$valor = $this->validarNombreSede;

		$respuesta = ControladorSedes::ctrMostrarSedes($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idSedes"])){

	$categoria = new AjaxSedes();
	$categoria -> idCategoria = $_POST["idSedes"];
	$categoria -> ajaxEditarSede();
}


if(isset( $_POST["validarNombreSede"])){

	$valUsuario = new AjaxSedes();
	$valUsuario -> validarNombreSede = $_POST["validarNombreSede"];
	$valUsuario -> validarNombreSede();

}