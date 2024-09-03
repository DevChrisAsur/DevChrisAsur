<?php
 
require_once "conexion.php";

class ModeloPension{

	/*=============================================
	MOSTRAR Estudiantes
	=============================================*/

	static public function mdlMostrarPensionConEstudiantes($item, $valor) {
    // $query = "SELECT p.*, st.first_name,st.last_name,
				// 	pt.first_name_parent, pt.last_name_parent
				// FROM pension p
				// INNER JOIN student st
				// 	ON st.id_student = p.id_student
				// INNER JOIN student_parent sp
				// 	ON st.id_student = sp.id_student
				// INNER JOIN parent pt
				// 	ON pt.id_parent = sp.id_parent";
        $query="SELECT p.*, st.first_name,st.last_name, pt.id_parent, pt.first_name_parent, pt.last_name_parent, ph.phone, ps.* FROM pension p INNER JOIN student_pension ps ON p.id_pension = ps.id_pension INNER JOIN student st ON st.id_student = ps.id_student INNER JOIN student_parent sp ON st.id_student = sp.id_student INNER JOIN parent pt ON pt.id_parent = sp.id_parent INNER JOIN parent_phone ph ON ph.id_parent = pt.id_parent";

    if ($item !== null && $valor !== null) {
        $query .= " WHERE st.$item = :$item";
    }

    $stmt = Conexion::conectar()->prepare($query);

    if ($item !== null && $valor !== null) {
        $stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
    }

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}



