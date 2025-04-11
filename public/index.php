<?php

require_once __DIR__ . '/../app/libs/init.php';
require_once __DIR__ . '/../app/libs/pdo.php';

// Inclure les fichiers nécessaires
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/LoginController.php';
require_once __DIR__ . '/../app/controllers/AnnoncesController.php';
require_once __DIR__ . '/../app/controllers/AnnonceController.php';
require_once __DIR__ . '/../app/controllers/SignupController.php';
require_once __DIR__ . '/../app/controllers/LogoutController.php';
require_once __DIR__ . '/../app/controllers/PublishAdvertController.php';

use Core\Router;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\AnnoncesController;
use App\Controllers\AnnonceController;
use App\Controllers\SignupController;
use App\Controllers\LogoutController;
use App\Controllers\PublishAdvertController;

$router = new Router();

// Définir les routes
$router->add('GET', '/', [new HomeController(), 'index']);
$router->add('GET', '/login', [new LoginController(), 'login']);
$router->add('POST', '/login', [new LoginController(), 'login']);
$router->add('GET', '/annonces', [new AnnoncesController(), 'index']);
$router->add('GET', '/annonce/{id}', [new AnnonceController(), 'show']);
$router->add('GET', '/inscription', [new SignupController(), 'register']);
$router->add('POST', '/inscription', [new SignupController(), 'register']);
$router->add('GET', '/logout', [new LogoutController(), 'logout']);
$router->add('GET', '/publier-annonce', [new PublishAdvertController(), 'publish']);
$router->add('POST', '/publier-annonce', [new PublishAdvertController(), 'publish']);

// Lancer le routage
$router->dispatch();


