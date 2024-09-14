<?php

require_once "conexion.php";

class ModeloLeads
{

    /*=============================================
	CREAR CLIENTE
=============================================*/


    static public function mdlRegistrarLead($tabla, $datos){

        // Preparar la consulta SQL para insertar datos en la tabla
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( first_name, last_name, email, phone, status_lead, origin, note) VALUES ( :first_name, :last_name, :email, :phone, :status_lead,:origin, :note)");

        $stmt->bindParam(":first_name", $datos['first_name'], PDO::PARAM_STR);
        $stmt->bindParam(":last_name", $datos['last_name'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $stmt->bindParam(":phone", $datos['phone'], PDO::PARAM_STR);
        $stmt->bindParam(":status_lead", $datos['status_lead'], PDO::PARAM_STR);
        $stmt->bindParam(":origin", $datos['origin'], PDO::PARAM_STR);
        $stmt->bindParam(":note", $datos['note'], PDO::PARAM_STR);

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

static public function mdlVerLeadMQL($tabla, $item, $valor)
{
    if ($item != null) {

        // Cambiamos la condición para que sea 'frio' en vez de una cadena vacía
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE status_lead = 'MQL' AND $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();
    } else {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE status_lead = 'MQL'");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    $stmt->close();
    $stmt = null;
}

static public function mdlVerLeadSQL($tabla, $item, $valor)
{
    if ($item != null) {

        // Cambiamos la condición para que sea 'frio' en vez de una cadena vacía
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE status_lead = 'SQL' AND $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();
    } else {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE status_lead = 'SQL'");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    $stmt->close();
    $stmt = null;
}



    static public function mdlEliminarCliente($tabla, $datos)
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
