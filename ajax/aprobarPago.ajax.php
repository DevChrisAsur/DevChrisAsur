
<?php

require_once "../controladores/matriculas.controlador.php";
require_once "../modelos/matriculas.modelo.php";

class AjaxAprobarPago{

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/

	public $activarPago;
	public $activarId;

	public function ajaxAprobarPago(){
	$tabla = "tuition";
	$item1 = "status_payment";
	$valor1 =$this-> activarPago;
	$item2 = "id_tuition";
	$valor2 =$this-> activarId;
	$respuesta = ModeloMatriculas::mdlAprobarPago($tabla,$item1,$valor1,$item2,$valor2);

	echo json_encode($respuesta);
	}
}

/*=============================================
ACTIVAR USUARIO
=============================================*/

if(isset($_POST['activarPago'])){
	$activarPago = new AjaxAprobarPago();
	$activarPago-> activarPago=$_POST['activarPago'];
	$activarPago-> activarId=$_POST['activarId'];
	$activarPago->ajaxAprobarPago();
   }
