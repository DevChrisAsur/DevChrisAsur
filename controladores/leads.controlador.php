<?php

class ControladorLeads
{

static public function ctrRegistrarLead(){
    if(!isset($_POST["form_token"]) || $_POST["form_token"] !== $_SESSION["form_token"]){
    return; // Token inválido o recarga, no procesa nada
    }
    unset($_SESSION["form_token"]);
    date_default_timezone_set('America/Bogota');

    if(isset($_POST["nuevoNombre"])){

        $tabla = "leads";
        $fecha_actual = date('Y-m-d');

        $id_usuario = isset($_SESSION["id"]) ? (int) $_SESSION["id"] : 0;

        if(!empty($_POST["AsignarAsesor"]) && $_POST["AsignarAsesor"] != "0"){
            $id_usuario = (int) $_POST["AsignarAsesor"];
        }

        // 🚨 Verificar duplicados (phone, email, cc)
        $duplicado = ModeloLeads::mdlBuscarLeadDuplicado(
            $tabla,
            !empty($_POST["nuevoTelefono"]) ? $_POST["nuevoTelefono"] : null,
            !empty($_POST["nuevoEmail"]) ? $_POST["nuevoEmail"] : null,
            !empty($_POST["nuevoIdLead"]) ? $_POST["nuevoIdLead"] : null
        );

        if($duplicado){
            echo '<script>
                swal({
                    type: "error",
                    title: "¡Este lead ya existe!",
                    text: "Se encontró un duplicado por teléfono, email o documento.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location = "leads";
                    }
                })
            </script>';
            exit;
        }
        $datos = [
            "cc"            => !empty($_POST["nuevoIdLead"]) ? $_POST["nuevoIdLead"] : null,
            "first_name"    => !empty($_POST["nuevoNombre"]) ? $_POST["nuevoNombre"] : null,
            "last_name"     => !empty($_POST["nuevoApellido"]) ? $_POST["nuevoApellido"] : null,
            "email"         => !empty($_POST["nuevoEmail"]) ? $_POST["nuevoEmail"] : null,
            "phone"         => !empty($_POST["nuevoTelefono"]) ? $_POST["nuevoTelefono"] : null,
            "status_lead"   => 0,
            "creation_date" => $fecha_actual,
            "origin"        => !empty($_POST["origenLead"]) ? $_POST["origenLead"] : null,
            "note"          => !empty($_POST["observaciones"]) ? $_POST["observaciones"] : null,
            "id_service"    => !empty($_POST["nuevoServicio"]) ? (int)$_POST["nuevoServicio"] : null,
            "id_area"       => !empty($_POST["nuevaArea"]) ? (int)$_POST["nuevaArea"] : null,
            "sector"        => !empty($_POST["nuevoSector"]) ? $_POST["nuevoSector"] : null,
            "id_usuario"    => $id_usuario
        ];

        $respuesta = ModeloLeads::mdlRegistrarLead($tabla, $datos);

        if($respuesta == "ok"){
            echo '<script>
                swal({
                    type: "success",
                    title: "Un nuevo Lead ha sido registrado",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location = "leads";
                    }
                });
            </script>';
            exit;
        } else {
            echo '<script>
                swal({
                    type: "error",
                    title: "¡Error al registrar el lead!",
                    text: "'.$respuesta.'",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location = "leads";
                    }
                })
            </script>';
            exit;
        }
    }
}

	static public function ctrContarLeadsDiarios()
	{

		// Llamamos al modelo que hace la consulta de leads diarios
		$respuesta = ModeloLeads::mdlContarLeadsDiarios();

		// Retornamos la respuesta del modelo, que contiene el conteo de leads
		return $respuesta;
	}

	static public function ctrVerDetalleslead()
	{

		$fechaActual = new DateTime();
		$año = $fechaActual->format("Y");
		$mes = $fechaActual->format("m");
		$dia = $fechaActual->format("d");

		if ($dia >= 1 && $dia <= 15) {
			$fechaInicio = "$año-$mes-01";
			$fechaFin = "$año-$mes-15";
			$rangoFecha = "1 al 15 de " . $fechaActual->format("M Y");
		} else {
			$fechaInicio = "$año-$mes-16";
			$fechaFin = "$año-$mes-" . $fechaActual->format("t");
			$rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");
		}

		$respuesta = ModeloLeads::mdlDetalleslead($fechaInicio, $fechaFin);


		return [
			'detalles' => $respuesta ?: [],
			'rango_fecha' => $rangoFecha
		];
	}

	static public function ctrVerLeadsFrio($item, $valor)
	{

		$tabla = "leads";

		$respuesta = ModeloLeads::mdlVerLeadfrio($tabla, $item, $valor);

		return $respuesta;
	}

	static public function  ctrVerInteresLead($item, $valor)
	{
		$respuesta = ModeloLeads::mdlVerLeadsInteres($item, $valor);
		return $respuesta;
	}

	static public function ctrVerLeadAsesor($id_asesor)
	{

		$tablaLeads = "leads";
		$tablaUsuarios = "usuarios";

		// Llamamos al modelo para obtener los leads del asesor
		$respuesta = ModeloLeads::mdlMostrarLeadsPorAsesor($tablaLeads, $tablaUsuarios, $id_asesor);

		return $respuesta;
	}

	static public function ctrVerLeadsCoordinador($id_coordinador)
	{

		$tablaLeads = "leads";
		$tablaUsuarios = "usuarios";

		// Llamamos al modelo para obtener los leads del asesor
		$respuesta = ModeloLeads::mdlMostrarLeadsPorCoordinador($tablaLeads, $tablaUsuarios, $id_coordinador);

		return $respuesta;
	}


static public function ctrEditarLead(){
    if(isset($_POST["editarNombre"])) {

        // Limpiar valores
        $first_name = trim($_POST["editarNombre"]);
        $last_name  = trim($_POST["editarApellido"]);
        $email      = !empty($_POST["editarCorreo"]) ? trim($_POST["editarCorreo"]) : null;
        $phone      = !empty($_POST["editarTelefono"]) ? trim($_POST["editarTelefono"]) : null;
        $id_lead    = (int) $_POST["idLeads"];

        // Preparar datos a actualizar
        $datos = [
            "first_name" => $first_name,
            "last_name"  => $last_name,
            "email"      => $email,
            "phone"      => $phone,
            "id_lead"    => $id_lead
        ];

        // Solo actualizar id_usuario si viene en el POST y no es 0
        if(isset($_POST["reasignarAsesor"]) && $_POST["reasignarAsesor"] != "0"){
            $datos["id_usuario"] = (int) $_POST["reasignarAsesor"];
        }

        // Llamar al modelo
        $respuesta = ModeloLeads::mdlEditarLead("leads", $datos);

        return $respuesta; // "ok" o "error"
    }
}





	/*=============================================
                ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarLead()
	{

		if (isset($_GET["idLeads"])) {

			$tabla = "leads";
			$datos = $_GET["idLeads"];

			$respuesta = ModeloLeads::mdlEliminarLead($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "El lead ha sido eliminado de la base de datos",
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
