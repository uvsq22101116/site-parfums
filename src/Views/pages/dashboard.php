

<?php

use App\Models\Comment;
use App\Models\Parfum;

// Récupérer tous les parfums
$parfums = Parfum::getAllParfums();

// Récupérer tous les commentaires
$comments = Comment::getAll(); // Utilise getAll()

// Vérifier si un commentaire est soumis via le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id']; // ID de l'utilisateur (doit être récupéré dynamiquement)
    $parfum_id = $_POST['parfum_id']; // ID du parfum sélectionné
    $comment_text = $_POST['comment']; // Commentaire soumis

    // Ajouter le commentaire
    Comment::addComment($user_id, $parfum_id, $comment_text);

    // Rafraîchir la page pour afficher le nouveau commentaire
    header('Location: dashboard.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard des Parfums et Commentaires</title>
</head>
<body>

<h1>Liste des Parfums</h1>
<ul>
    <?php foreach ($parfums as $parfum): ?>
        <li><?= htmlspecialchars($parfum['nom']) ?></li>
    <?php endforeach; ?>
</ul>

<h2>Ajouter un Commentaire</h2>
<form action="dashboard.php" method="POST">
    <label for="parfum_id">Sélectionner un Parfum:</label>
    <select name="parfum_id" id="parfum_id" required>
        <?php foreach ($parfums as $parfum): ?>
            <option value="<?= $parfum['id'] ?>"><?= htmlspecialchars($parfum['nom']) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="comment">Votre Commentaire:</label>
    <textarea name="comment" id="comment" required></textarea>

    <!-- L'ID de l'utilisateur doit être renseigné dynamiquement -->
    <input type="hidden" name="user_id" value="1"> <!-- Remplacer '1' par l'ID réel de l'utilisateur connecté -->

    <button type="submit">Envoyer</button>
</form>

<h2>Liste des Commentaires</h2>
<ul>
    <?php foreach ($comments as $comment): ?>
        <li>
            <strong>Utilisateur <?= htmlspecialchars($comment['user_id']) ?>:</strong> 
            <?= htmlspecialchars($comment['comment']) ?> 
            (sur le parfum ID <?= $comment['parfum_id'] ?>)
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
