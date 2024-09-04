
<?php

require_once "../controladores/cursos.controlador.php";
require_once "../modelos/cursos.modelo.php";

class AjaxCursos{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCursos;

	public function ajaxEditarCursos(){

		$item = "id_grade";
		$valor = $this->idCursos;

		$respuesta = ControladorCursos::ctrMostrarCursos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idCursos"])){

	$curso = new AjaxCursos();
	$curso -> idCursos = $_POST["idCursos"];
	$curso -> ajaxEditarCursos();
}
