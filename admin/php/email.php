<?php
   include('../../config/pdoconfig.php');
   $alert="";
            use PHPMailer\PHPMailer\PHPMailer;

            require_once 'phpmailer/Exception.php';
            require_once 'phpmailer/PHPMailer.php';
            require_once 'phpmailer/SMTP.php';
            $mail = new PHPMailer(true);
            $email = $_POST['emailtxt'];
        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kushvithchinna900@gmail.com'; // Gmail address which you want to use as SMTP server
            $mail->Password = 'ksrtstkr'; // Gmail address Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '587';
        
            $mail->setFrom('kushvithchinna900@gmail.com'); // Gmail address which you used as SMTP server
            $mail->addAddress('kushvithchinna900@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
        
            $mail->isHTML(true);
            $mail->Subject = 'Message From online assignment';
            $mail->Body = "<h3>Message from online assignment <b>ADMIN</b> <br> 
                $email
            </h3>";
        
            $mail->send();
            $alert = 'done';
          } catch (Exception $e){
            $alert = '<div class="alert alert-danger">
                        <span>'.$e->getMessage().'</span>
                      </div>';
                      
          }
          

   echo $alert;
?>