<?php
     session_start();
     if(!isset($_SESSION['email'])){
       header('location:../index.php');
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <style>
    body{
      overflow-y: hidden;
    }
    .wrapper{
      display:none;
      visibility: hidden;
    }
    .preloader{
      height:100vh !important;
      width:100%;
      overflow: hidden;
      z-index: 100;
      display: table-cell;
       text-align: center;
      vertical-align: middle;
    }
    .preloader img{
      border-radius:20px;
    }
    
  </style>
</head>

<body class="dark-edition">
<!-- wrapper 1 -->
<center><div class="preloader dark-edition ">
 <img src="../assets/img/loader.gif" id='img'  alt="" srcset="">
</div></center> 
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Check Status</h5>
      </div>
      <div class="modal-body">
        <div class="teacher-check"></div>
        <div class="feedback-modal-view"></div>
        <div class="send-email">
        <input type="number" name="" id="number" hidden>
        <textarea name="" id="email-txt" placeholder="reply for email" class="form-control dark-edition" style="color:black;" cols="30" rows="10"></textarea>
        <input type="button" value="Send" class="btn btn-primary" id='send'>
        <button class="btn btn-primary" type="button" id='loading' disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Loading...
        </button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- wrapper -->
<div class="wrapper">
<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!-- sidebar -->
        <?php
          include('../php/top-sidebar.php'); 
        ?>
<div class="content side-1">
  <?php
    include('./dashboard.php');
  ?>
    </div>   
  <!-- wrapper 1 ends here -->    
<!-- wrapper 2  -->
<div class="content side-2">
  <?php
    include('./icons.php');
  ?>
    </div>   
  <!-- wrapper 2 ends here -->
  <!-- wrapper 3 -->
  <div class="content side-3">
  <?php
     include('./student.php');
  ?>
  </div> 
  <!-- wrapper 3 ends here -->
  <!-- wrapper 4 -->
  <div class="content side-4">
  <?php
       include('./notifications.php');
  ?>
  </div> 
  <!-- wrapper 4 ends here -->
<!-- wrapper 5  -->
<div class="content side-6">
  <?php
    include('./tables.php');
  ?>
    </div>   
  <!-- wrapper 5 ends here -->
  <div class="content side-7">
  <?php
    include('./user.php');
  ?> 
    </div> 
  <!-- wrapper 6  -->
<div class="content side-5">
  <?php
    include('./typography.php');
  ?>
    </div>   
  <!-- wrapper 6 ends here -->
    <!-- wrapper 7  -->
 
  </div>
  </div> 
  <!-- </div> -->
  <!-- wrapper 7 ends here -->
     <!-- footer session -->
     <?php
         include('../php/footer.php');
     ?>
     <!-- footer ends -->
<!-- script session -->
<?php 
   include('../php/script.php');
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script src="../js/navigator.js"></script>
<script src="../js/dash.js"></script>
<script src="../js/teacher.js"></script>
<script src="../js/students.js"></script>
<script src="../js/teacherstatus.js"></script>
<script src="../js/addteacher.js"></script>
<script src="../js/feedback.js"></script>
<script src="../js/contact.js"></script>
<!-- script session ends -->
 
</body>

</html>    