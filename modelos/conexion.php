	<?php

	class Conexion{

		static public function conectar(){

			$link = new PDO("mysql:host=localhost;dbname=sistema_gestion_academica",
				            "root",
				            "");

			$link->exec("set names utf8");

			return $link;

		}

	}