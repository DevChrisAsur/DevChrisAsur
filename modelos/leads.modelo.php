<?php

require_once "conexion.php";

class ModeloLeads
{  

/*=============================================
	CREAR CLIENTE
=============================================*/
static public function mdlRegistrarLead($tabla, $datos){
    // Convertir valores vacíos en NULL
    $campos = ['cc','first_name','last_name','email','phone','origin','note','id_service','id_area','sector'];
    foreach($campos as $campo){
        if(!isset($datos[$campo]) || $datos[$campo] === "" ){
            $datos[$campo] = null;
        }
    }

    // Asegurarse de que id_usuario sea INT y no vacío
    $datos['id_usuario'] = isset($datos['id_usuario']) ? (int)$datos['id_usuario'] : null;

    // Preparar la consulta SQL
    $stmt = Conexion::conectar()->prepare(
        "INSERT INTO $tabla(
            cc, first_name, last_name, email, phone, status_lead, creation_date, origin, note, id_service, id_area, id_usuario, sector
        ) VALUES (
            :cc, :first_name, :last_name, :email, :phone, :status_lead, :creation_date, :origin, :note, :id_service, :id_area, :id_usuario, :sector
        )"
    );

    // Bind de parámetros
    $stmt->bindParam(":cc", $datos['cc'], PDO::PARAM_STR);
    $stmt->bindParam(":first_name", $datos['first_name'], PDO::PARAM_STR);
    $stmt->bindParam(":last_name", $datos['last_name'], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
    $stmt->bindParam(":phone", $datos['phone'], PDO::PARAM_STR);
    $stmt->bindParam(":status_lead", $datos['status_lead'], PDO::PARAM_INT);
    $stmt->bindParam(":creation_date", $datos['creation_date'], PDO::PARAM_STR);
    $stmt->bindParam(":origin", $datos['origin'], PDO::PARAM_STR);
    $stmt->bindParam(":note", $datos['note'], PDO::PARAM_STR);
    $stmt->bindParam(":id_service", $datos['id_service'], PDO::PARAM_INT);
    $stmt->bindParam(":id_area", $datos['id_area'], PDO::PARAM_INT);
    $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);
    $stmt->bindParam(":sector", $datos['sector'], PDO::PARAM_STR);

    // Ejecutar consulta
    if($stmt->execute()){
        return "ok";
    } else {
        // Para depuración, podemos devolver info del error
        $errorInfo = $stmt->errorInfo();
        return "error: " . $errorInfo[2];
    }

    // Cerrar conexión
    $stmt->closeCursor();
    $stmt = null;
}


static public function mdlBuscarLeadDuplicado($tabla, $phone, $email, $cc){
    $db = Conexion::conectar();
    $sql = "SELECT id_lead FROM $tabla WHERE 
            (phone IS NOT NULL AND phone = :phone) OR
            (email IS NOT NULL AND email = :email) OR
            (cc IS NOT NULL AND cc = :cc)
            LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':cc', $cc, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch() ?: false;
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
    $query = "SELECT l.id_lead, l.cc, l.sector, l.first_name, l.last_name, l.email, l.phone,
                     l.status_lead, l.id_usuario, l.creation_date, l.origin, l.note,
                     u.id AS id_asesor, u.first_name AS asesor_first_name, u.last_name AS asesor_last_name
              FROM leads l
              INNER JOIN usuarios u ON l.id_usuario = u.id";  

    // Si hay condición ($item y $valor)
    if ($item !== null && $valor !== null) {
        $query .= " WHERE l.$item = :$item";
    }

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
    $stmt = Conexion::conectar()->prepare("
        SELECT COUNT(*) AS total_leads
        FROM leads
        WHERE creation_date = CURDATE()
    ");
    $stmt->execute();

    return $stmt->fetch()['total_leads'];
}

static public function mdlDetalleslead($fechaInicio, $fechaFin) {
    $stmt = Conexion::conectar()->prepare(
        "SELECT first_name, last_name, sector, email, phone
         FROM leads
         WHERE creation_date BETWEEN :fechaInicio AND :fechaFin"
    );

    $stmt->bindParam(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
    $stmt->bindParam(":fechaFin", $fechaFin, PDO::PARAM_STR);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



    static public function mdlMostrarLeadsPorAsesor($tablaLeads, $tablaUsuarios, $id_asesor) {
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

static public function mdlMostrarLeadsPorCoordinador($tablaLeads, $tablaUsuarios, $id_coordinador) {
    $stmt = Conexion::conectar()->prepare(
        "SELECT 
            l.id_lead, l.cc, l.sector, l.first_name, l.last_name, l.phone, 
            CONCAT(u.first_name, ' ', u.last_name) AS asesor, 
            l.status_lead, l.origin, l.note, l.creation_date
        FROM $tablaLeads l
        INNER JOIN $tablaUsuarios u ON l.id_usuario = u.id
        WHERE u.id_coordinador = :idCoordinador
           OR u.id = :idUsuario"
    );

    // Bind de ambos parámetros con el mismo valor
    $stmt->bindParam(":idCoordinador", $id_coordinador, PDO::PARAM_INT);
    $stmt->bindParam(":idUsuario", $id_coordinador, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetchAll();
}



static public function mdlEditarLead($tabla, $datos){
    // Generar SET dinámico solo con los campos que existen
    $campos = [];
    $params = []; // guardaremos solo los que realmente vamos a bindear

    if(isset($datos['first_name'])) { $campos[] = "first_name = :first_name"; $params['first_name'] = $datos['first_name']; }
    if(isset($datos['last_name']))  { $campos[] = "last_name = :last_name";   $params['last_name']  = $datos['last_name']; }
    if(array_key_exists('email', $datos)) { $campos[] = "email = :email"; $params['email'] = $datos['email']; }
    if(array_key_exists('phone', $datos)) { $campos[] = "phone = :phone"; $params['phone'] = $datos['phone']; }
    if(isset($datos['id_usuario'])) { $campos[] = "id_usuario = :id_usuario"; $params['id_usuario'] = $datos['id_usuario']; }

    $sql = "UPDATE $tabla SET " . implode(", ", $campos) . " WHERE id_lead = :id_lead";
    $stmt = Conexion::conectar()->prepare($sql);

    // Bind solo los que están en $params
    foreach($params as $key => $value){
        if($key == "id_usuario"){
            if($value === null){
                $stmt->bindValue(":$key", null, PDO::PARAM_NULL);
            } else {
                $stmt->bindValue(":$key", $value, PDO::PARAM_INT);
            }
        } else {
            $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
        }
    }

    // Bind del id_lead
    $stmt->bindValue(":id_lead", $datos['id_lead'], PDO::PARAM_INT);

    return $stmt->execute() ? "ok" : "error";
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
