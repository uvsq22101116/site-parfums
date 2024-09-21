<?php

namespace App\Controllers;

use App\Core\View; 
use App\Core\Controller;

class PageController extends Controller
{
    /**
     * Affiche une page spécifique.
     *
     * @param string $page Le nom de la page à afficher.
     */
    public function show($page)
    {
        $view = new View(); // Instancie la classe View

        // Assure-toi que le fichier de la vue existe avant de le rendre
        if (file_exists("src/Views/pages/{$page}.php")) {
            // Récupérer des données à passer à la vue, par exemple le titre
            $data = [
                'title' => ucfirst($page) // Utilise le nom de la page comme titre
            ];
            $view->render("pages/{$page}", $data); // Rendre la vue avec les données
        } else {
            // Redirige vers une page 404 si la page n'existe pas
            $view->render('pages/404'); // Assurez-vous d'avoir une vue 404
        }
    }
}


