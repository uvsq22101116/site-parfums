<?php

namespace App\Core;

use PDO;
use PDOException;

abstract class Model {
    protected static function getDB() {
        static $db = null;

        if ($db === null) {
            $host = 'localhost';
            $dbname = 'nom_de_votre_base_de_donnees'; // Remplacez par le nom de votre base de données
            $username = 'votre_utilisateur'; // Remplacez par votre utilisateur MySQL
            $password = 'votre_mot_de_passe'; // Remplacez par votre mot de passe

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
                exit;
            }
        }

        return $db;
    }
}
?>

