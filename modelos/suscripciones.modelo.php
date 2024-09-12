<?php 

require_once "conexion.php";

class ModeloSuscripcion{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlRegistrarSuscripcion($tabla, $datos){

		// Prepara la consulta para insertar los datos en la tabla
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (suscripcion_status, start_date, end_date, id_customer, id_service) 
											   VALUES (1, :start_date, :end_date, :id_customer, :id_service)");

		// Asigna los parámetros correctamente
		$stmt->bindParam(":start_date", $datos['start_date'], PDO::PARAM_STR);
		$stmt->bindParam(":end_date", $datos['end_date'], PDO::PARAM_STR);
		$stmt->bindParam(":id_customer", $datos['id_customer'], PDO::PARAM_INT);
		$stmt->bindParam(":id_service", $datos['id_service'], PDO::PARAM_INT);

		// Ejecuta la consulta y verifica si fue exitosa
		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
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

}