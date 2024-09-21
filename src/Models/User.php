<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class User extends Model {
    public $username;
    public $email;
    public $password;

    // Méthode pour créer un nouvel utilisateur
    public function createUser() {
        $db = self::getDB();

        // Préparation de la requête SQL pour insérer un nouvel utilisateur
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $db->prepare($sql);

        // Liaison des paramètres avec les propriétés de l'objet
        $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR); // Mot de passe haché

        // Exécuter la requête et vérifier si l'utilisateur a été créé
        return $stmt->execute();
    }

    // Méthode pour récupérer un utilisateur par son ID
    public function getUserById($id) {
        $db = self::getDB();

        // Préparation de la requête SQL pour récupérer un utilisateur
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Renvoyer l'utilisateur sous forme de tableau associatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

