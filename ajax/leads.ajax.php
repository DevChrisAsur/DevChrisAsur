<?php
require_once "../controladores/clientes.controlador.php";
require_once "../controladores/leads.controlador.php";
require_once "../modelos/leads.modelo.php";
require_once "../modelos/clientes.modelo.php";

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
                // Obtener la respuesta del controlador
                $respuesta = ControladorLeads::ctrVerLeadsFrio($item, $valor);
    
                // Si se encuentra un lead, enviamos los datos
                if ($respuesta) {
                    echo json_encode($respuesta);
                } else {
                    // Enviar un mensaje si no se encuentra el lead
                    echo json_encode(array("error" => "No se encontró el lead con el ID proporcionado."));
                }
            } catch (Exception $e) {
                // Manejo de cualquier error que ocurra durante la ejecución
                echo json_encode(array("error" => "Hubo un error en el servidor: " . $e->getMessage()));
            }
        } else {
            // Respuesta en caso de ID de lead no válido
            echo json_encode(array("error" => "ID de lead no válido."));
        }
    }
    

    public $activarEstadoLead; // Cambié activarPago a activarEstadoLead
    public $activarIdLead; // Cambié activarIdPension a activarIdLead
    
    public function ajaxEstadoPago() {
        $tabla = "leads";
        $item1 = "status_lead"; // Campo de la base de datos que se está actualizando
        $valor1 = $this->activarEstadoLead; // Cambié valor1 para referirse a estado del lead
        $item2 = "id_lead"; // Condición para identificar el lead
        $valor2 = $this->activarIdLead; // Cambié valor2 para referirse a id_lead
    
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

if (isset($_POST['activarEstadoLead'])) { // Cambié activarPagoPension a activarEstadoLead
    $activarLead = new AjaxLeads(); // Cambié AjaxUsuarios a AjaxLeads para que sea más coherente
    $activarLead->activarEstadoLead = $_POST['activarEstadoLead']; // Asigna el estado enviado
    $activarLead->activarIdLead = $_POST['activarIdLead']; // Asigna el id_lead enviado
    $activarLead->ajaxEstadoPago(); // Llamamos a la función para ejecutar la actualización
}

/*=============================================
ACTUALIZAR LEAD (Guardar Cambios)
=============================================*/
if (isset($_POST["editarNombre"])) { // Verifica si se está enviando el nombre para proceder
    $editarLead = new ControladorLeads();
    $respuesta = $editarLead->ctrEditarLead(); // Llama a la función que maneja la edición

    // Envía una respuesta que será capturada por el frontend
    if ($respuesta == "ok") {
        echo json_encode("ok"); // Respuesta en caso de éxito
    } else {
        echo json_encode("error"); // Respuesta en caso de error
    }
}

switch($_POST["accion"]){

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

