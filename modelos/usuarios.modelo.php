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
 
	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(user_status, cc, first_name, last_name, user_name, perfil, area, correo, phone, password) VALUES (:user_status, :cc, :first_name, :last_name, :user_name, :perfil, :area, :correo, :phone, :password)");
		
		$stmt->bindParam(":user_status", $datos['user_status'], PDO::PARAM_INT);
		$stmt->bindParam(":cc", $datos['cc'], PDO::PARAM_STR);
		$stmt->bindParam(":first_name", $datos['first_name'], PDO::PARAM_STR);
		$stmt->bindParam(":last_name", $datos['last_name'], PDO::PARAM_STR);
		$stmt->bindParam(":user_name", $datos['user_name'], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos['perfil'], PDO::PARAM_STR);
		$stmt->bindParam(":area", $datos['area'], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
		$stmt->bindParam(":phone", $datos['phone'], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
	
		if($stmt->execute()){
			return "ok";
		} else {
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

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2, $item3 = null, $valor3 = null) {
		$query = "UPDATE $tabla SET $item1 = :$item1";
		if ($item3) {
			$query .= ", $item3 = :$item3";
		}
		$query .= " WHERE $item2 = :$item2";
		
		$stmt = conexion::conectar()->prepare($query);
	
		$stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		
		if ($item3) {
			$stmt->bindParam(":".$item3, $valor3, PDO::PARAM_STR);
		}
	
		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
	
		$stmt->close();
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