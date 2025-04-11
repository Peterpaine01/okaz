<?php

namespace App\Controllers;

require_once __DIR__ . '/../libs/pdo.php';
require_once __DIR__ . '/../libs/listing.php';

class AnnonceController
{
    public function show($params)
    {
        $id = $params['id'] ?? null;

        if (!$id) {
            header("Location: /404");
            exit;
        }
        global $pdo; 
        $listing = getListingById($pdo, (int) $id); 

        include realpath(__DIR__ . '/../views/annonce.php');
    }
}
