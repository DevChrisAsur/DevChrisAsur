<?php 

require_once "conexion.php";

class ModeloSuscripcion{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlRegistrarSuscripcion($tabla, $datos){

		try {
			// Crear una conexión a la base de datos
			$conexion = Conexion::conectar();
	
			// Prepara la consulta para insertar los datos en la tabla
			$stmt = $conexion->prepare("INSERT INTO $tabla (suscripcion_status, start_date, end_date, id_customer, id_service) 
												   VALUES (1, :start_date, :end_date, :id_customer, :id_service)");
	
			// Asigna los parámetros correctamente
			$stmt->bindParam(":start_date", $datos['start_date'], PDO::PARAM_STR);
			$stmt->bindParam(":end_date", $datos['end_date'], PDO::PARAM_STR);
			$stmt->bindParam(":id_customer", $datos['id_customer'], PDO::PARAM_INT);
			$stmt->bindParam(":id_service", $datos['id_service'], PDO::PARAM_INT);
	
			// Ejecuta la consulta y verifica si fue exitosa
			if ($stmt->execute()) {
				// Usar la conexión para obtener el último ID insertado
				return $conexion->lastInsertId();
			} else {
				return "error";
			}
	
		} catch (Exception $e) {
			// Capturar cualquier excepción y devolver el error
			return "error: " . $e->getMessage();
		}
	
		// Cierra la declaración
		$stmt->close();
		$stmt = null;
	}
	

	public static function mdlObtenerUltimaSuscripcion($tabla, $id_customer) {
		// Prepara la consulta para obtener el último registro de suscripción del cliente
		$stmt = Conexion::conectar()->prepare("SELECT id_suscripcion FROM $tabla WHERE id_customer = :id_customer ORDER BY id_suscripcion DESC LIMIT 1");
		
		// Asigna el parámetro del cliente
		$stmt->bindParam(":id_customer", $id_customer, PDO::PARAM_INT);
	
		// Ejecuta la consulta
		$stmt->execute();
		
		// Obtiene el resultado
		$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
	
		// Verifica si se encontró un resultado
		if ($resultado) {
			return $resultado;
		} else {
			return null;  // Devolver null si no se encuentra ningún registro
		}
	
		// Cierra la declaración
		$stmt->close();
		$stmt = null;
	}
	

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlVerSuscripciones($tabla, $item, $valor){

		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}

		/*=============================================
	MOSTRAR SUSCRIPCIONES
	=============================================*/
	static public function mdlVerSuscripcionCliente($item, $valor) {
		$query = "SELECT 
					s.id_suscripcion,
					s.suscripcion_status, s.start_date, s.end_date, s.id_service,
					c.id_customer, 
					c.first_name, c.last_name,
					sv.service_name
					FROM suscripcion s
						INNER JOIN cliente c ON s.id_customer = c.id_customer
						INNER JOIN servicio sv ON s.id_service = sv.id_service;
					";	
		$stmt = Conexion::conectar()->prepare($query);	
		if ($item !== null && $valor !== null) {
			$stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
		}	
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}