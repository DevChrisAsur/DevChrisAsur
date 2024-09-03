<?php

class ControladorTelefonoP{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrRegistrarTelefonoP() {
    if (isset($_POST["nuevoTelefono"])) {
        // Validar el teléfono con una expresión regular adecuada
        if (preg_match('/^[0-9]+$/', $_POST["nuevoTelefono"])) {

            $tabla = "parent_phone";

            // Incluir id_parent y phone en el array de datos
            $datos = array(
                "phone" => $_POST["nuevoTelefono"]
            );

            // Depuración para ver los datos
            echo '<pre>'; print_r($datos); echo '</pre>';

            $respuesta = ModeloTelefonoP::mdlRegistrarTelefonoPadre($tabla, $datos);

            // Verificar la respuesta y mostrar una alerta adecuada
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El teléfono del padre ha sido guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            window.location = "acudientes";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡Hubo un error al guardar el teléfono del padre!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            window.location = "acudientes";
                        }
                    });
                </script>';
            }

        } else {
            echo '<script>
                swal({
                    type: "error",
                    title: "¡El teléfono no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if (result.value) {
                        window.location = "acudientes";
                    }
                });
            </script>';
        }
    }
}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	// static public function ctrMostrarSedes($item, $valor){

	// 	$tabla = "campus";

	// 	$respuesta = ModeloSedes::mdlMostrarSedes($tabla, $item, $valor);

	// 	return $respuesta;

	// }

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	// static public function ctrEditarSedes(){

	// 	if(isset($_POST["editarNombreSede"])){

	// 		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ-]+$/', $_POST["editarNombreSede"])){

	// 			$tabla = "campus";

	// 			$datos = array("campus_name"=>$_POST["editarNombreSede"],
	// 						   "address"=>$_POST["editarDireccionSede"],
	// 						   "email"=>$_POST["editarCorreoSede"],
	// 						   "id_campus"=>$_POST["idSedes"]
	// 						);

	// 			$respuesta = ModeloSedes::mdlEditarSedes($tabla, $datos);

	// 			if($respuesta == "ok"){

	// 				echo'<script>

	// 				swal({
	// 					  type: "success",
	// 					  title: "La sede ha sido cambiada correctamente",
	// 					  showConfirmButton: true,
	// 					  confirmButtonText: "Cerrar"
	// 					  }).then(function(result){
	// 								if (result.value) {

	// 								window.location = "sedes";

	// 								}
	// 							})

	// 				</script>';

	// 			}


	// 		}else{

	// 			echo'<script>

	// 				swal({
	// 					  type: "error",
	// 					  title: "La sede no puede ir vacía o llevar caracteres especiales!",
	// 					  showConfirmButton: true,
	// 					  confirmButtonText: "Cerrar"
	// 					  }).then(function(result){
	// 						if (result.value) {

	// 						window.location = "sedes";

	// 						}
	// 					})

	// 		  	</script>';

	// 		}

	// 	}

	// }

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	// static public function ctrBorrarSedes(){

	// 	if(isset($_GET["idSedes"])){

	// 		$tabla ="campus";
	// 		$datos = $_GET["idSedes"];

	// 		$respuesta = ModeloSedes::mdlBorrarSedes($tabla, $datos);

	// 		if($respuesta == "ok"){

	// 			echo'<script>

	// 				swal({
	// 					  type: "success",
	// 					  title: "La sede ha sido borrada correctamente",
	// 					  showConfirmButton: true,
	// 					  confirmButtonText: "Cerrar"
	// 					  }).then(function(result){
	// 								if (result.value) {

	// 								window.location = "sedes";

	// 								}
	// 							})

	// 				</script>';
	// 		}
	// 	}

	// }


}
