<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Comment extends Model {
    // Fonction pour récupérer tous les commentaires
    public static function getAll() {
        $db = self::getDB();
        $stmt = $db->query("SELECT * FROM comments");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction pour récupérer les commentaires d'un parfum spécifique
    public static function getCommentsByParfumId($parfum_id) {
        $db = self::getDB();
        $sql = "SELECT * FROM comments WHERE parfum_id = :parfum_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':parfum_id', $parfum_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction pour ajouter un commentaire
    public static function addComment($user_id, $parfum_id, $comment) {
        if (empty($user_id) || empty($parfum_id) || empty($comment)) {
            return false; // Validation simple
        }

        $db = self::getDB();
        $sql = "INSERT INTO comments (user_id, parfum_id, comment, created_at) VALUES (:user_id, :parfum_id, :comment, NOW())";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':parfum_id', $parfum_id, PDO::PARAM_INT);
        $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
?>