    static public function mdlValidarAcudienteConEstudiante($item, $valor) {
    $query = "SELECT p.id_parent, p.cc_parent, p.first_name_parent, p.last_name_parent, p.email, st.id_student, st.first_name, st.last_name, pf.phone 
              FROM parent p 
              INNER JOIN student_parent sp ON p.id_parent = sp.id_parent 
              INNER JOIN student st ON sp.id_student = st.id_student 
              INNER JOIN parent_phone pf ON p.id_parent = pf.id_parent";

    if ($item !== null && $valor !== null) {
        $query .= " WHERE st.$item = :$item";
    }

    $stmt = Conexion::conectar()->prepare($query);

    if ($item !== null && $valor !== null) {
        $stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
    }

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

	static public function mdlMostrarPensiones($tabla, $item, $valor) {
    if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	}



	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	// static public function mdlIngresarPension($tabla, $datos){

	// 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(scholar_year, pension_date, pension_cost, pay_date, route_state, route_type, lunch_state, lunch_type, cont_lunch ,extracurricular_course_status, extracurricular_course_type, pension_observation, current_month, interest_monthly, route_price, lunch_price, extracurricular_course_total, monthly_payment) VALUES (:scholar_year, :pension_date, :pension_cost, :pay_date, :route_state, :route_type, :lunch_state, :lunch_type, :cont_lunch, :extracurricular_course_status, :extracurricular_course_type, :pension_observation, :current_month, :interest_monthly, :route_price, :lunch_price, :extracurricular_course_total, :monthly_payment");
	// 	$stmt->bindParam(":scholar_year", $datos['scholar_year'], PDO::PARAM_INT);
	// 	$stmt->bindParam(":pension_date", $datos['pension_date'], PDO::PARAM_STR);
 //    	$stmt->bindParam(":pension_cost", $datos['pension_cost'], PDO::PARAM_STR);
 //    	$stmt->bindParam(":pay_date", $datos['pay_date'], PDO::PARAM_STR);
 //    	$stmt->bindParam(":route_state", $datos['route_state'], PDO::PARAM_INT);
 //    	$stmt->bindParam(":route_type", $datos['route_type'], PDO::PARAM_INT);
 //    	$stmt->bindParam(":lunch_state", $datos['lunch_state'], PDO::PARAM_INT);
 //    	$stmt->bindParam(":lunch_type", $datos['lunch_type'], PDO::PARAM_INT);
 //    	$stmt->bindParam(":cont_lunch", $datos['cont_lunch'], PDO::PARAM_INT);
 //    	$stmt->bindParam(":extracurricular_course_status", $datos['extracurricular_course_status'], PDO::PARAM_INT);
 //    	$stmt->bindParam(":extracurricular_course_type", $datos['extracurricular_course_type'], PDO::PARAM_STR);
 //    	$stmt->bindParam(":pension_observation", $datos['pension_observation'], PDO::PARAM_STR);
 //        $stmt->bindParam(":current_month", $datos['current_month'], PDO::PARAM_STR);
 //    	$stmt->bindParam(":interest_monthly", $datos['interest_monthly'], PDO::PARAM_INT);
 //    	$stmt->bindParam(":route_price", $datos['route_price'], PDO::PARAM_INT);
 //    	$stmt->bindParam(":lunch_price", $datos['lunch_price'], PDO::PARAM_INT);
 //    	$stmt->bindParam(":extracurricular_course_total", $datos['extracurricular_course_total'], PDO::PARAM_INT);
 //    	$stmt->bindParam(":monthly_payment", $datos['monthly_payment'], PDO::PARAM_STR);
 //    	$stmt->bindParam(":id_student", $datos['id_student'], PDO::PARAM_INT);
		

	// 	if($stmt->execute()){

	// 		return "ok";	

	// 	}else{

	// 		return "error";
		
	// 	}

	// 	$stmt->close();
		
	// 	$stmt = null;
 
	// }




 static public function mdlIngresarPension($tabla, $datos) {
    // Preparar la consulta para insertar en la tabla principal
    $stmt = Conexion::conectar()->prepare("
        INSERT INTO $tabla (
            scholar_year, pension_date, pension_cost, pay_date, route_state, 
            route_type, lunch_state, lunch_type, cont_lunch, 
            extracurricular_course_status, extracurricular_course_type, 
            pension_observation, current_month, interest_monthly, 
            route_price, lunch_price, extracurricular_course_total, 
            monthly_payment
        ) VALUES (
            :scholar_year, :pension_date, :pension_cost, :pay_date, :route_state, 
            :route_type, :lunch_state, :lunch_type, :cont_lunch, 
            :extracurricular_course_status, :extracurricular_course_type, 
            :pension_observation, :current_month, :interest_monthly, 
            :route_price, :lunch_price, :extracurricular_course_total, 
            :monthly_payment
        )
    ");

    // Verificar si la declaración se preparó correctamente
    if ($stmt) {
        // Ejecutar la inserción en la tabla principal
        $stmt->bindParam(":scholar_year", $datos['scholar_year'], PDO::PARAM_INT);
        $stmt->bindParam(":pension_date", $datos['pension_date'], PDO::PARAM_STR);
        $stmt->bindParam(":pension_cost", $datos['pension_cost'], PDO::PARAM_STR);
        $stmt->bindParam(":pay_date", $datos['pay_date'], PDO::PARAM_STR);
        $stmt->bindParam(":route_state", $datos['route_state'], PDO::PARAM_INT);
        $stmt->bindParam(":route_type", $datos['route_type'], PDO::PARAM_INT);
        $stmt->bindParam(":lunch_state", $datos['lunch_state'], PDO::PARAM_INT);
        $stmt->bindParam(":lunch_type", $datos['lunch_type'], PDO::PARAM_INT);
        $stmt->bindParam(":cont_lunch", $datos['cont_lunch'], PDO::PARAM_INT);
        $stmt->bindParam(":extracurricular_course_status", $datos['extracurricular_course_status'], PDO::PARAM_INT);
        $stmt->bindParam(":extracurricular_course_type", $datos['extracurricular_course_type'], PDO::PARAM_STR);
        $stmt->bindParam(":pension_observation", $datos['pension_observation'], PDO::PARAM_STR);
        $stmt->bindParam(":current_month", $datos['current_month'], PDO::PARAM_STR);
        $stmt->bindParam(":interest_monthly", $datos['interest_monthly'], PDO::PARAM_INT);
        $stmt->bindParam(":route_price", $datos['route_price'], PDO::PARAM_INT);
        $stmt->bindParam(":lunch_price", $datos['lunch_price'], PDO::PARAM_INT);
        $stmt->bindParam(":extracurricular_course_total", $datos['extracurricular_course_total'], PDO::PARAM_INT);
        $stmt->bindParam(":monthly_payment", $datos['monthly_payment'], PDO::PARAM_STR);
        
        if (!$stmt->execute()) {
            return "error";
        }

        // Obtener el último ID insertado en la tabla principal
        $query = "SELECT id_pension FROM pension ORDER BY id_pension DESC LIMIT 1";

            
            $lastInsertIdQuery = "SELECT MAX(id_pension) AS last_id FROM pension";
           
        $resultado = Conexion::conectar()->query($lastInsertIdQuery);
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $lastInsertId = $row['last_id'];        
        // Preparar la consulta para insertar en la tabla adicional
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO student_pension (id_pension, id_student) VALUES (:id_pension, :id_student)");
        
        // Insertar cada valor de id_student en la tabla adicional
        $stmt2->bindParam(":id_pension", $lastInsertId, PDO::PARAM_INT);
        $stmt2->bindParam(":id_student", $datos['id_student'], PDO::PARAM_INT);
        
        if (!$stmt2->execute()) {
            return "error";
        }
        
        return "ok";
    } else {
        return "error";
    }
}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarPension($tabla, $datos){
		 $stmt = Conexion::conectar()->prepare(
        "UPDATE $tabla 
        SET scholar_year = :scholar_year, 
            pension_date = :pension_date, 
            pension_cost = :pension_cost, 
            pay_date = :pay_date, 
            route_state = :route_state, 
            route_type = :route_type, 
            lunch_state = :lunch_state,
            lunch_type = :lunch_type, 
            assignment_lunch = :assignment_lunch,
            cont_lunch = :cont_lunch, 
            extracurricular_course_status = :extracurricular_course_status, 
            extracurricular_course_type = :extracurricular_course_type, 
            pension_observation = :pension_observation, 
            interest_monthly = :interest_monthly,
            route_price = :route_price, 
            lunch_price = :lunch_price, 
            extracurricular_course_total = :extracurricular_course_total, 
            monthly_payment = :monthly_payment
        WHERE id_pension = :id_pension"
    );

    $stmt->bindParam(":id_pension", $datos["id_pension"], PDO::PARAM_INT);
    $stmt->bindParam(":scholar_year", $datos['scholar_year'], PDO::PARAM_INT);
    $stmt->bindParam(":pension_date", $datos['pension_date'], PDO::PARAM_STR);
    $stmt->bindParam(":pension_cost", $datos['pension_cost'], PDO::PARAM_STR);
    $stmt->bindParam(":pay_date", $datos['pay_date'], PDO::PARAM_STR);
    $stmt->bindParam(":route_state", $datos['route_state'], PDO::PARAM_INT);
    $stmt->bindParam(":route_type", $datos['route_type'], PDO::PARAM_INT);
    $stmt->bindParam(":lunch_state", $datos['lunch_state'], PDO::PARAM_INT);
    $stmt->bindParam(":lunch_type", $datos['lunch_type'], PDO::PARAM_INT);
    $stmt->bindParam(":assignment_lunch", $datos['assignment_lunch'], PDO::PARAM_INT);
    $stmt->bindParam(":cont_lunch", $datos['cont_lunch'], PDO::PARAM_INT);
    $stmt->bindParam(":extracurricular_course_status", $datos['extracurricular_course_status'], PDO::PARAM_INT);
    $stmt->bindParam(":extracurricular_course_type", $datos['extracurricular_course_type'], PDO::PARAM_STR);
    $stmt->bindParam(":pension_observation", $datos['pension_observation'], PDO::PARAM_STR);
    $stmt->bindParam(":interest_monthly", $datos['interest_monthly'], PDO::PARAM_INT);
    $stmt->bindParam(":route_price", $datos['route_price'], PDO::PARAM_INT);
    $stmt->bindParam(":lunch_price", $datos['lunch_price'], PDO::PARAM_INT);
    $stmt->bindParam(":extracurricular_course_total", $datos['extracurricular_course_total'], PDO::PARAM_INT);
    $stmt->bindParam(":monthly_payment", $datos['monthly_payment'], PDO::PARAM_STR);
    //$stmt->bindParam(":id_student", $datos['id_student'], PDO::PARAM_INT);
		//return;


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	// /*=============================================
	// ACTUALIZAR USUARIO
	// =============================================*/

	// static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

	// 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

	// 	$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
	// 	$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

	// 	if($stmt -> execute()){

	// 		return "ok";
		
	// 	}else{

	// 		return "error";	

	// 	}

	// 	$stmt -> close();

	// 	$stmt = null;

	// }

	// /*=============================================
	// BORRAR USUARIO
	// =============================================*/

	// static public function mdlBorrarpension($tabla, $tablaSecundaria, $datos){

	// 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_pension = :id_pension");

	// 	$stmt -> bindParam(":id_pension", $datos, PDO::PARAM_INT);

	// 	if($stmt -> execute()){

	// 		return "ok";
		
	// 	}else{

	// 		return "error";	

	// 	}

	// 	$stmt -> close();

	// 	$stmt = null;


	// }



static public function mdlBorrarpension($tabla, $tablaSecundaria, $datos){
    // Preparar y ejecutar la consulta DELETE para la tabla secundaria (student_parent)
    $stmtSecundaria = Conexion::conectar()->prepare("DELETE FROM $tablaSecundaria WHERE id_pension = :id_pension");
    $stmtSecundaria->bindParam(":id_pension", $datos, PDO::PARAM_INT);
    if (!$stmtSecundaria->execute()) {
        return "error";
    }

    // Preparar y ejecutar la consulta DELETE para la tabla principal (parent)
    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_pension = :id_pension");
    $stmt->bindParam(":id_pension", $datos, PDO::PARAM_INT);
    if (!$stmt->execute()) {
        return "error";
    }

    return "ok";
}


	
static public function mdlAsignarAlmuerzo($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cont_lunch = :cont_lunch, countdown_end_time=:countdown_end_time, estado_reloj = :estado_reloj, assignment_lunch = :assignment_lunch, lunch_price = :lunch_price , monthly_payment = :monthly_payment WHERE id_pension = :id_pension");
        $stmt->bindParam(":id_pension", $datos["id_pension"], PDO::PARAM_INT);
        $stmt->bindParam(":cont_lunch", $datos['cont_lunch'], PDO::PARAM_INT);
        $stmt->bindParam(":countdown_end_time", $datos['countdown_end_time'], PDO::PARAM_INT);
        $stmt->bindParam(":estado_reloj", $datos['estado_reloj'], PDO::PARAM_INT);
        $stmt->bindParam(":assignment_lunch", $datos['assignment_lunch'], PDO::PARAM_INT);
        $stmt->bindParam(":lunch_price", $datos['lunch_price'], PDO::PARAM_INT);
        $stmt->bindParam(":monthly_payment", $datos['monthly_payment'], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }


// static public function mdlCambiarEstadoAlmuerzo($tabla, $datos) {
//         $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado_reloj = :estado_reloj WHERE id_pension = :id_pension");
//         $stmt->bindParam(":id_pension", $datos["id_pension"], PDO::PARAM_INT);
//         $stmt->bindParam(":estado_reloj", $datos['estado_reloj'], PDO::PARAM_INT);
//         if ($stmt->execute()) {
//             return "ok";
//         } else {
//             return "error";
//         }

//         $stmt->close();
//         $stmt = null;
//     }


        static public function mdlEstadoReloj($tabla,$item1,$valor1,$item2,$valor2){
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



    static public function mdlAprobarEstadoPago($tabla,$item1,$valor1,$item2,$valor2){
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