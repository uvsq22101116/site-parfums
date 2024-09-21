<?php

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    // Configuration de la base de données pour les tests
    protected static $db;

    public static function setUpBeforeClass(): void
    {
        // Connexion à la base de données (DB utilisée uniquement pour les tests)
        self::$db = new PDO('mysql:host=localhost;dbname=parfums_db', 'root', '');
    }

    // Test de la création d'un utilisateur
    public function testCreateUser()
    {
        // Créer un nouvel utilisateur
        $user = new User();
        $user->username = 'testuser';
        $user->email = 'testuser@example.com';
        $user->password = password_hash('password123', PASSWORD_DEFAULT);

        $result = $user->createUser(); // Supposons qu'il y a une méthode createUser dans la classe User

        // Vérifier que l'utilisateur a bien été créé
        $this->assertTrue($result, 'L\'utilisateur devrait être créé avec succès');
    }

    // Test pour récupérer un utilisateur par ID
    public function testGetUserById()
    {
        $user = new User();
        $createdUser = $user->getUserById(1); // Récupérer l'utilisateur avec l'ID 1

        // Vérifier que l'utilisateur existe
        $this->assertNotNull($createdUser, 'L\'utilisateur avec l\'ID 1 devrait exister');
        $this->assertEquals('testuser', $createdUser['username'], 'Le nom d\'utilisateur devrait être "testuser"');
    }

    // Test pour vérifier le mot de passe
    public function testPasswordIsHashed()
    {
        $user = new User();
        $hashedPassword = $user->password; // Supposons que le mot de passe soit stocké de manière hachée

        // Vérifier que le mot de passe est bien haché
        $this->assertTrue(password_verify('password123', $hashedPassword), 'Le mot de passe devrait être vérifié correctement');
    }

    // Nettoyage après les tests
    public static function tearDownAfterClass(): void
    {
        self::$db = null;
    }
}
