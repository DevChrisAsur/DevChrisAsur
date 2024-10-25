<?php

require_once "conexion.php";

class ModeloLeads
{  

/*=============================================
	CREAR CLIENTE
=============================================*/
static public function mdlRegistrarLead($tabla, $datos){

    // Preparar la consulta SQL para insertar datos en la tabla
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( cc, first_name, last_name, email, phone, status_lead,creation_date, origin, note, id_service, id_area,id_usuario, sector) VALUES ( :cc, :first_name, :last_name, :email, :phone, :status_lead, :creation_date, :origin, :note, :id_service, :id_area, :id_usuario, :sector)");
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
    $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);
    $stmt->bindParam(":sector", $datos['sector'], PDO::PARAM_STR);

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


static public function mdlVerLeadsInteres($item, $valor) {
    // Cambiamos la condición para que sea 'frio' en vez de una cadena vacía
    $query = "SELECT l.id_lead, l.cc, l.sector, l.first_name, l.last_name, l.email, l.phone,
                l.status_lead, l.id_usuario,  -- Agregar la coma aquí
                l.creation_date, l.origin, l.note
             FROM leads l ";  

    $stmt = Conexion::conectar()->prepare($query);	
    if ($item !== null && $valor !== null) {
        $stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
    }	
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->close();
    $stmt = null;
}

static public function mdlContarLeadsDiarios(){
    // Preparamos la consulta para contar los leads registrados hoy
    $stmt = Conexion::conectar()->prepare("
        SELECT COUNT(*) AS total_leads
        FROM leads
        WHERE creation_date = CURDATE()
    ");
    
    // Ejecutamos la consulta
    $stmt->execute();
    
    // Retornamos el resultado
    return $stmt->fetch()['total_leads'];
}


    static public function mdlMostrarLeadsPorAsesor($tablaLeads, $tablaUsuarios, $id_asesor) {
        // Preparamos la consulta para seleccionar los leads registrados por un asesor
        $stmt = Conexion::conectar()->prepare("
            SELECT l.id_lead, l.status_lead, l.cc, l.first_name, l.last_name, l.sector, l.email, l.phone, l.creation_date, l.origin, l.note,
            u.id, u.first_name AS asesor_first_name, u.last_name AS asesor_last_name
            FROM $tablaLeads l
            INNER JOIN $tablaUsuarios u ON l.id_usuario = u.id
            WHERE l.id_usuario = :id
        ");
        
        // Pasamos el parámetro id_asesor a la consulta
        $stmt->bindParam(":id", $id_asesor, PDO::PARAM_INT);
    
        // Ejecutamos la consulta
        $stmt->execute();
    
        // Retornamos los resultados
        return $stmt->fetchAll();
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
