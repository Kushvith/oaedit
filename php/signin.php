<?php
require '../config/pdoconfig.php';
$err = "";
$alert="";
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

  $Name = trim($_POST['username']);
           $Email = trim($_POST['email']);
           $Password = trim($_POST['password']);
           $repass = trim($_POST['repassword']);
           $college = trim($_POST['college']);
           $year = trim($_POST['year']);
           $department = trim($_POST['department']);
           $tkno = trim($_POST['tkno']);
           $otp = rand('111111','999999');
          
          $stat = 'not verified';
          $query = "DELETE FROM signin WHERE stat = '$stat'";
    $statement= $connection->prepare($query);
    $statement->execute();
  if($Password == $repass){
    
           $query = "select  COUNT(*) from signin WHERE Email = '$Email'";
           $statement = $connection->prepare($query);
           $statement->execute();
           $row_count =$statement->fetchColumn();
         if($row_count > 0){
                      echo'<div class="alert alert-danger"><center><h2>User Does Exists</center></div>';
                    }
          else{
                   $query = "insert into signin(Name,TokenNumber,Email,Centre,Department,BatchYear,PASSWORD,otp,stat) values ('$Name','$tkno','$Email','$college','$department','$year','$Password','$otp','$stat')";
                   $statement = $connection->prepare($query);
                   $run = $statement->execute();
           if($run){
            try{
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true;
              $mail->Username = 'kushvithchinna900@gmail.com'; // Gmail address which you want to use as SMTP server
              $mail->Password = 'kushvithKushvitH'; // Gmail address Password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
              $mail->Port = '587';
          
              $mail->setFrom('kushvithchinna900@gmail.com'); // Gmail address which you used as SMTP server
              $mail->addAddress($Email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
          
              $mail->isHTML(true);
              $mail->Subject = 'Message From Online Assesments';
              $mail->Body = "<h3>The is to verify you <b> $Name <b> From Online Assesments <br>Email: $Email <br>
              OTP : $otp</h3>";
          
              $mail->send();
              // $alert = '<div class="alert-success">
              //              <span>Message Sent! Thank you for contacting us.</span>
              //             </div>';
            } catch (Exception $e){
              $alert = '<div class="alert alert-danger">
                          <span>'.$e->getMessage().'</span>
                        </div>';
            }
          }
                      }
                    }
       
       else{
        echo'<div class="alert alert-danger"><center>Password Does Not Match</center></div>';
        
      
    }
  
   
//     else{
//      echo'<center><h2> "not submitted"</h2></center>';
//  }
   echo $err;
   echo $alert;
?>