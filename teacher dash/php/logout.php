<?php
     include("../config/pdoconfig.php");
     session_start();

    session_destroy();
    header('location:../index.php'); 
?>


