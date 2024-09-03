<?php 

require_once "conexion.php";

class ModeloSedes{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarSedes($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(campus_name, address, email) VALUES (:campus_name, :address, :email)");

    $stmt->bindParam(":campus_name", $datos['campus_name'], PDO::PARAM_STR);
    $stmt->bindParam(":address", $datos['address'], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);

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

	static public function mdlMostrarSedes($tabla, $item, $valor){

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

	static public function mdlEditarSedes($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET campus_name = :campus_name, 
		address = :address, email = :email WHERE id_campus = :id_campus");

		$stmt -> bindParam(":campus_name", $datos["campus_name"], PDO::PARAM_STR);
		$stmt->bindParam(":address", $datos['address'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
		$stmt -> bindParam(":id_campus", $datos["id_campus"], PDO::PARAM_INT);

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

	static public function mdlBorrarSedes($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_campus = :id_campus");

		$stmt -> bindParam(":id_campus", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

