<?php
    include('./curry.php');
    include('../config/pdoconfig.php');
    $login_btn = '';
    $err= '';
    if(isset($_GET["code"])){
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
        if(!isset($token['error']))
        {
            $google_client->setAccessToken($token['access_token']);
            
            $google_service = new Google_Service_Oauth2($google_client);
            $data = $google_service->userinfo->get();
            // if(!empty($data['given_name'])){
            //     $_SESSION['first_name'] = $data['given_name'];
            // }
            // if(!empty($data['family_name'])){
            //     $_SESSION['second_name'] = $data['family_name'];
            // }
            if(!empty($data['email'])){
                $email = $data['email'];
            }
            if(isset($email)){
               $sql = "SELECT * FROM admin WHERE email = '$email'";
               $statement= $connection->prepare($sql);
               $statement->execute();
               $result = $statement->fetchAll();
               if($result){
                  $_SESSION['access_token'] = $token['access_token'];
                  $_SESSION['email'] = $email;
                   header('location:./examples/');
               }
               else{
                  $err =  ' <div class="alert alert-danger">invalid user</div>';
               }
            }
        }
    }
    if(!isset($_SESSION['access_token'])){
        $login_btn = '<a href="'.$google_client->createAuthUrl().'"><img src="http://www.androidpolice.com/wp-content/themes/ap2/ap_resize/ap_resize.php?src=http%3A%2F%2Fwww.androidpolice.com%2Fwp-content%2Fuploads%2F2015%2F10%2Fnexus2cee_Search-Thumb-150x150.png&w=150&h=150&zc=3"> </a>';
    }
    $logout = '<a href="./logout.php">logout</a>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        * {
  box-sizing: border-box;
}

body {
  background-color: #eeeeee;
}

img {
  display: block;
  width: 80px;
  margin: 30px auto;
  box-shadow: 0 5px 10px -7px #333333;
  border-radius: 50%;
}

.form {
  background-color: #ffffff;
  width: 500px;
  margin: 50px auto 10px auto;
  padding: 30px;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 10px -3px #333;
  text-align: center;
}

input {
  border-radius: 100px;
  padding: 10px 15px;
  width: 50%;
  border: 1px solid #D9D9D9;
  outline: none;
  display: block;
  margin: 20px auto 20px auto;
}

button {
  border-radius: 100px;
  border: none;
  background: #719BE6;
  width: 50%;
  padding: 10px;
  color: #FFFFFF;
  margin-top: 25px;
  box-shadow: 0 2px 10px -3px #719BE6;
  display: block;
  margin: 55px auto 10px auto;
}

a {
  text-align: center;
  /* margin-top: 30px; */
  color: #719BE6;
  text-decoration: none;
  padding: 5px;
  display: inline-block;
}

a:hover {
  text-decoration: underline;
}

    </style>
</head>
<body>
<div class="form">
  <?php  echo $err; ?>
  <div class="err"></div>
  <center><h1>Admin login</h1></center>
  <?php
    echo $login_btn;
  ?>
                        
<input type="email" name="email" id='email' placeholder="Email" />
   
  <input type="password" name="Password" id='password' placeholder="Password" />

    <button id='submit'>Log in</button>
    <a href="../welcome/">Back to welcome page</a>

  
   

</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        
        $('#submit').on('click',function(){
            email = $('#email').val();
            password = $('#password').val();
           if(email !='' && password !=''){
               $.ajax({
                   url:'./php/login.php',
                   method:'POST',
                   data:{email,password},
                   success:function(data){
                       if(data == 'valid'){
                           window.location = './examples/';
                       }
                       else{
                             $('.err').html('<div class="alert alert-danger"> invalid user</div>')
                       }
                   }
               })
           }
           else{
            $('.err').html('<div class="alert alert-danger">All Feilds required</div>')
           }
        })
    })
</script>
</html>