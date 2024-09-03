<?php 

require_once "conexion.php";

class ModeloTelefonoP{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlRegistrarTelefonoPadre($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_parent, phone) VALUES (:id_parent, :phone)");

		        // Obtener el último ID insertado en la tabla principal
		$query = "SELECT id_parent FROM parent ORDER BY id_parent DESC LIMIT 1";

			
		$lastInsertIdQuery = "SELECT MAX(id_parent) AS last_id FROM parent";

		$resultado = Conexion::conectar()->query($lastInsertIdQuery);
		$row = $resultado->fetch(PDO::FETCH_ASSOC);
		$lastInsertId = $row['last_id'];

		$stmt->bindParam(":id_parent", $lastInsertId, PDO::PARAM_INT);
    	$stmt->bindParam(":phone", $datos['phone'], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}
 
		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlVerTelefonos($tabla, $item, $valor){

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
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarTelefono($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET phone = :phone WHERE id = :id");

		$stmt -> bindParam(":phone", $datos["phone"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarTelefono($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

