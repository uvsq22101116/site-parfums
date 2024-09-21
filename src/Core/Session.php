<?php

namespace App\Core;

class Session
{
    public function __construct()
    {
        session_start(); // Démarre la session
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value; // Définit une valeur dans la session
    }

    public function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null; // Récupère une valeur de la session
    }

    public function delete($key)
    {
        unset($_SESSION[$key]); // Supprime une valeur de la session
    }

    public function destroy()
    {
        session_destroy(); // Détruit la session
    }
}
