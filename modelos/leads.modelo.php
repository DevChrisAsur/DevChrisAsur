<?php

require_once "conexion.php";

class ModeloLeads
{

    /*=============================================
	CREAR CLIENTE
=============================================*/


    static public function mdlRegistrarLead($tabla, $datos){

        // Preparar la consulta SQL para insertar datos en la tabla
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( first_name, last_name, email, phone, status_lead,creation_date, origin, note, id_service, id_area) VALUES ( :first_name, :last_name, :email, :phone, :status_lead, :creation_date, :origin, :note, :id_service, :id_area)");

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

        // Cambiamos la condición para que sea 'frio' en vez de una cadena vacía
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE status_lead = 'Frío' AND $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();
    } else {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE status_lead = 'Frío'");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    $stmt->close();
    $stmt = null;
}

static public function mdlEditarLead($tabla, $datos) {

    // Preparar la consulta SQL para actualizar los datos del lead en la tabla
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone WHERE id_lead = :id_lead");

    // Vincular parámetros con sus respectivos valores
    $stmt->bindParam(":first_name", $datos['first_name'], PDO::PARAM_STR);
    $stmt->bindParam(":last_name", $datos['last_name'], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
    $stmt->bindParam(":phone", $datos['phone'], PDO::PARAM_STR);
    $stmt->bindParam(":id_lead", $datos['id_lead'], PDO::PARAM_INT);
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
}
