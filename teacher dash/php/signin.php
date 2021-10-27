<?php
include("../../config/pdoconfig.php");
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
      $Name = strtoupper($_POST['name']);
       $Password = $_POST['pass'];
       $repass = $_POST['repass'];
       $department = $_POST['department'];
       $college = $_POST['college'];
       $Email = $_POST['email'];
       $post = $_POST['post'];
       $design = $_POST['design'];
       $otp = rand('111111','999999');
  if($Password == $repass){
      $query = "select  COUNT(*) from teacher_signin WHERE email = '$Email'";
      $statement = $connection->prepare($query);
      $statement->execute();
      $row_count =$statement->fetchColumn();
      
    if(!$row_count > 0){
      echo '<div class="alert alert-danger">
      <center>User Doesnot Exists</center>
    </div>';
               }
     else{
      $query ="UPDATE teacher_signin SET name='$Name', email='$Email' , password = '$Password', department = '$department', college = '$college' , designation = '$design' ,post = '$post', otp = '$otp' WHERE email = '$Email'";     
              $statement = $connection->prepare($query);
              $run = $statement->execute();
      if($run){
        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kushvithchinna900@gmail.com'; // Gmail address which you want to use as SMTP server
            $mail->Password = 'ksrtstkr'; // Gmail address Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '587';
        
            $mail->setFrom('youremail@gmail.com'); // Gmail address which you used as SMTP server
            $mail->addAddress($Email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
        
            $mail->isHTML(true);
            $mail->Subject = 'Message From Online Assesments';
            $mail->Body = "<h3>The is to verify you <b> $Name <b> From Online Assesments <br>Email: $Email <br>
            OTP : $otp</h3>";
        
            $mail->send();
            echo "done-email";
      //       // $alert = '<div class="alert-success">
      //       //              <span>Message Sent! Thank you for contacting us.</span>
      //       //             </div>';
          } catch (Exception $e){
            echo '<div class="alert alert-danger">
                        <span>'.$e->getMessage().'</span>
                      </div>';
          }
      }
    } 
  }
  else{
    echo '<div class="alert alert-danger">
    <center>Double Check Your Password</center>
  </div>';
   }

?>