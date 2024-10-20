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
                (id_factura, monto, vecha_fencimiento, estado_pago, fecha_pago) 
                VALUES (:id_factura, :monto, :vecha_fencimiento, :estado_pago, :fecha_pago)");
    
            // Asignar los valores a los parámetros de la consulta
            $stmt->bindParam(":id_factura", $datos['id_factura'], PDO::PARAM_INT);
            $stmt->bindParam(":monto", $datos['monto'], PDO::PARAM_STR);
            $stmt->bindParam(":vecha_fencimiento", $datos['vecha_fencimiento'], PDO::PARAM_STR);
            $stmt->bindParam(":estado_pago", $datos['estado_pago'], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_pago", $datos['fecha_pago'], PDO::PARAM_STR);
    
            // Ejecutar la consulta
            if($stmt->execute()) {
				return $conexion->lastInsertId();
            } else {
                error_log("Error en la creación de cuota: " . print_r($stmt->errorInfo(), true)); // Registrar el error
                return "error: " . $stmt->errorInfo()[2]; // Devolver el error específico de SQL
            }
    
        } catch (Exception $e) {
            return "Exception: " . $e->getMessage(); // Devolver la excepción en caso de error
        }
    
        // Cerrar la conexión
        $stmt->close();
        $stmt = null;
    }
    

}
