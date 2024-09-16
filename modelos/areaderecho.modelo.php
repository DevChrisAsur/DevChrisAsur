<?php 

require_once "conexion.php";

class ModeloAreasDerecho{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlRegistrarAreaDerecho($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(law_area) VALUES (:law_area)");

    $stmt->bindParam(":law_area", $datos['law_area'], PDO::PARAM_STR);



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

	static public function mdlVerAreaDerecho($tabla, $item, $valor){

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

	static public function mdlEditarAreaDerecho($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET law_area = :law_area WHERE id_area = :id_area");
	
		$stmt->bindParam(":law_area", $datos["law_area"], PDO::PARAM_STR);
		$stmt->bindParam(":id_area", $datos["id_area"], PDO::PARAM_INT);
	
		if($stmt->execute()){
			return "ok";
		} else {
			return "error";
		}
	
		$stmt->close();
		$stmt = null;
	}
	

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarAreaDerecho($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_area = :id_area");

		$stmt -> bindParam(":id_area", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

