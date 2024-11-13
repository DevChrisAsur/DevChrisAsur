<?php 
require_once "conexion.php";

class ModeloFacturas {

    /*=============================================
    REGISTRAR FACTURA
    =============================================*/
    static public function mdlRegistrarFactura($tabla, $datos) {
        try {
            $conexion = Conexion::conectar();
            $stmt = $conexion->prepare("INSERT INTO $tabla 
                (fecha_emision, id_customer, id_suscripcion, bank, titular, account_number, account_type, monto, status_factura, fecha_limite) 
                VALUES (:fecha_emision, :id_customer, :id_suscripcion, :bank, :titular, :account_number, :account_type, :monto, :status_factura, :fecha_limite)");
    
            $stmt->bindParam(":fecha_emision", $datos['fecha_emision'], PDO::PARAM_STR);
            $stmt->bindParam(":id_customer", $datos['id_customer'], PDO::PARAM_INT);
            $stmt->bindParam(":id_suscripcion", $datos['id_suscripcion'], PDO::PARAM_INT);
            $stmt->bindParam(":bank", $datos['bank'], PDO::PARAM_STR);
            $stmt->bindParam(":titular", $datos['titular'], PDO::PARAM_STR);
            $stmt->bindParam(":account_number", $datos['account_number'], PDO::PARAM_STR);
            $stmt->bindParam(":account_type", $datos['account_type'], PDO::PARAM_STR);
            $stmt->bindParam(":monto", $datos['monto'], PDO::PARAM_STR);
            $stmt->bindParam(":status_factura", $datos['status_factura'], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_limite", $datos['fecha_limite'], PDO::PARAM_STR);
    
            // Ejecutar la consulta
            if($stmt->execute()) {
                return $conexion->lastInsertId();
            } else {
                error_log("Error en la creación de factura: " . print_r($stmt->errorInfo(), true)); // Agregar esto para registrar el error
                return "error: " . $stmt->errorInfo()[2]; // Devolver el error específico de SQL
            }
            
        } catch (Exception $e) {
            return "Exception: " . $e->getMessage(); // Devolver la excepción en caso de error
        }
    
        $stmt->close();
        $stmt = null;
    }
    

    

    /*=============================================
    MOSTRAR FACTURAS
    =============================================*/
    static public function mdlVerFacturas($tabla, $item, $valor){

        if($item != null){
            // Filtrar por cliente y obtener la factura más reciente con estado 'pendiente'
            $stmt = Conexion::conectar()->prepare(
                "SELECT id_factura,fecha_emision, bank, titular, account_number, account_type, monto, status_factura, fecha_limite 
                 FROM $tabla ");
    
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
    
            return $stmt->fetch();
        } else {
            // Obtener todas las facturas sin filtro
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
    
            return $stmt->fetchAll();
        }
    
        $stmt->close();
        $stmt = null;
    }

    static public function mdlVerFacturasPorCliente($tabla, $item, $valor){

        if($item != null){
            // Filtrar por cliente y obtener la factura más reciente con estado 'pendiente'
            $stmt = Conexion::conectar()->prepare(
                "SELECT id_factura,fecha_emision, bank, titular, account_number, account_type, monto, status_factura, fecha_limite 
                 FROM $tabla 
                 WHERE $item = :$item 
                 AND status_factura = 'pendiente' 
                 ORDER BY fecha_emision DESC 
                 LIMIT 1");
    
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
    
            return $stmt->fetch();
        } else {
            // Obtener todas las facturas sin filtro
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
    
            return $stmt->fetchAll();
        }
    
        $stmt->close();
        $stmt = null;
    }
   
}
