<?php

require_once "../controladores/matriculas.controlador.php";
require_once "../modelos/matriculas.modelo.php";

class AjaxMatriculas{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idMatricula;

	public function ajaxEditarMatricula(){

		$item = "id_tuition";
		$valor = $this->idMatricula;

		$respuesta = ControladorMatriculas::ctrMostrarMatriculas($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarId_matricula;

	public function validarId_matricula(){

		$item = "id_student";
		$valor = $this->validarId_matricula;

		$respuesta = ControladorMatriculas::ctrMostrarMatriculas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idMatricula"])){

	$estudiante = new AjaxMatriculas();
	$estudiante -> idMatricula = $_POST["idMatricula"];
	$estudiante -> ajaxEditarMatricula();
}

if(isset($_POST["Id_student_matricula"])){

	$valMatricula = new AjaxMatriculas();
	$valMatricula -> validarId_matricula = $_POST["Id_student_matricula"];
	$valMatricula -> validarId_matricula();
}