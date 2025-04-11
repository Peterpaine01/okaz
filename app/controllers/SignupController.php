<?php

namespace App\Controllers;

require_once __DIR__ . '/../libs/pdo.php';
require_once __DIR__ . '/../libs/user.php';

class SignupController
{
    public function register()
    {
        global $pdo;
        include realpath(__DIR__ . '/../views/signup.php');
    }
}
