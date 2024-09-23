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
            "status_lead" => "Frio",
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
    static public function ctrVerLeadsMQL($item, $valor){

		$tabla = "leads";

		$respuesta = ModeloLeads::mdlVerLeadMQL($tabla, $item, $valor);

		return $respuesta;
	
	}

    static public function ctrVerLeadsSQL($item, $valor){

		$tabla = "leads";

		$respuesta = ModeloLeads::mdlVerLeadSQL($tabla, $item, $valor);

		return $respuesta;
	
	}

    /*=============================================
                ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="cliente";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloCliente::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido eliminado de la base de datos",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';
			}
		}
		
	}
}
