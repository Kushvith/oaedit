<?php

   include("../../config/pdoconfig.php");
   $id =  $_POST['id'];
   $block = "block";
   $sql = "UPDATE signin SET action = '$block' WHERE id = $id";
   $statement = $connection->prepare($sql);
   $statement->execute();


    echo 'done';
?>