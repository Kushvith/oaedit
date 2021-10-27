<?php
    include('../config/pdoconfig.php');
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $query = "UPDATE signin SET Password = '$pass' WHERE Email = '$email'";
    $statement = $connection->prepare($query);
   $statement->execute();
   echo '<div class="alert alert-primary">Password Changed</div>';
?>