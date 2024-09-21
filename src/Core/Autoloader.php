<?php

namespace App\Core;

class Autoloader
{
    /**
     * Enregistre notre autoloader.
     */
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    /**
     * Inclut le fichier correspondant à notre classe.
     *
     * @param string $class Le nom complet de la classe (avec namespace).
     */
    public static function autoload($class)
    {
        // On retire le namespace racine "App\"
        $class = str_replace('App\\', '', $class);

        // On remplace les backslashes par des slashes pour correspondre à la structure des fichiers
        $class = str_replace('\\', '/', $class);

        // On génère le chemin complet vers le fichier de classe
        $file = __DIR__ . '/../' . $class . '.php';

        // On inclut le fichier s'il existe
        if (file_exists($file)) {
            require_once $file;
        }
    }
}
