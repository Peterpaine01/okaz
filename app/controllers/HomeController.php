<?php

namespace App\Controllers;

require_once __DIR__ . '/../libs/pdo.php'; 

class HomeController
{
    public function index()
    {
        global $pdo;
        include realpath(__DIR__ . '/../views/home.php');
    }
}
