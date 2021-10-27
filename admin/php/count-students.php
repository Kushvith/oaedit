<?php
    include("../../config/pdoconfig.php");
    $query1 = "SELECT * FROM signin";
    $statement = $connection->prepare($query1);
    $statement->execute();
    $users = $statement->rowCount();
    echo $users;
   
    
?>