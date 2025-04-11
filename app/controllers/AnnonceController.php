<?php

namespace App\Controllers;

require_once __DIR__ . '/../libs/pdo.php';
require_once __DIR__ . '/../libs/listing.php';

class AnnonceController
{
    public function show($id)
    {
        global $pdo; // Connexion à la base de données
        $listing = getListingById($pdo, (int) $id); // Récupère l'annonce

        include realpath(__DIR__ . '/../views/annonce.php');
    }
}
