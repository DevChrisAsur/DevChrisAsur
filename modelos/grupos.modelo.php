<?php

require_once "conexion.php";

class ModeloGrupo{

/*=============================================
CREAR CATEGORIA
=============================================*/

    static public function mdlAsignarGrupoProfesor($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id, id_grade) VALUES (:id, :id_grade)");

    $stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);
    $stmt->bindParam(":id_grade", $datos['id_grade'], PDO::PARAM_INT);


    if($stmt->execute()){

        return "ok";

    }else{

        return "error";

    }

    $stmt->close();
    $stmt = null;

    }

    static public function mdlEditarGrupoProfesor($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id = :id, id_grade  = :id_grade WHERE id = :id");
		
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_grade", $datos["id_grade"], PDO::PARAM_INT);

		//echo $datos["oficina"];
		//return;


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}