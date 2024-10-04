<?php

require_once "conexion.php";

class ModeloLeads
{  

    static public function mdlActualizarACLiente($tabla, $datos) {

        // Preparar la consulta SQL para obtener los datos del lead
        $stmt = Conexion::conectar()->prepare(
            "SELECT cc, first_name, last_name, email, phone FROM leads WHERE id_lead = :id_lead"
        );
        $stmt->bindParam(":id_lead", $datos['id_lead'], PDO::PARAM_INT);
    
        // Ejecutar la consulta para obtener los datos del lead
        if ($stmt->execute()) {
            // Obtener los datos del lead
            $leadData = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($leadData) {
                // Preparar los datos para registrar al cliente usando los datos obtenidos del lead
                $clienteDatos = array(
                    "cc" => $leadData['cc'],  // Cédula del cliente
                    "first_name" => $leadData['first_name'],
                    "last_name" => $leadData['last_name'],
                    "customer_type" => $datos['customer_type'],  // Tipo de cliente
                    "employers" => $datos['employers'],  // Empleadores del cliente
                    "experience_years" => $datos['experience_years'],  // Años de experiencia
                    "email" => $leadData['email'],
                    "phone" => $leadData['phone'],
                    "customer_username" => $datos['customer_username']  // Nombre de usuario del cliente
                );
    
                // Registrar al cliente en la tabla correspondiente
                $resultadoCliente = ModeloCliente::mdlRegistrarCliente("cliente", $clienteDatos);
    
                if ($resultadoCliente == "ok") {
                    return "ok";  // Todo fue exitoso
                } else {
                    return "error_registro_cliente";  // Error al registrar al cliente
                }
            } else {
                return "error_no_se_encontraron_datos_del_lead";  // No se encontraron datos del lead
            }
        } else {
            return "error_obtener_datos_lead";  // Error al obtener los datos del lead
        }
    
        // Cerrar la conexión
        $stmt->close();
        $stmt = null;
    }
/*=============================================
	CREAR CLIENTE
=============================================*/
    static public function mdlRegistrarLead($tabla, $datos){

        // Preparar la consulta SQL para insertar datos en la tabla
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( cc, first_name, last_name, email, phone, status_lead,creation_date, origin, note, id_service, id_area) VALUES (:cc, :first_name, :last_name, :email, :phone, :status_lead, :creation_date, :origin, :note, :id_service, :id_area)");
        $stmt->bindParam(":cc", $datos['cc'], PDO::PARAM_STR);
        $stmt->bindParam(":first_name", $datos['first_name'], PDO::PARAM_STR);
        $stmt->bindParam(":last_name", $datos['last_name'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(":phone", $datos['phone'], PDO::PARAM_STR);
        $stmt->bindParam(":status_lead", $datos['status_lead'], PDO::PARAM_STR);
        $stmt->bindParam(":creation_date", $datos['creation_date'], PDO::PARAM_STR);
        $stmt->bindParam(":origin", $datos['origin'], PDO::PARAM_STR);
        $stmt->bindParam(":note", $datos['note'], PDO::PARAM_STR);
        $stmt->bindParam(":id_service", $datos['id_service'], PDO::PARAM_INT);
        $stmt->bindParam(":id_area", $datos['id_area'], PDO::PARAM_INT);

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

static public function mdlVerLeadfrio($tabla, $item, $valor){
    if ($item != null) {
        // Incluimos la cláusula WHERE
        $stmt = Conexion::conectar()->prepare(  
            "SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    } else {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    $stmt->close();
    $stmt = null;
}


static public function mdlVerLeadsInteres( $item, $valor){
        // Cambiamos la condición para que sea 'frio' en vez de una cadena vacía
        $query = "SELECT l.id_lead, l.cc, l.first_name, l.last_name, l.email,l.phone,
                    l.status_lead, 
                    l.creation_date, l.origin, l.note, l.id_service, l.id_area, a.law_area, s.service_name
                         FROM leads l INNER JOIN area_derecho a ON l.id_area = a.id_area
                            INNER JOIN servicio s ON l.id_service = s.id_service";	

        $stmt = Conexion::conectar()->prepare($query);	
		if ($item !== null && $valor !== null) {
			$stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
		}	
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->close();
        $stmt = null;
    }

    static public function mdlEditarLead($tabla, $datos) {
        try {
            // Preparamos la consulta para actualizar solo los campos necesarios
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone WHERE id_lead = :id_lead");
    
            // Vinculamos los parámetros
            $stmt->bindParam(":first_name", $datos["first_name"], PDO::PARAM_STR);
            $stmt->bindParam(":last_name", $datos["last_name"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":phone", $datos["phone"], PDO::PARAM_STR);
            $stmt->bindParam(":id_lead", $datos["id_lead"], PDO::PARAM_INT);
    
            // Ejecutamos la consulta
            if ($stmt->execute()) {
                return "ok"; // Devuelve "ok" si la actualización es exitosa
            } else {
                return "error"; // Devuelve "error" si hay un problema
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage(); // Captura el error para depuración
        } finally {
            $stmt = null; // Cierra la conexión
        }
    }
     

    static public function mdlEliminarLead($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_lead = :id_lead");

        $stmt->bindParam(":id_lead", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlEstadoLead($tabla,$item1,$valor1,$item2,$valor2){
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
}
