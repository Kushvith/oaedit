<?php
  include("../../config/pdoconfig.php");
  session_start();
  $id = $_SESSION['id'];
 if(isset($_POST['marks'])){
  $email =  $_POST['email'];
  $marks = $_POST['marks'];
  $file = $_POST['file'];
  $verif = 'approved';
  $query = "UPDATE hw SET marks = '$marks',verification = '$verif' WHERE name = '$email' AND id = '$file' ";
  $statement = $connection->prepare($query);
  $statement->execute();
  echo "updated";
 }
?>