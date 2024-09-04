<?php
 
require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

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

	// static public function mdlMostrarProfesores($tabla, $item, $valor) {
	// 	if ($item != null) {
	// 		// Aquí se añade la condición adicional de perfil = 'profesor'
	// 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND perfil = 'Profesor'");
	// 		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
	// 		$stmt->execute();
	// 		return $stmt->fetch();
	// 	} else {
	// 		// Aquí se añade la condición adicional de perfil = 'profesor'
	// 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE perfil = 'Profesor'");
	// 		$stmt->execute();
	// 		return $stmt->fetchAll();
	// 	}
	
	// 	// No es necesario cerrar explícitamente el statement en PDO, PHP lo hace automáticamente al finalizar el script
	// 	$stmt = null;
	// }
	
	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(estado, identificacion, nombre, usuario, perfil, area, correo,  password) VALUES (:estado, :identificacion, :nombre, :usuario, :perfil, :area, :correo,  :password)");
    	$stmt->bindParam(":estado", $datos['estado'], PDO::PARAM_INT);
	    $stmt->bindParam(":identificacion", $datos['identificacion'], PDO::PARAM_STR);
    	$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
    	$stmt->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
    	$stmt->bindParam(":perfil", $datos['perfil'], PDO::PARAM_STR);
    	$stmt->bindParam(":area", $datos['area'], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);				

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
 
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, correo = :correo, nombre = :nombre, password = :password, perfil = :perfil, area = :area WHERE id = :id");
		
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":area", $datos["area"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

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

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

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