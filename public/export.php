<?php
// Fonction pour zipper un dossier
function zipDirectory($source, $destination) {
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZipArchive::CREATE)) {
        return false;
    }

    $source = realpath($source);
    if (is_dir($source)) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
        foreach ($files as $file) {
            $file = realpath($file);
            if (is_dir($file)) {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            } else if (is_file($file)) {
                $zip->addFile($file, str_replace($source . '/', '', $file));
            }
        }
    } else if (is_file($source)) {
        $zip->addFile($source, basename($source));
    }

    return $zip->close();
}

// Chemin du dossier à zipper
$sourceDir = __DIR__; // Dossier actuel (le projet)
$destination = __DIR__ . '/export/solution.zip'; // Destination du fichier zip

if (zipDirectory($sourceDir, $destination)) {
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="solution.zip"');
    header('Content-Length: ' . filesize($destination));
    readfile($destination);
    unlink($destination); // Supprime l'archive après téléchargement
} else {
    echo 'Erreur lors de la création du fichier ZIP.';
}
?>
