<?php

namespace App;

class Autoloader {
    public static function autoload($className) {
        $filePath = dirname(__DIR__) . '/model/' . $className . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
        }
    }

    public static function view($viewName)
    {
        // Vérifier si le fichier de vue existe
        $viewFile = dirname(__DIR__) . '/view/' . $viewName . '.php';
        if (file_exists($viewFile)) {
            // Charger le fichier de vue
            require_once $viewFile;
        } else {
            // Afficher une erreur si le fichier de vue n'existe pas
            echo 'Erreur : la vue ' . $viewName . ' n\'existe pas.';
        }
        
    }

    public static function controller($controllerName)
    {
        $controllerFile = dirname(__DIR__) . '/controllers/' . $controllerName . '.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
        } else {
            echo 'Erreur : le contrôleur ' . $controllerName . ' n\'existe pas.';
        }
    }
}

spl_autoload_register(['App\Autoloader', 'autoload']);

