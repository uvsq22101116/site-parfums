<?php

namespace App\Core;

class View
{
    protected $templatePath;

    public function __construct($templatePath = 'src/Views/')
    {
        $this->templatePath = $templatePath; // Chemin par défaut des vues
    }

    public function render($view, $data = [])
    {
        // Extrait les données pour les rendre accessibles dans la vue
        extract($data);

        // Inclut le fichier de vue
        $viewFile = $this->templatePath . $view . '.php';
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            throw new \Exception("La vue {$view} n'existe pas."); // Gère l'erreur si la vue n'existe pas
        }
    }
}
