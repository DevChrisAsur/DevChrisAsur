<?php 
require_once "conexion.php";

class ModeloCuotas {

    /*=============================================
    REGISTRAR CUOTA
    =============================================*/

    static public function mdlRegistrarCuotas($tabla, $datos) {
        try {
            $conexion = Conexion::conectar();
            
            // Preparar la consulta SQL para insertar los datos en la tabla de cuotas
            $stmt = $conexion->prepare("INSERT INTO $tabla 
                (id_factura, monto, fecha_vencimiento, estado_pago, fecha_pago) 
                VALUES (:id_factura, :monto, :fecha_vencimiento, :estado_pago, :fecha_pago)");
    
            // Asignar los valores a los parámetros de la consulta
            $stmt->bindParam(":id_factura", $datos['id_factura'], PDO::PARAM_INT);
            $stmt->bindParam(":monto", $datos['monto'], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_vencimiento", $datos['fecha_vencimiento'], PDO::PARAM_STR);
            $stmt->bindParam(":estado_pago", $datos['estado_pago'], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_pago", $datos['fecha_pago'], PDO::PARAM_STR);
    
            // Ejecutar la consulta
            if($stmt->execute()) {
                return "ok";
            } else {
                // Registrar el error con más detalles
                error_log("Error en la creación de cuota: " . print_r($stmt->errorInfo(), true)); 
                return "error: " . $stmt->errorInfo()[2];
            }
    
        } catch (Exception $e) {
            // Devolver el error en caso de excepción
            error_log("Exception en mdlRegistrarCuotas: " . $e->getMessage());
            return "Exception: " . $e->getMessage(); 
        } finally {
            // Asegurarse de liberar los recursos de la base de datos
            $stmt = null;
            $conexion = null;
        }
    }
    
static public function mdlVerCuotasPorFactura($tabla, $item, $valor) {

        $stmt = Conexion::conectar()->prepare(
            "SELECT id_cuota, id_factura, monto, fecha_vencimiento, estado_pago, fecha_pago 
             FROM $tabla 
             WHERE $item = :$item 
             ORDER BY fecha_vencimiento ASC"
        );

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    static public function mdlVerTransfer($tabla, $fechaInicio, $fechaFin) {
        $stmt = Conexion::conectar()->prepare("SELECT SUM(monto) AS monto_total FROM $tabla 
                                               WHERE fecha_vencimiento >= :fechaInicio AND fecha_vencimiento <= :fechaFin");   
        $stmt->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
        $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
    
        $stmt->execute();
        return $stmt->fetch();
    }

    static public function mdlVerProceso($tabla, $fechaInicio, $fechaFin) {
        $stmt = Conexion::conectar()->prepare("SELECT SUM(monto) AS monto_total FROM $tabla 
                                               WHERE estado_pago = 'En proceso'
                                               AND fecha_vencimiento >= :fechaInicio 
                                               AND fecha_vencimiento <= :fechaFin");
        
        $stmt->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
        $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
    
        $stmt->execute();
        return $stmt->fetch();
    }
    
    static public function mdlContarCuotasEnProceso($tabla) {
        $stmt = Conexion::conectar()->prepare("
            SELECT COUNT(*) AS total_cuotas
            FROM $tabla
            WHERE estado_pago = 'En proceso'
        ");
        
        // Ejecutamos la consulta
        $stmt->execute();
        
        // Retornamos el resultado
        return $stmt->fetch()['total_cuotas'];
    }
    
    static public function mdlVerRecaudo($tabla, $fechaInicio, $fechaFin) {
        $stmt = Conexion::conectar()->prepare("SELECT SUM(monto) AS monto_total FROM $tabla 
                                               WHERE estado_pago = 'Aprobado'
                                               AND fecha_vencimiento >= :fechaInicio 
                                               AND fecha_vencimiento <= :fechaFin");
        
        $stmt->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
        $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);
    
        $stmt->execute();
        return $stmt->fetch();
    }

    static public function mdlEditarCuota($tabla, $datos) {
        try {
            // Preparamos la consulta para actualizar solo los campos necesarios
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                                                   SET fecha_vencimiento = :fecha_vencimiento, 
                                                       estado_pago = :estado_pago, 
                                                       fecha_pago = :fecha_pago 
                                                   WHERE id_cuota = :id_cuota");
    
            // Vinculamos los parámetros
            $stmt->bindParam(":fecha_vencimiento", $datos["fecha_vencimiento"], PDO::PARAM_STR);
            $stmt->bindParam(":estado_pago", $datos["estado_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);
            $stmt->bindParam(":id_cuota", $datos["id_cuota"], PDO::PARAM_INT);
    
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
    

}
