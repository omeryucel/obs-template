<?php session_start();
 
include "includes/config.php";
 
if(empty($_SESSION["userName"])){
    header("Location: login.php");
}
 

 
include "includes/header.php";
include "includes/menu.php"; 
include "includes/content.php";
include "includes/footer.php";


 ?>