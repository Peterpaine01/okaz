<?php

namespace Core;

class Router
{
    private $routes = [];

    // Ajoute une route à la liste
    public function add($method, $route, $callback)
    {
        $route = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[0-9]+)', $route);
        $this->routes[] = ['method' => $method, 'route' => $route, 'callback' => $callback];
    }

    public function dispatch()
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        // Supprimer le préfixe "/public" si le serveur l'ajoute
        if (strpos($url, '/public') === 0) {
            $url = substr($url, 7); // Enlève "/public"
        }

        // Normaliser pour éviter les "/" en fin d'URL sauf "/"
        $url = rtrim($url, '/') ?: '/';

        // Debug : afficher l'URL reçue pour vérifier
        // var_dump($url);
        // exit;

        foreach ($this->routes as $route) {
            $pattern = '#^' . $route['route'] . '$#';

            if ($route['method'] === $method && preg_match($pattern, $url, $matches)) {
                // Filtre les valeurs numériques (ex : id)
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                call_user_func_array($route['callback'], $params);
                return;
            }
        }

        // Si aucune route trouvée
        header("HTTP/1.0 404 Not Found");
        echo "404 - Page non trouvée";
    }
}

