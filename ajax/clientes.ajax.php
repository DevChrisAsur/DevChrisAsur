<?php
require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes {

    public $idCliente;

    public function ajaxObtenerInfoCliente() {
        if (is_numeric($this->idCliente)) {
            $item = "id_customer";
            $valor = $this->idCliente;

            try {
                // Obtener la respuesta del controlador
                $respuesta = ControladorClientes::ctrInfoCliente($item, $valor);

                // Si se encuentra un cliente, enviamos los datos
                if ($respuesta) {
                    echo json_encode($respuesta);
                } else {
                    // Enviar un mensaje si no se encuentra el cliente
                    echo json_encode(array("error" => "No se encontró el cliente con el ID proporcionado."));
                }
            } catch (Exception $e) {
                // Manejo de cualquier error que ocurra durante la ejecución
                echo json_encode(array("error" => "Hubo un error en el servidor: " . $e->getMessage()));
            }
        } else {
            // Respuesta en caso de ID de cliente no válido
            echo json_encode(array("error" => "ID de cliente no válido."));
        }
    }
}

/*=============================================
OBTENER INFORMACIÓN DEL CLIENTE
=============================================*/
if (isset($_POST["idCliente"])) {
    $cliente = new AjaxClientes();
    $cliente->idCliente = $_POST["idCliente"];
    $cliente->ajaxObtenerInfoCliente();
}
