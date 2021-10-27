
<?php

include '../config/pdoconfig.php';

$id = $_GET['id']; // Get id from url bar



$sql = "SELECT * FROM hw WHERE id = '$id'";
$statement = $connection->prepare($sql);
$statement->execute();
// $row = $statement->fetchColumn(); 
// if ($row = mysqli_fetch_assoc($result)){
$result =  $statement->fetchAll();
$loc = "../student dash/uploads/";
foreach ($result as $row) {

    unlink($loc . $row['address']);
}
$sql = "DELETE  FROM hw where id = '$id'";
$statement = $connection->prepare($sql);
$statement->execute();

$statement = $connection->prepare($query);
$statement->execute();
$statement = $connection->prepare($sql);
$statement->execute();
header("Location: ../student dash/html/table-basic.php");


?>
