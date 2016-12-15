<?php
    if(isset($_GET["path"])){
        $path =  $_GET["path"];
         
    }
    else{
        $path = "profil";
    }
    
    include "pages/$path.php";



 ?>

 