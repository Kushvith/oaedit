<?php
include("../../config/pdoconfig.php");
$query1 = "SELECT * FROM contact";
$statement = $connection->prepare($query1);
$statement->execute();
$contact = $statement->rowCount();
echo $contact;
?>