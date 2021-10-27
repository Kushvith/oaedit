<?php

include("../../config/pdoconfig.php");
$query1 = "SELECT * FROM teacher_signin";
    $statement = $connection->prepare($query1);
    $statement->execute();
    $teachers = $statement->rowCount();
    echo $teachers;
?>
