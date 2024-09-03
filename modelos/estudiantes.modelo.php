<?php
 
require_once "conexion.php";

class ModeloEstudiantes{

	/*=============================================
	MOSTRAR Estudiantes
	=============================================*/

	static public function mdlMostrarEstudiantesConCampus($item, $valor) {
    $query = "SELECT * FROM student INNER JOIN campus ON student.id_campus = campus.id_campus AND st_status = 1";

    if ($item !== null && $valor !== null) {
        $query .= " WHERE student.$item = :$item";
    }

    $stmt = Conexion::conectar()->prepare($query);

    if ($item !== null && $valor !== null) {
        $stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
    }

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	static public function mdlMostrarEstudiantesInhabilitados($item, $valor) {
		$query = "SELECT * FROM student INNER JOIN campus ON student.id_campus = campus.id_campus WHERE st_status = 0";
	
		if ($item !== null && $valor !== null) {
			$query .= " WHERE student.$item = :$item";
		}
	
		$stmt = Conexion::conectar()->prepare($query);
	
		if ($item !== null && $valor !== null) {
			$stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
		}
	
		$stmt->execute();
	
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	

	static public function mdlMostrarEstudiantes($item, $valor) {
    $query = "SELECT * FROM student";

    if ($item !== null && $valor !== null) {
        $query .= " WHERE student.$item = :$item";
    }

    $stmt = Conexion::conectar()->prepare($query);

    if ($item !== null && $valor !== null) {
        $stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
    }

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}



	/*=============================================x
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarEstudiantes($tabla, $datos) {
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(registration_date, cc, first_name, last_name, st_status, gender, rh, birth_date, st_address, st_neighborhood, schedule, id_campus) VALUES (:registration_date, :cc, :first_name, :last_name, 1, :gender, :rh, :birth_date, :st_address, :st_neighborhood, :schedule, :id_campus)");
		
		$stmt->bindParam(":registration_date", $datos['registration_date'], PDO::PARAM_STR);
		$stmt->bindParam(":cc", $datos['cc'], PDO::PARAM_INT);
		$stmt->bindParam(":first_name", $datos['first_name'], PDO::PARAM_STR);
		$stmt->bindParam(":last_name", $datos['last_name'], PDO::PARAM_STR);
		$stmt->bindParam(":gender", $datos['gender'], PDO::PARAM_STR);
		$stmt->bindParam(":rh", $datos['rh'], PDO::PARAM_STR);
		$stmt->bindParam(":birth_date", $datos['birth_date'], PDO::PARAM_STR);
		$stmt->bindParam(":st_address", $datos['st_address'], PDO::PARAM_STR);
		$stmt->bindParam(":st_neighborhood", $datos['st_neighborhood'], PDO::PARAM_STR);
		$stmt->bindParam(":schedule", $datos['schedule'], PDO::PARAM_STR);
		$stmt->bindParam(":id_campus", $datos['id_campus'], PDO::PARAM_INT);
	
		if($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
	
		$stmt->close();
		$stmt = null;
	}
	

	// /*=============================================
	// EDITAR USUARIO
	// =============================================*/

	static public function mdlEditarEstudiante($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET first_name = :first_name, last_name = :last_name, gender = :gender, birth_date = :birth_date, schedule = :schedule, id_campus  = :id_campus WHERE id_student = :id_student");
		
		$stmt -> bindParam(":id_student", $datos["id_student"], PDO::PARAM_INT);
		$stmt -> bindParam(":first_name", $datos["first_name"], PDO::PARAM_STR);
		$stmt -> bindParam(":last_name", $datos["last_name"], PDO::PARAM_STR);
		$stmt -> bindParam(":gender", $datos["gender"], PDO::PARAM_STR);
		$stmt -> bindParam(":birth_date", $datos["birth_date"], PDO::PARAM_STR);
		$stmt -> bindParam(":schedule", $datos["schedule"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_campus", $datos["id_campus"], PDO::PARAM_INT);

		//echo $datos["oficina"];
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

	static public function mdlBorrarEstudiante($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_student = :id_student");

		$stmt -> bindParam(":id_student", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
	
	// static public function mdlActualizarEstudiante($tabla,$item1,$valor1,$item2,$valor2){
	// 	$stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
	// 	$stmt -> bindParam(":".$item1,$valor1,PDO::PARAM_STR);
	// 	$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
	// 	if($stmt->execute()){
	// 	 return "ok";
	// 	}else{
	// 	 return "error";
	// 	}
	// 	$stmt ->close();
	// 	$stmt = null;
	 
	// }

	static public function mdlActualizarEstudiante($tabla, $item1, $valor1, $item2, $valor2, $item3 = null, $valor3 = null) {
		$query = "UPDATE $tabla SET $item1 = :$item1";
		if ($item3) {
			$query .= ", $item3 = :$item3";
		}
		$query .= " WHERE $item2 = :$item2";
		
		$stmt = conexion::conectar()->prepare($query);
	
		$stmt->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		
		if ($item3) {
			$stmt->bindParam(":".$item3, $valor3, PDO::PARAM_STR);
		}
	
		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
	
		$stmt->close();
		$stmt = null;
	}

	
		

}

