<?php
include('../../config/pdoconfig.php');
session_start();
     $email = $_POST['email'];
     $pass = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE email ='$email' AND password= '$pass'";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    if($result){
        $_SESSION['email'] = $email;
        echo 'valid';
    }
    else{
        echo 'invalid email';
    }
?>