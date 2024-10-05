<?php

require_once "conexion.php";

class ModeloCliente{

/*=============================================
	CREAR CLIENTE
=============================================*/
    
    
static public function mdlRegistrarCliente($tabla, $datos) {

    // Preparar la consulta SQL para insertar datos en la tabla
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cc, first_name, last_name, customer_type, employers, experience_years, email, phone,id_lead) VALUES (:cc, :first_name, :last_name, :customer_type, :employers, :experience_years, :email, :phone, :id_lead)");

    // Enlazar los parámetros con los valores del array $datos
    $stmt->bindParam(":cc", $datos['cc'], PDO::PARAM_STR);
    $stmt->bindParam(":first_name", $datos['first_name'], PDO::PARAM_STR);
    $stmt->bindParam(":last_name", $datos['last_name'], PDO::PARAM_STR);
    $stmt->bindParam(":customer_type", $datos['customer_type'], PDO::PARAM_STR);
    $stmt->bindParam(":employers", $datos['employers'], PDO::PARAM_STR);
    $stmt->bindParam(":experience_years", $datos['experience_years'], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
    $stmt->bindParam(":phone", $datos['phone'], PDO::PARAM_STR);
    $stmt->bindParam(":id_lead",$datos['id_lead'], PDO::PARAM_INT);
    // Ejecutar la consulta y manejar el resultado
    if ($stmt->execute()) {
        return "ok";
    } else {
        return "error";
    }

    // Cerrar la conexión
    $stmt->close();
    $stmt = null;
}

/*=============================================
	MOSTRAR CLIENTES
=============================================*/

	static public function mdlVerClientes($tabla, $item, $valor){

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

    static public function mdlVerificarUsuario($tabla, $usuario) {
        // Preparar la consulta SQL para contar el número de registros con el nombre de usuario dado
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE customer_username = :customer_username");
    
        // Enlazar el parámetro
        $stmt->bindParam(":customer_username", $usuario, PDO::PARAM_STR);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Obtener el resultado
        $count = $stmt->fetchColumn();
    
        // No es necesario cerrar explícitamente la conexión. Solo liberamos el objeto.
        $stmt = null;
    
        // Retornar verdadero si ya existe un usuario con ese nombre, falso en caso contrario
        return $count > 0;
    }
    
    
    static public function mdlEliminarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_customer = :id_customer");

		$stmt -> bindParam(":id_customer", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
    
}