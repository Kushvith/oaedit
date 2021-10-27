<?php

if(isset($_POST['name'])){
    include('../config/pdoconfig.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $college = $_POST['college'];
    for($count=0; $count < count($name); $count++)
    {
       $query = "SELECT * FROM teacher_signin WHERE email = '".$email[$count]."' AND name = '".$name[$count]."'";
       $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->rowCount();
        if($result>0){
                    echo "account exists of '".$email[$count]."'<br>";
        }else{
        $query = "INSERT INTO teacher_signin (name , email,department,college) VALUES ('".$name[$count]."','".$email[$count]."','".$department[$count]."','".$college[$count]."')";
            $statement = $connection->prepare($query);
            $statement->execute();
            echo "done"."Account created"."  ".$email[$count]."<br>";
        }
    }
   
}
?>
