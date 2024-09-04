<?php
 
require_once "conexion.php";

class ModeloAcudientes{

	/*=============================================
	MOSTRAR Estudiantes
	=============================================*/

	static public function mdlMostrarAcudientesConEstudiante($item, $valor) {
//     $query = "SELECT * 
// FROM student, student_parent,parent 
// Where student.id_student=student_parent.id_student AND
// student_parent.id_parent=parent.id_parent";

	 $query="SELECT p.id_parent, p.cc_parent, p.first_name_parent,p.last_name_parent,p.email,
	 				st.id_student, st.first_name,st.last_name, 
					pf.phone FROM parent p 
						INNER JOIN student_parent sp 
							ON p.id_parent = sp.id_parent 
						INNER JOIN student st 
							ON sp.id_student = st.id_student 
						INNER JOIN parent_phone pf 	
							ON p.id_parent = pf.id_parent;
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


static public function mdlMostrarAcudiente($tabla, $item, $valor){

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
	static public function mdlMostrarEstudiantesConParent($item, $valor) {
    $query = "SELECT * FROM student INNER JOIN student_parent ON student.id_student = student_parent.id_student";

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


	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

// 	static public function mdlIngresarAcudientes($tabla, $datos){
//     $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (cc, first_name_parent, last_name_parent, email, id_student) VALUES (:cc, :first_name, :last_name, :email, :id_student)");

//     if ($stmt) {
//         foreach ($datos['id_student'] as $id_student) {
//             $stmt->bindParam(":cc", $datos['cc'], PDO::PARAM_INT);
//             $stmt->bindParam(":first_name", $datos['first_name_parent'], PDO::PARAM_STR);
//             $stmt->bindParam(":last_name", $datos['last_name_parent'], PDO::PARAM_STR);
//             $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
//             $stmt->bindParam(":id_student", $id_student, PDO::PARAM_INT);

//             if (!$stmt->execute()) {
//                 return "error";
//             }
//         }
        
//         return "ok";
//     } else {
//         return "error";
//     }
// }
static public function mdlIngresarAcudientes($tabla, $datos){
    // Preparar la consulta para insertar en la tabla principal
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (cc_parent, first_name_parent, last_name_parent, email) VALUES (:cc_parent, :first_name_parent, :last_name_parent, :email)");

    if ($stmt) {
        // Ejecutar la inserción en la tabla principal
        $stmt->bindParam(":cc_parent", $datos['cc_parent'], PDO::PARAM_INT);
        $stmt->bindParam(":first_name_parent", $datos['first_name_parent'], PDO::PARAM_STR);
        $stmt->bindParam(":last_name_parent", $datos['last_name_parent'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
      ;

        if (!$stmt->execute()) {
            return "error";
        }

        // Obtener el último ID insertado en la tabla principal
$query = "SELECT id_parent FROM parent ORDER BY id_parent DESC LIMIT 1";

    
    $lastInsertIdQuery = "SELECT MAX(id_parent) AS last_id FROM parent";
   
$resultado = Conexion::conectar()->query($lastInsertIdQuery);
$row = $resultado->fetch(PDO::FETCH_ASSOC);
$lastInsertId = $row['last_id'];
        // Preparar la consulta para insertar en la tabla adicional
        $stmt2 = Conexion::conectar()->prepare("INSERT INTO student_parent (id_student, id_parent) VALUES (:id_student, :id_parent)");

        foreach ($datos['id_student'] as $id_student) {
            // Insertar cada valor de id_student en la tabla adicional
            $stmt2->bindParam(":id_student", $id_student, PDO::PARAM_INT);
            $stmt2->bindParam(":id_parent", $lastInsertId, PDO::PARAM_INT); // Suponiendo que quieres asociar el nuevo ID insertado en la tabla principal
            if (!$stmt2->execute()) {
                return "error";
            }
        }
        
        return "ok";
    } else {
        return "error";
    }
}
	// /*=============================================
	// EDITAR USUARIO
	// =============================================*/

	static public function mdlEditarAcudiente($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cc_parent = :cc_parent, first_name_parent = :first_name_parent, last_name_parent = :last_name_parent, email = :email WHERE id_parent = :id_parent");
		
		$stmt -> bindParam(":id_parent", $datos["id_parent"], PDO::PARAM_INT);
		$stmt -> bindParam(":cc_parent", $datos["cc_parent"], PDO::PARAM_INT);
		$stmt -> bindParam(":first_name_parent", $datos["first_name_parent"], PDO::PARAM_STR);
		$stmt -> bindParam(":last_name_parent", $datos["last_name_parent"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		
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

	 static public function mdlBorrarAcudiente($tabla, $tablaSecundaria, $datos){
    // Preparar y ejecutar la consulta DELETE para la tabla secundaria (student_parent)
    $stmtSecundaria = Conexion::conectar()->prepare("DELETE FROM $tablaSecundaria WHERE id_parent = :id_parent");
    $stmtSecundaria->bindParam(":id_parent", $datos, PDO::PARAM_INT);
    if (!$stmtSecundaria->execute()) {
        return "error";
    }

    // Preparar y ejecutar la consulta DELETE para la tabla principal (parent)
    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_parent = :id_parent");
    $stmt->bindParam(":id_parent", $datos, PDO::PARAM_INT);
    if (!$stmt->execute()) {
        return "error";
    }

    return "ok";
}

}