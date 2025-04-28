<?php
ob_start();
// Démarrage de la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>