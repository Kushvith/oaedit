<?php
include('../config/pdoconfig.php');
$alert = "";

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
$mail = new PHPMailer(true);
$email = $_POST['email'];
$query = "SELECT * FROM signin WHERE Email = '$email'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->rowCount();
if ($result > 0) {
    $query = "SELECT * FROM signin WHERE Email = '$email'";
    $statement->execute();
    $results = $statement->fetchAll();
    foreach ($results as $row) {
        $name = $row['Name'];
    }
    $otp = rand('111111', '999999');
    $query = "UPDATE signin SET otp = '$otp' WHERE Email = '$email'";
    $statement = $connection->prepare($query);
    $statement->execute();
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kushvithchinna900@gmail.com'; // Gmail address which you want to use as SMTP server
        $mail->Password = 'kushvithKushvitH'; // Gmail address Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';

        $mail->setFrom('kushvithchinna900@gmail.com'); // Gmail address which you used as SMTP server
        $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

        $mail->isHTML(true);
        $mail->Subject = 'Message From Online Assesments (forgot password)';
        $mail->Body = "<h3>The is to verify you <b> $name of $email  <b> From Online Assesments
            <br> Your forgot Password<br>
            OTP : $otp</h3>";

        $mail->send();
        echo "user exists";
        
    } catch (Exception $e) {
        $alert = '<div class="alert alert-danger">
                        <span>' . $e->getMessage() . '</span>
                      </div>';
    }
} else {
    echo '<div class="alert alert-danger"><center>invalid user</center></div>';
}
?>