<?php

       include('./curry.php');
       if(isset($_SESSION['access_token'])){
              $google_client->revokeToken(['refresh_token' => ''.$_SESSION['access_token'].'']);
       }
       
       session_destroy();
       header('location:./index.php');
?>