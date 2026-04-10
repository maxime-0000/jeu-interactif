<?php
class ConnexionBDD
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    "mysql:host=digne.slam.lab;dbname=digne;charset=utf8",
                    "digne",
                    "Xa5ftzRaHGHM"
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                error_log($e->getMessage());
                die("Erreur de connexion a la base de donnees.");
            }
        }
        return self::$instance;
    }
}
