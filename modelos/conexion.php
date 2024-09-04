<?php

class Conexion {

    private static $dsn = "mysql:host=localhost;dbname=crm_legaltech";
    private static $username = "root";
    private static $password = "";
    private static $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    public static function conectar() {
        try {
            $link = new PDO(self::$dsn, self::$username, self::$password, self::$options);
            $link->exec("set names utf8");
            return $link;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit; // Detiene la ejecución si no se puede conectar
        }
    }
}

?>
