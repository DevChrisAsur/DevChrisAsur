<?php
 
require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY perfil DESC");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY perfil DESC");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		$stmt->close();
		$stmt = null;
	}
	
	/*=============================================
	MOSTRAR ASESORES
	=============================================*/
	static public function mdlMostrarAsesores($tabla, $item, $valor) {
		if ($item != null) {
			// Aquí se añade la condición adicional de perfil = 'Asesor comercial'
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND perfil = 'Asesor comercial'");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		} else {
			// Aquí se añade la condición adicional de perfil = 'Asesor comercial'
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE perfil = 'Asesor comercial'");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		$stmt = null;
	}

	static public function mdlMostrarCoordinadores($tabla, $item, $valor) {
		if ($item != null) {
			// Aquí se añade la condición adicional de perfil = 'Coordinador comercial'
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND perfil = 'Coordinador comercial'");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		} else {
			// Aquí se añade la condición adicional de perfil = 'Coordinador comercial'
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE perfil = 'Coordinador comercial'");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		$stmt = null;
	}
 
	static public function mdlMostrarAsesoresPorCoordinador($tabla, $id_coordinador) {
		$stmt = Conexion::conectar()->prepare("
			SELECT a.*, c.first_name AS coordinador_first_name, c.last_name AS coordinador_last_name
			FROM $tabla a
			LEFT JOIN $tabla c ON c.id = a.id_coordinador
			WHERE a.perfil = 'Asesor comercial' AND a.id_coordinador = :id_coordinador
		");
		$stmt->bindParam(":id_coordinador", $id_coordinador, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}
		
	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(user_status, cc, first_name, last_name, user_name, perfil, area, correo, phone, password, id_coordinador) VALUES (:user_status, :cc, :first_name, :last_name, :user_name, :perfil, :area, :correo, :phone, :password, :id_coordinador)");
		
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
		$stmt->bindParam(":id_coordinador", $datos['id_coordinador'], PDO::PARAM_INT);
	
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
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET user_name = :user_name, perfil = :perfil, area = :area,phone = :phone, correo = :correo, password = :password WHERE id = :id");
		
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt -> bindParam(":user_name", $datos["user_name"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":area", $datos["area"], PDO::PARAM_STR);
		$stmt -> bindParam(":phone", $datos["phone"], PDO::PARAM_STR);
		$stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);



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

		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

		if ($item3) {
			$stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_STR);
		}

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	static public function mdlEstadoUsuario($tabla,$item1,$valor1,$item2,$valor2){
        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
        $stmt -> bindParam(":".$item1,$valor1,PDO::PARAM_STR);
        $stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
        if($stmt->execute()){
         return "ok";
        }else{
         return "error";
        }
        $stmt ->close();
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