<?php

require_once "../controladores/leads.controlador.php";
require_once "../modelos/leads.modelo.php";

class AjaxLeads {

    /*=============================================
    EDITAR LEAD
    =============================================*/  
    public $idLeads;

    public function ajaxEditarLead() {

        // Validar si idLeads es un número válido
        if (is_numeric($this->idLeads)) {
            $item = "id_lead";
            $valor = $this->idLeads;

            try {
                $respuesta = ControladorLeads::ctrVerLeadsFrio($item, $valor);

                // Si se encuentra un lead, enviamos los datos
                if ($respuesta) {
                    echo json_encode($respuesta);
                } else {
                    echo json_encode(array("error" => "No se encontró el lead con el ID proporcionado."));
                }
            } catch (Exception $e) {
                // Manejo de cualquier error que ocurra durante la ejecución
                echo json_encode(array("error" => "Hubo un error en el servidor: " . $e->getMessage()));
            }
        } else {
            echo json_encode(array("error" => "ID de lead no válido."));
        }
    }

    public $activarPago;
    public $activarIdPension;

    
    public function ajaxEstadoPago() {
        $tabla = "leads";
        $item1 = "status_lead";
        $valor1 = $this->activarPago;
        $item2 = "id_lead";
        $valor2 = $this->activarIdPension;

        $respuesta = ModeloLeads::mdlEstadoLead($tabla, $item1, $valor1, $item2, $valor2);

        echo json_encode($respuesta);
    }
}

/*=============================================
EDITAR LEAD
=============================================*/
if (isset($_POST["idLeads"])) {

    $curso = new AjaxLeads();
    $curso->idLeads = $_POST["idLeads"];
    $curso->ajaxEditarLead();
}
if (isset($_POST['activarPagoPension'])) {
    error_log("activarPagoPension: " . $_POST['activarPagoPension']);
    error_log("activarIdPension: " . $_POST['activarIdPension']);
    $activarPago = new AjaxUsuarios();
    $activarPago->activarPago = $_POST['activarPagoPension'];
    $activarPago->activarIdPension = $_POST['activarIdPension'];
    $activarPago->ajaxEstadoPago();
}
