<?php

require_once "conexion.php";

class ModeloServicios
{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlRegistrarServicio($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(service_name,service_price,num_people) VALUES (:service_name,:service_price,:num_people)");

		$stmt->bindParam(":service_name", $datos['service_name'], PDO::PARAM_STR);
		$stmt->bindParam(":service_price", $datos['service_price'], PDO::PARAM_STR);
		$stmt->bindParam(":num_people", $datos['num_people'], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlVerServicios($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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

	static public function mdlELiminarServicio($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_service = :id_service");

		$stmt->bindParam(":id_service", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
