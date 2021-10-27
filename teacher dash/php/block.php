<?php
   include("../../config/pdoconfig.php");
   $id =  $_GET['id'];
   $block = "block";
   $sql = "UPDATE signin SET action = '$block' WHERE id = $id";
   $statement = $connection->prepare($sql);
   $statement->execute();
   header("location:../examples/tables.php");

?>

