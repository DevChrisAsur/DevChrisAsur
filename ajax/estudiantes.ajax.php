
<?php

require_once "../controladores/estudiantes.controlador.php";
require_once "../modelos/estudiantes.modelo.php";

class AjaxEstudiantes{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idEstudiante;

	public function ajaxEditarEstudiante(){

		$item = "id_student";
		$valor = $this->idEstudiante;

		$respuesta = ControladorEstudiantes::ctrMostrarEstudiantesConCampus($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idEstudiante"])){

	$estudiante = new AjaxEstudiantes();
	$estudiante -> idEstudiante = $_POST["idEstudiante"];
	$estudiante -> ajaxEditarEstudiante();
}
