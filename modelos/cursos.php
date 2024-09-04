<?php 

require_once "conexion.php";

class ModeloCursos{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarCursos($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(level_grade, clasification) VALUES (:level_grade, :clasification)");

    $stmt->bindParam(":level_grade", $datos['level_grade'], PDO::PARAM_STR);
    $stmt->bindParam(":clasification", $datos['clasification'], PDO::PARAM_STR);


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

	static public function mdlMostrarCursos($tabla, $item, $valor){

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

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET level_grade = :level_grade, 
		clasification = :clasification WHERE id_grade = :id_grade");

		$stmt -> bindParam(":level_grade", $datos["level_grade"], PDO::PARAM_STR);
		$stmt->bindParam(":clasification", $datos['clasification'], PDO::PARAM_STR);
		$stmt -> bindParam(":id_grade", $datos["id_grade"], PDO::PARAM_INT);

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

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_grade = :id_grade");

		$stmt -> bindParam(":id_grade", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

