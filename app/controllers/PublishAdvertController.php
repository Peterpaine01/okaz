<?php

namespace App\Controllers;

require_once __DIR__ . '/../libs/pdo.php';
require_once __DIR__ . '/../libs/category.php';
require_once __DIR__ . '/../libs/listing.php';

class PublishAdvertController
{
    public function publish()
    {
        global $pdo;
   

        

        include realpath(__DIR__ . '/../views/publish_advert.php');
    }
}
