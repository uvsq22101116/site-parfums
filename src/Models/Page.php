<?php

namespace App\Models;

use App\Core\Model;
use PDO; // Ajoute ceci pour importer PDO du namespace global

class Page extends Model
{
    /**
     * Récupère le contenu d'une page par son nom.
     *
     * @param string $page Le nom de la page.
     * @return array|null Les données de la page ou null si non trouvée.
     */
    public static function getPageByName($page)
    {
        // Connexion à la base de données
        $db = self::getDB();

        // Préparer la requête pour récupérer les données de la page
        $stmt = $db->prepare("SELECT * FROM pages WHERE name = :name");
        $stmt->bindParam(':name', $page);
        $stmt->execute();

        // Retourner les données de la page
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

