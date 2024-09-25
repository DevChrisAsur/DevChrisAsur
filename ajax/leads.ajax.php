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
}

/*=============================================
EDITAR LEAD
=============================================*/
if (isset($_POST["idLeads"])) {

    $curso = new AjaxLeads();
    $curso->idLeads = $_POST["idLeads"];
    $curso->ajaxEditarLead();
}
