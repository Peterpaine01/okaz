<?php

namespace App\Controllers;

require_once __DIR__ . '/../libs/pdo.php';
require_once __DIR__ . '/../libs/user.php';

class LoginController
{
    public function login()
    {
        global $pdo;
        include realpath(__DIR__ . '/../views/login.php');
    }
}
