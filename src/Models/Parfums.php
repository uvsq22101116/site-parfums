<?php

namespace App\Models;

use App\Core\Database;
use PDO;
use PDOException;

class Parfum {
    // Fonction pour récupérer tous les parfums
    public static function getAllParfums() {
        $db = Database::getInstance();

        try {
            $query = $db->query("SELECT * FROM parfums");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de la récupération des parfums : " . $e->getMessage());
        }
    }

    // Ajoute ici d'autres méthodes si nécessaire (ex: ajout, mise à jour, suppression)
}

?>
