<?php
require_once 'libs/pdo.php';
require_once 'libs/user.php';

session_start();
session_unset();
session_destroy();
header("Location: login.php");

?>
