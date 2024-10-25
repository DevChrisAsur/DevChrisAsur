<?php

require_once "conexion.php";

class ModeloCliente{

/*=============================================
	CREAR CLIENTE
=============================================*/
    
    
static public function mdlRegistrarCliente($tabla, $datos) {
    // Preparar la consulta SQL para insertar datos en la tabla
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cc, first_name, last_name, customer_type, employers, experience_years, email, phone, id_lead, country, state, city) VALUES (:cc, :first_name, :last_name, :customer_type, :employers, :experience_years, :email, :phone, :id_lead, :country, :state, :city)");

    // Enlazar los parámetros con los valores del array $datos
    $stmt->bindParam(":cc", $datos['cc'], PDO::PARAM_STR);
    $stmt->bindParam(":first_name", $datos['first_name'], PDO::PARAM_STR);
    $stmt->bindParam(":last_name", $datos['last_name'], PDO::PARAM_STR);
    $stmt->bindParam(":customer_type", $datos['customer_type'], PDO::PARAM_STR);
    $stmt->bindParam(":employers", $datos['employers'], PDO::PARAM_STR);
    $stmt->bindParam(":experience_years", $datos['experience_years'], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
    $stmt->bindParam(":phone", $datos['phone'], PDO::PARAM_STR);
    $stmt->bindParam(":id_lead", $datos['id_lead'], PDO::PARAM_INT);
    $stmt->bindParam(":country", $datos['country'], PDO::PARAM_STR);
    $stmt->bindParam(":state", $datos['state'], PDO::PARAM_STR);
    $stmt->bindParam(":city", $datos['city'], PDO::PARAM_STR);

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

static public function mdlVerClientes($tabla){

        $stmt = Conexion::conectar()->prepare(
            "SELECT id_customer, cc, country, first_name, last_name, state, city, customer_type, email, phone, id_lead FROM $tabla");

        $stmt -> execute();

        return $stmt -> fetchAll();

    $stmt -> close();
    $stmt = null;

}

static public function mdlVerInfoCliente($tabla, $item, $valor){
    if ($item != null) {
        // Incluimos la cláusula WHERE y el INNER JOIN con leads
        $stmt = Conexion::conectar()->prepare(  
            "SELECT c.id_customer, c.cc, c.country, c.first_name, c.last_name, c.state, c.city, c.customer_type, c.email, c.phone, c.id_lead, l.creation_date 
             FROM $tabla AS c 
             INNER JOIN leads AS l ON c.id_lead = l.id_lead 
             WHERE c.$item = :$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    } else {
        // Si no hay filtro, obtenemos todos los registros con el JOIN
        $stmt = Conexion::conectar()->prepare(
            "SELECT c.*, l.creation_date 
             FROM $tabla AS c 
             INNER JOIN leads AS l ON c.id_lead = l.id_lead");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    $stmt->close();
    $stmt = null;
}


    static public function mdlVerificarUsuario($tabla, $usuario) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE cc = :cc");
            $stmt->bindParam(":cc", $usuario, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            error_log("Consulta ejecutada correctamente. Resultado: " . $count); // Depuración
            $stmt = null;
            return $count;
        } catch (PDOException $e) {
            error_log("Error en la consulta: " . $e->getMessage()); // Depuración de errores de la consulta
            return 0;
        }
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