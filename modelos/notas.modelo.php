<?php 

require_once "conexion.php";

class ModeloNotas {

    /*=============================================
    CREAR NOTA
    =============================================*/

static public function mdlIngresarNota($tabla, $datos) {
    try {
        $conexion = Conexion::conectar();

        $stmt = $conexion->prepare("
            INSERT INTO $tabla (id_customer, id_lead, titulo, contenido, fecha_creacion, nombre_archivo, id_usuario) 
            VALUES (:id_customer, :id_lead, :titulo, :contenido, :fecha_creacion, :nombre_archivo, :id_usuario)
        ");

        $stmt->bindParam(":id_customer", $datos['id_customer'], PDO::PARAM_INT);
        $stmt->bindParam(":id_lead", $datos['id_lead'], PDO::PARAM_INT);
        $stmt->bindParam(":titulo", $datos['titulo'], PDO::PARAM_STR);
        $stmt->bindParam(":contenido", $datos['contenido'], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_creacion", $datos['fecha_creacion'], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_archivo", $datos['nombre_archivo'], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            error_log("Error en la creación de la nota: " . print_r($stmt->errorInfo(), true));
            return "error: " . $stmt->errorInfo()[2];
        }
    } catch (Exception $e) {
        error_log("Exception al crear la nota: " . $e->getMessage());
        return "Exception: " . $e->getMessage();
    }

    $stmt->close();
    $stmt = null;
}


    
    

    /*=============================================
    MOSTRAR NOTAS
    =============================================*/

    static public function mdlMostrarNotas($tabla, $item, $valor) {
        if($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        $stmt -> close();
        $stmt = null;
    }

    public static function mdlObtenerNotasPorCliente($tabla, $idCliente) {
        $stmt = Conexion::conectar()->prepare(
            "SELECT n.*, u.user_name
            FROM $tabla n
            INNER JOIN usuarios u ON n.id_usuario = u.id
            WHERE n.id_customer = :id_customer
            ORDER BY n.fecha_creacion DESC
        ");

        $stmt->bindParam(":id_customer", $idCliente, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

public static function mdlObtenerNotasPorLead($tabla, $idLead) {
    $stmt = Conexion::conectar()->prepare(
        "SELECT n.*, u.user_name
        FROM $tabla n
        INNER JOIN usuarios u ON n.id_usuario = u.id
        WHERE n.id_lead = :id_lead
        ORDER BY n.fecha_creacion DESC"
    );

    $stmt->bindParam(":id_lead", $idLead, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}


    /*=============================================
    EDITAR NOTA
    =============================================*/

    static public function mdlEditarNota($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_customer = :id_customer, id = :id, titulo = :titulo, contenido = :contenido, fecha_creacion = :fecha_creacion WHERE id_nota = :id_nota");

        $stmt -> bindParam(":id_customer", $datos["id_customer"], PDO::PARAM_INT);
        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt -> bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
        $stmt -> bindParam(":fecha_creacion", $datos["fecha_creacion"], PDO::PARAM_STR);
        $stmt -> bindParam(":id_nota", $datos["id_nota"], PDO::PARAM_INT);

        if($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    BORRAR NOTA
    =============================================*/

    static public function mdlBorrarNota($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_nota = :id_nota");

        $stmt -> bindParam(":id_nota", $datos, PDO::PARAM_INT);

        if($stmt -> execute()) {
            return "ok";
        } else {
            return "error";    
        }

        $stmt -> close();
        $stmt = null;
    }
}
