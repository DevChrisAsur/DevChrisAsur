<?php

require_once "../controladores/pension.controlador.php";
require_once "../modelos/pension.modelo.php";

class AjaxPension{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idPension;

	public function ajaxEditarPension(){

		$item = "id_pension";
		$valor = $this->idPension;

		$respuesta = ControladorPension::ctrMostrarPensiones($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

public $validarId_Pension;
public $currentMonth;

public function validar_Pension() {
    $item = "id_student";
    $valor = $this->validarId_Pension;
    $currentMonth = $this->currentMonth;

    $respuesta = ControladorPension::ctrMostrarPensionConEstudiantes($item, $valor);

    // Verifica la respuesta antes de enviarla de vuelta como JSON
    if ($respuesta) {
        foreach ($respuesta as $pension) {
            if ($pension["current_month"] == $currentMonth) {
                echo json_encode($pension);
                return;
            }
        }
    }
    echo json_encode(false);
}


	/*=============================================
	ACTIVAR RELOJ
	=============================================*/

	public $activarReloj;
    public $activarId;

    
	public function ajaxEstadoReloj() {
        $tabla = "pension";
        $item1 = "estado_reloj";
        $valor1 = $this->activarReloj;
        $item2 = "id_pension";
        $valor2 = $this->activarId;

        $respuesta = ModeloPension::mdlEstadoReloj($tabla, $item1, $valor1, $item2, $valor2);

        echo json_encode($respuesta);
    }


    /*=============================================
    ACTIVAR RELOJ
    =============================================*/

    public $activarPago;
    public $activarIdPension;

    
    public function ajaxEstadoPago() {
        $tabla = "pension";
        $item1 = "status_payment_pension";
        $valor1 = $this->activarPago;
        $item2 = "id_pension";
        $valor2 = $this->activarIdPension;

        $respuesta = ModeloPension::mdlAprobarEstadoPago($tabla, $item1, $valor1, $item2, $valor2);

        echo json_encode($respuesta);
    }



}


/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idPension"])){

	$pension = new AjaxPension();
	$pension -> idPension = $_POST["idPension"];
	$pension -> ajaxEditarPension();
}

if(isset($_POST["Id_student_pension"]) && isset($_POST["currentMonth"])) {
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    $valPension = new AjaxPension();
    $valPension->validarId_Pension = $_POST["Id_student_pension"];
    $valPension->currentMonth = $_POST["currentMonth"];
    $valPension->validar_Pension();
}

if (isset($_POST['activarReloj'])) {
    $activarReloj = new AjaxPension();
    $activarReloj->activarReloj = $_POST['activarReloj'];
    $activarReloj->activarId = $_POST['activarId'];
    $activarReloj->ajaxEstadoReloj();
}



if (isset($_POST['activarPagoPension'])) {
    $activarPago = new AjaxPension();
    $activarPago->activarPago = $_POST['activarPagoPension'];
    $activarPago->activarIdPension = $_POST['activarIdPension'];
    $activarPago->ajaxEstadoPago();
}