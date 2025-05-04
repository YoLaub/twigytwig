<?php
namespace app\Models;

use PDO;
use PDOException;
use Exception;

abstract class DbConnect {
    public static function connexion() {
        try {
            $dsn = 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE');
            $pdo = new PDO($dsn, getenv('DB_USERNAME'), getenv('DB_PASSWORD'), array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "UTF8"'));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            return $e->getMessage() . "<br />Erreur de connexion PDO !";
        }
    }

    protected static function executerRequete($sql, $values = []) {
        try {
            $query = self::connexion()->prepare($sql);
            if (!empty($values)) {
                foreach ($values as $key => $value) {
                    $param = (strpos($key, ":") === 0) ? $key : ":" . $key;
                    $query->bindValue($param, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
                }
            }
            $query->execute();
            return $query;
        } catch (Exception $e) {
            return $e->getMessage() . "<br />Impossible d'envoyer les données dans la base de données !";
        }
    }
}