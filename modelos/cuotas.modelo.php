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
    
    
    

}
