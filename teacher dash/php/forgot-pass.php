<?php
    include('../../config/pdoconfig.php');
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $query = "UPDATE teacher_signin SET password = '$pass' WHERE email = '$email'";
    $statement = $connection->prepare($query);
   $statement->execute();
   echo '<div class="alert alert-primary">Password Changed</div>';
?>