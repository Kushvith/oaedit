<?php
include('../../config/pdoconfig.php');
$email = $_POST['email'];
$otp = $_POST['otp'];
$query = "SELECT * FROM teacher_signin WHERE email = '$email'";
   $statement = $connection->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   foreach($result as $row){
       $otpcheck = $row['otp'];
   }
   if($otpcheck == $otp){
       echo "working";
   }
   else{
       echo '<div class="alert alert-danger">Invalid Otp</div>';
   }
?>