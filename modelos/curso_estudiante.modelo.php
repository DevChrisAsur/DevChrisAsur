<?php

require_once "conexion.php";

class ModeloCursoEstudiante{

/*=============================================
CREAR CATEGORIA
=============================================*/

    static public function mdlIngresarCursoEstudiante($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_student, id_grade) VALUES (:id_student, :id_grade)");

    $stmt->bindParam(":id_student", $datos['id_student'], PDO::PARAM_INT);
    $stmt->bindParam(":id_grade", $datos['id_grade'], PDO::PARAM_INT);


    if($stmt->execute()){

        return "ok";

    }else{

        return "error";

    }

    $stmt->close();
    $stmt = null;

    }
/*

/*=============================================
MOSTRAR Estudiantes
=============================================*/

    static public function mdlMostrarCursoEstudiante($tabla, $item, $valor) {
    // $query = "SELECT * FROM student_grade";

    // if ($item !== null && $valor !== null) {
    //     $query .= " WHERE student.$item = :$item";
    // }

    // $stmt = Conexion::conectar()->prepare($query);

    // if ($item !== null && $valor !== null) {
    //     $stmt->bindParam(":$item", $valor, PDO::PARAM_STR);
    // }

    // $stmt->execute();

    // return $stmt->fetchAll(PDO::FETCH_ASSOC);


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

    static public function mdlMostrarCursosEstudiantes($item = null, $valor = null) {
    // Query para seleccionar todos los registros de la tabla student_grade
    $query = "SELECT u.id, u.nombre,
                    st.id_student, st.first_name, st.last_name,
                    g.level_grade, g.clasification FROM usuarios u
                    INNER JOIN teacher_grade tg 
                        ON u.id = tg.id
                    INNER JOIN grade g
                        ON tg.id_grade = g.id_grade
                    INNER JOIN student_grade sg
                        ON g.id_grade = sg.id_grade
                    INNER JOIN student st
                        ON sg.id_student = st.id_student  
                ORDER BY u.nombre ASC , 
                    g.clasification ASC;";

    // Si se proporciona un filtro, añadir cláusula WHERE
    if ($item !== null && $valor !== null) {
        $query .= " WHERE $item = :valor";
    }

    $stmt = Conexion::conectar()->prepare($query);

    // Si se proporciona un filtro, bindear el valor
    if ($item !== null && $valor !== null) {
        $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
    }

    $stmt->execute();

    // Retornar todos los resultados como un array asociativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /*=======================================
MOSTRAR Estudiantes
=============================================*/

static public function mdlMostrarGrupoProfesor($item = null, $valor = null) {
    // Query para seleccionar todos los registros de la tabla student_grade
    $query = "SELECT u.id, u.nombre,
                    st.id_student, st.first_name, st.last_name,
                    g.level_grade, g.clasification FROM usuarios u
                    INNER JOIN teacher_grade tg 
                        ON u.id = tg.id
                    INNER JOIN grade g
                        ON tg.id_grade = g.id_grade
                    INNER JOIN student_grade sg
                        ON g.id_grade = sg.id_grade
                    INNER JOIN student st
                        ON sg.id_student = st.id_student";

    // Si se proporciona un filtro, añadir cláusula WHERE
    if ($item !== null && $valor !== null) {
        $query .= " WHERE $item = :valor";
    }

    $query .= " ORDER BY u.nombre ASC, g.clasification ASC;";

    $stmt = Conexion::conectar()->prepare($query);

    // Si se proporciona un filtro, bindear el valor
    if ($item !== null && $valor !== null) {
        $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
    }

    $stmt->execute();

    // Retornar todos los resultados como un array asociativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}





    static public function mdlEditarCursoEstudiante($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_student = :id_student, id_grade  = :id_grade WHERE id_student = :id_student");
		
		$stmt -> bindParam(":id_student", $datos["id_student"], PDO::PARAM_INT);
		$stmt -> bindParam(":id_grade", $datos["id_grade"], PDO::PARAM_INT);

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
}