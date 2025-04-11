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

        // Traiter les paramètres de requête (query string)
        $queryString = '';
        if (strpos($url, '?') !== false) {
            list($url, $queryString) = explode('?', $url);
        }

        // Debug : afficher l'URL et les paramètres de requête
        // var_dump($url, $queryString);  // Afficher l'URL et la query string

        foreach ($this->routes as $route) {
            $pattern = '#^' . $route['route'] . '$#';

            if ($route['method'] === $method && preg_match($pattern, $url, $matches)) {
                // Debug : afficher les correspondances
                // var_dump($matches);

                // Filtrer les valeurs numériques (ex : id)
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Traiter les paramètres de la query string et les associer aux paramètres de la route
                if (!empty($queryString)) {
                    parse_str($queryString, $queryParams);
                    // Associer les paramètres de la query string avec les paramètres de la route
                    $params = array_merge($params, $queryParams);
                }

                // Debug : afficher les paramètres transmis au contrôleur
                //var_dump($params);

                // Appeler la fonction callback (contrôleur) avec les paramètres
                call_user_func_array($route['callback'], [$params]);
                return;
            }
        }

        // Si aucune route trouvée
        header("HTTP/1.0 404 Not Found");
        echo "404 - Page non trouvée";
    }
}

