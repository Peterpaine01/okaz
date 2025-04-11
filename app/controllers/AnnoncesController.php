<?php

namespace App\Controllers;

require_once __DIR__ . '/../libs/pdo.php'; 


class AnnoncesController
{
    public function index($params)
    {
        global $pdo;
        //var_dump($params);
        include realpath(__DIR__ . '/../views/annonces.php');
    }
}
