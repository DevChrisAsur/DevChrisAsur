<?php

class ControladorLeads {

    static public function ctrRegistrarLead(){

      if(isset($_POST["nuevoNombre"])){
               
          $tabla = "leads";
          $fecha_actual = date('Y-m-d');
      
          $datos =array(
  
            "first_name" => $_POST["nuevoNombre"],
            "last_name" => $_POST["nuevoApellido"],
            "email" => $_POST["nuevoEmail"],
            "phone" => $_POST["nuevoTelefono"],
            "status_lead" => 0,
            "creation_date" => $fecha_actual,
            "origin" => $_POST["origenLead"],
            "note" => $_POST["observaciones"],
            "id_service" => $_POST["nuevoServicio"],
            "id_area" => $_POST["nuevaArea"],
            
          );

          $respuesta = ModeloLeads::mdlRegistrarLead($tabla, $datos);

          if($respuesta == "ok"){
    
            echo'<script>
      
            swal({
                type: "success",
                title: "Un nuevo Lead ha sido registrado",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
                }).then(function(result){
                    if (result.value) {
      
                    window.location = "leads";
      
                    }
                  })
      
            </script>';
      
          } else {
      
            echo'<script>
      
            swal({
                type: "error",
                title: "¡Error al registrar al usuario!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
                }).then(function(result){
                    if (result.value) {
      
                    window.location = "leads";
      
                    }
                  })
      
            </script>';    
          }
      }    
    }	

    static public function ctrVerLeadsFrio($item, $valor){

		$tabla = "leads";

		$respuesta = ModeloLeads::mdlVerLeadfrio($tabla, $item, $valor);

		return $respuesta;
	
	}

	static public function ctrEditarLead(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				$tabla = "leads";


				$datos = array(
                    "first_name" => $_POST["editarNombre"],
					"last_name" => $_POST["editarApellido"],
                    "email" => $_POST["editarCorreo"],
					"phone" => $_POST["editarTelefono"],
					"id_lead"=>$_POST["idLeads"]);

				$respuesta = ModeloLeads::mdlEditarLead($tabla, $datos);


				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "leads";

									}
								})

					</script>';

				}
				
			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "leads";

							}
						})

			  	</script>';

			}

		}

	}

    /*=============================================
                ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarLead(){

		if(isset($_GET["idLeads"])){

			$tabla ="leads";
			$datos = $_GET["idLeads"];

			$respuesta = ModeloLeads::mdlEliminarLead($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido eliminado de la base de datos",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "leads";

									}
								})

					</script>';
			}
		}
		
	}
}
