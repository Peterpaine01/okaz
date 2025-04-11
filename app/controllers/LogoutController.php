<?php

namespace App\Controllers;

class LogoutController
{
    public function logout()
    {
        include realpath(__DIR__ . '/../views/logout.php');
    }
    
}
