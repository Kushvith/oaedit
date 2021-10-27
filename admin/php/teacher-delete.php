<?php
   include '../../config/pdoconfig.php';
   $id = $_POST['id'];
   $sql = "DELETE  FROM teacher_signin WHERE id = '$id'";
   $statement = $connection->prepare($sql);
   $result = $statement->execute();
//    $result =  $statement->fetchAll();
    if($result){
        echo 'deleted';
    }
?>