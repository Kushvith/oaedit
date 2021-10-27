<?php
     include("../../config/pdoconfig.php");
    $id = $_GET['id'];
    $reject = 'rejected';
    $query = "UPDATE hw SET verification = '$reject' WHERE id = '$id'";
    $statement = $connection->prepare($query);
    $statement->execute();
    header("location:../examples/assesments.php");
?>


          