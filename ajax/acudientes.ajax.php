<?php

require_once "../controladores/acudientes.controlador.php";
require_once "../modelos/acudientes.modelo.php";

class AjaxAcudientes{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idAcudiente;

	public function ajaxEditarAcudiente(){

		$item = "id_parent";
		$valor = $this->idAcudiente;

		$respuesta = ControladorAcudientes::ctrMostrarAcudientes($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarId_student;

	public function validarId_student(){

		$item = "id_student";
		$valor = $this->validarId_student;

		$respuesta = ControladorAcudientes::ctrMostrarEstudiantesConParent($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idAcudiente"])){

	$estudiante = new AjaxAcudientes();
	$estudiante -> idAcudiente = $_POST["idAcudiente"];
	$estudiante -> ajaxEditarAcudiente();
}

if(isset($_POST["Id_student_ajax"])){

	$valUsuario = new AjaxAcudientes();
	$valUsuario -> validarId_student = $_POST["Id_student_ajax"];
	$valUsuario -> validarId_student();
}