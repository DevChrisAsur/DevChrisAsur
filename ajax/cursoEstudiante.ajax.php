<?php

require_once "../controladores/curso_estudiante.controlador.php";
require_once "../modelos/curso_estudiante.modelo.php";

class AjaxCursoEstudiantes{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idEstudianteCursoAjax;
	// public $idCursoCurso;
	public function ajaxEditarCursoEstudiante(){

		$item = "id_student";
		// $item1 = "id_grade";
		$valor = $this->idEstudianteCursoAjax;
		// $valor1 = $this->idCursoCurso;
		$respuesta = ControladorCursoEstudiante::ctrMostrarCursoEstudiante($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idEstudianteCursoAjax"])){

	$estudiante = new AjaxCursoEstudiantes();
	$estudiante -> idEstudianteCursoAjax = $_POST["idEstudianteCursoAjax"];
	// $estudiante -> idCursoCurso  = $_POST["idCursoCurso"];
	$estudiante -> ajaxEditarCursoEstudiante();
}
