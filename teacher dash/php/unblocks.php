<?php
    include("../../config/pdoconfig.php");
    $id = $_GET['id'];
    echo $id;
    $sql = "UPDATE signin SET action ='' WHERE id = $id";
    $statement= $connection->prepare($sql);
    $statement->execute();
    header("location:../examples/tables.php");
?>