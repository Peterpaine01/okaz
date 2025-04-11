<?php
require_once __DIR__ . '/../libs/pdo.php';
require_once __DIR__ . '/../libs/user.php';

var_dump_pre($_SESSION);
session_start();
session_unset();
session_destroy();
header("Location: /login");

?>
