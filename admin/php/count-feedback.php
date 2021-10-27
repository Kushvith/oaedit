<?php 
include("../../config/pdoconfig.php");
     $query1 = "SELECT * FROM feedback";
     $statement = $connection->prepare($query1);
     $statement->execute();
     $feedback = $statement->rowCount();
     echo $feedback;
?>