<?php
function exportDatabase($host, $user, $pass, $dbname, $file) {
    $command = "mysqldump --host=$host --user=$user --password=$pass $dbname > $file";
    system($command, $output);
    if ($output == 0) {
        return true;
    } else {
        return false;
    }
}

// Informations sur la base de données
$dbHost = 'localhost';
$dbUser = 'root'; // Nom d'utilisateur MySQL
$dbPass = ''; // Remplace par le mot de passe de ta BDD
$dbName = 'nom_de_ta_base_de_donnees'; // Remplace par le nom de ta base de données
$sqlFile = __DIR__ . '/export/database.sql'; // Fichier SQL

if (exportDatabase($dbHost, $dbUser, $dbPass, $dbName, $sqlFile)) {
    header('Content-Type: application/sql');
    header('Content-Disposition: attachment; filename="database.sql"');
    header('Content-Length: ' . filesize($sqlFile));
    readfile($sqlFile);
    unlink($sqlFile); // Supprime le fichier après téléchargement
} else {
    echo 'Erreur lors de l\'exportation de la base de données.';
}
?>
