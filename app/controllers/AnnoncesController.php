<?php

namespace App\Controllers;

require_once __DIR__ . '/../libs/pdo.php'; 


class AnnoncesController
{
    public function index()
    {
        global $pdo;
        $filters = $_GET;
        $listings = getListings($pdo, $filters);
        header('Content-Type: application/json');
        echo json_encode([
            'listings' => $listings
        ]);
        include realpath(__DIR__ . '/../views/annonces.php');
    }
}
