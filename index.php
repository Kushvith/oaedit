<?php
session_start();
require 'config/pdoconfig.php';
?>

<?php
$err = "";
if (isset($_POST['submit'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];
   $stat = 'verified';
   $query = "select * from signin where Email = '$email' AND PASSWORD = '$password' AND stat = '$stat'";
   $statement = $connection->prepare($query);
   $statement->execute();
   $row_count = $statement->fetchColumn();
   if ($row_count > 0) {
      $query = "SELECT * FROM signin WHERE id = '$row_count'";
      $statement = $connection->prepare($query);
      $statement->execute();
      $result =  $statement->fetchAll();
      foreach ($result as $row) {

         if ($row['action'] == "") {
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['Email'];
            $_SESSION['name'] = $row['Name'];
            $_SESSION['college'] = $row['Centre'];
            $_SESSION['department'] = $row['Department'];
            header('location:./student dash/html/');
         } else {
            $err = '<div class="alert alert-danger"><center>Your Blocked</center><br>
            <center> <a href="contact/">Contact Us</a></center></div>';
         }
      }
   } else {
      $err = '<div class="alert alert-danger"><small><center>Login Details Incorrect</center></small></div>';
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <style>

   </style>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/signup.css">
   <title>form</title>
</head>

<body>
   <div class="logo">
     <a href="welcome/"><img src="./images/logo.png" alt="NTTF" srcset=""></a>
   </div>
   <div class="containers">

      <center>
         <h2 ><ins>Student Login Form</ins></h2>
      </center>
      <div id="err">
         <h3><?php echo $err;
               ?></h3>
      </div>
      <center><img src="./images/avatar-1299805.png" class="avater" alt="img"></center>
      <form action="#" method="POST">
         <b><label>ENTER YOUR EMAIL :</label></b>
         <input type="email" name="email" id="email" placeholder="Email" required>
         <br>
         <b><label for="password">ENTER YOUR PASSWORD</label></b>
         <input type="password" name="password" id="password" placeholder="password" required>
         <br>
         <input type="submit" value="submit" name="submit" id="submit">
         <a href="forgot.php">
            <center>forgot password?</center>
         </a>
         <center>Create One if you haven't ,<a href="signuphtml.php"> SIGN UP</a></center>
      </form>
   </div>

</body>

</html>