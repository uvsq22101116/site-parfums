<?php

namespace App\Core;

class Router
{
    private $routes = [];

    /**
     * Ajoute une route au routeur.
     *
     * @param string $path Le chemin de la route (ex: "/").
     * @param string $controller Le nom complet de la classe du contrôleur.
     */
    public function add($path, $controller)
    {
        $this->routes[$path] = $controller;
    }

    /**
     * Analyse l'URL et exécute le contrôleur correspondant.
     *
     * @param string $url L'URL à analyser.
     */
    public function dispatch($url)
    {
        // Nettoyer l'URL
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);

        if (array_key_exists($url, $this->routes)) {
            $controller = new $this->routes[$url]();
            if (method_exists($controller, 'index')) {
                $controller->index();
            } else {
                echo "Erreur : Méthode 'index' non trouvée dans le contrôleur.";
            }
        } else {
            echo "Erreur 404 : Page non trouvée.";
        }
    }
}

