<?php
    include('../../config/pdoconfig.php');
    $otpVal = $_POST['otpVal'];
    $email = $_POST['email'];
    $query = "SELECT * FROM teacher_signin WHERE email = '$email' AND otp = '$otpVal'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->rowCount();
    if($result>0){
        $stat = 'verified';
        $query = "UPDATE teacher_signin SET stat = '$stat' WHERE email = '$email'";
        $statement = $connection->prepare($query);
        $statement->execute();
        echo "<div class='alert alert-primary'>YOU ARE VERIFIED</center></div>";
    }
    else{
        echo "<div class='alert alert-danger'> <center>Invalid OTP</center></div>";
    }
?>