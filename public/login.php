<?php
session_start();

// Afficher les erreurs pour le développement
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
$servername = "localhost";
$username = "root"; // par défaut pour XAMPP
$password = ""; // par défaut pour XAMPP
$dbname = "dup_parfums";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Vérifier l'utilisateur
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = MD5('$pass')"; // Utilise MD5 si c'est ce que tu as utilisé pour stocker le mot de passe

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Utilisateur trouvé, démarrer la session
        $_SESSION['username'] = $user;
        header("Location: dashboard.php"); // Remplace par le chemin de ton tableau de bord
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

$conn->close();
?>

