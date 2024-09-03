<?php
 
require_once "conexion.php";

class ModeloMatriculas{

	/*=============================================
	MOSTRAR Estudiantes
	=============================================*/

	static public function mdlMostrarMatriculasConEstudiantes($item, $valor) {
    $query = "SELECT t.id_tuition, t.tuition_date,t.tuition_cost, t.pay_date, t.status_payment, 
						st.id_student, st.registration_date, st.cc, st.first_name, st.last_name, st.st_address, 
						p.id_parent, p.cc_parent, p.first_name_parent, p.last_name_parent, p.email, 
						ph.phone 
					FROM tuition t 
						INNER JOIN student st 
					ON st.id_student = t.id_student 
						INNER JOIN student_parent sp 
					ON st.id_student = sp.id_student 
						INNER JOIN parent p 
					ON p.id_parent = sp.id_parent 
						INNER JOIN parent_phone ph 
					ON ph.id_parent = p.id_parent;
				";

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



	static public function mdlMostrarMatriculas($tabla, $item, $valor) {
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

	static public function mdlIngresarMatriculas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tuition_date, tuition_cost, pay_date, status_payment, id_student) VALUES (:tuition_date, :tuition_cost, :pay_date, 0, :id_student)");
		$stmt->bindParam(":tuition_date", $datos['tuition_date'], PDO::PARAM_STR);
    	$stmt->bindParam(":tuition_cost", $datos['tuition_cost'], PDO::PARAM_STR);
    	$stmt->bindParam(":pay_date", $datos['pay_date'], PDO::PARAM_STR);
    	$stmt->bindParam(":id_student", $datos['id_student'], PDO::PARAM_INT);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
 
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarMatricula($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  tuition_date = :tuition_date, tuition_cost = :tuition_cost, pay_date = :pay_date, id_student = :id_student WHERE id_tuition = :id_tuition");
		
		$stmt->bindParam(":tuition_date", $datos['tuition_date'], PDO::PARAM_STR);
    	$stmt->bindParam(":tuition_cost", $datos['tuition_cost'], PDO::PARAM_STR);
    	$stmt->bindParam(":pay_date", $datos['pay_date'], PDO::PARAM_STR);
    	$stmt->bindParam(":id_student", $datos['id_student'], PDO::PARAM_INT);
		$stmt->bindParam(":id_tuition", $datos['id_tuition'], PDO::PARAM_INT);
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

	static public function mdlBorrarMatricula($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_tuition = :id_tuition");

		$stmt -> bindParam(":id_tuition", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

	static public function mdlAprobarPago($tabla,$item1,$valor1,$item2,$valor2){
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