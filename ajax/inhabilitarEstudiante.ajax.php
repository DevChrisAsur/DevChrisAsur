
<?php

require_once "../controladores/estudiantes.controlador.php";
require_once "../modelos/estudiantes.modelo.php";

// class AjaxInhabilitarEstudiantes{

// 	/*=============================================
// 	ACTIVAR USUARIO
// 	=============================================*/

// 	public $activarUsuario;
// 	public $activarId;

// 	public function ajaxActivarUsuario(){
// 	$tabla = "student";
// 	$item1 = "st_status";
// 	$valor1 =$this-> activarUsuario;
// 	$item2 = "id_student";
// 	$valor2 =$this-> activarId;
// 	$respuesta = ModeloEstudiantes::mdlActualizarEstudiante($tabla,$item1,$valor1,$item2,$valor2);

// 	echo json_encode($respuesta);
// 	}
// }

// /*=============================================
// ACTIVAR USUARIO
// =============================================*/

// if(isset($_POST['activarUsuario'])){
// 	$activarUsuario = new AjaxInhabilitarEstudiantes();
// 	$activarUsuario-> activarUsuario=$_POST['activarUsuario'];
// 	$activarUsuario-> activarId=$_POST['activarId'];
// 	$activarUsuario->ajaxActivarUsuario();
//    }
class AjaxInhabilitarEstudiantes {

    public $activarUsuario;
    public $activarId;

    public function ajaxActivarUsuario() {
        $tabla = "student";
        $item1 = "st_status";
        $valor1 = $this->activarUsuario;
        $item2 = "id_student";
        $valor2 = $this->activarId;

        // Obtener la fecha actual
        $item3 = "retirement_date";
        $valor3 = date('Y-m-d'); // Formato de fecha actual

        $respuesta = ModeloEstudiantes::mdlActualizarEstudiante($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3);

        echo json_encode($respuesta);
    }
}

if (isset($_POST['activarUsuario'])) {
    $activarUsuario = new AjaxInhabilitarEstudiantes();
    $activarUsuario->activarUsuario = $_POST['activarUsuario'];
    $activarUsuario->activarId = $_POST['activarId'];
    $activarUsuario->ajaxActivarUsuario();
}
