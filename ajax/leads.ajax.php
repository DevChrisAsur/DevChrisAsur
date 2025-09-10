<?php
require_once "../controladores/clientes.controlador.php";
require_once "../controladores/leads.controlador.php";
require_once "../modelos/leads.modelo.php";
require_once "../modelos/clientes.modelo.php";

class AjaxLeads {

    public $idLeads;

    public function ajaxEditarLead() {
        if (is_numeric($this->idLeads)) {
            $item = "id_lead";
            $valor = $this->idLeads;

            try {
                $respuesta = ControladorLeads::ctrVerLeadsFrio($item, $valor);
                if ($respuesta) {
                    header('Content-Type: application/json');
                    echo json_encode($respuesta);
                } else {
                    echo json_encode(["error" => "No se encontró el lead con el ID proporcionado."]);
                }
            } catch (Exception $e) {
                echo json_encode(["error" => "Hubo un error en el servidor: " . $e->getMessage()]);
            }
        } else {
            echo json_encode(["error" => "ID de lead no válido."]);
        }
        exit;
    }

    public $activarEstadoLead;
    public $activarIdLead;

    public function ajaxEstadoPago() {
        $tabla = "leads";
        $item1 = "status_lead";
        $valor1 = $this->activarEstadoLead;
        $item2 = "id_lead";
        $valor2 = $this->activarIdLead;

        $respuesta = ModeloLeads::mdlEstadoLead($tabla, $item1, $valor1, $item2, $valor2);
        echo json_encode($respuesta);
        exit;
    }
}

/*=============================================
EDITAR LEAD
=============================================*/
if (isset($_POST["idLeads"]) && !isset($_POST["editarNombre"])) {
    $curso = new AjaxLeads();
    $curso->idLeads = $_POST["idLeads"];
    $curso->ajaxEditarLead();
}

/*=============================================
ACTUALIZAR LEAD (Guardar Cambios)
=============================================*/
if (isset($_POST["editarNombre"])) {
    $editarLead = new ControladorLeads();
    $respuesta = $editarLead->ctrEditarLead();

    header('Content-Type: application/json');
    echo json_encode($respuesta);
    exit;
}

/*=============================================
CAMBIAR ESTADO LEAD
=============================================*/
if (isset($_POST['activarEstadoLead'])) {
    $activarLead = new AjaxLeads();
    $activarLead->activarEstadoLead = $_POST['activarEstadoLead'];
    $activarLead->activarIdLead = $_POST['activarIdLead'];
    $activarLead->ajaxEstadoPago();
}

/*=============================================
OTRAS ACCIONES
=============================================*/
if (isset($_POST["accion"])) {
    switch ($_POST["accion"]) {
        case "VerDetallesLeads":
            $respuesta = ControladorLeads::ctrVerDetalleslead();
            echo json_encode([
                'success' => true,
                'data' => $respuesta['detalles'],
                'rango_fecha' => $respuesta['rango_fecha']
            ]);
            exit;
        default:
            echo json_encode(["error" => "Acción no válida."]);
            exit;
    }
}
