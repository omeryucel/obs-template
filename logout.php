<?php session_start();

unset($_SESSION["userName"]);
unset($_SESSION["key"]);
header('Location: login.php');