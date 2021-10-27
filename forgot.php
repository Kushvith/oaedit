<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>     
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqBootstrapValidation/1.3.7/jqBootstrapValidation.min.js" integrity="sha512-JHVzEjx3zsh0SY+F9jc0VlW7VBXeDIJNXR0xcYySu1QLhf+Du8Zx9p28zP5MjIW7onsVy0qMsVls0YO6GTg2Aw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <style>
    .containers{
        height:250px !important;
        overflow:hidden !important;
    }
    label{
        font:bold;
    }
 
    </style>
    <title>Forgot password</title>
</head>
<body>
   <div class="containers 1">
   <div id="email-err"></div>
        <label for="">Email:</label>
        <input type="email" name="" id="email" class="form-control" placeholder="Email" data-validation-message="Enter email" required="required">
        <input type="button" class='btn btn-primary' id="email-btn"  value="Check">
   </div>
   <div class="containers 2">
   <div id="otp-err"></div>
   <label for="">otp:</label>
        <input type="text" class="form-control" name="" id="otp">
        <input type="button" class='btn btn-primary' id="otp-btn" value="Submit">  
   </div> 
   <div class="containers 3">
   <div id="pass-err"></div>
   <label for="">Password:</label>
        <input type="password" class="form-control" name="" id="Pass">
        <input type="button" class='btn btn-primary' id='pass-btn' value="Change"> 
        <a href='./index.php' class="form-control" id='a'>Login in </a>  
   </div>
</body>
<script>
     $(document).ready(function(){
        $('.2').hide();
        $('#a').hide();
        $('.3').hide();
        $('#email-btn').on('click',function(){
          email = $('#email').val();
          $.ajax({
              url:'./php/forgot-email.php',
              method:'POST',
              data:{email:email},
              success:function(data){
                if(data == "user exists")
                {
                    $('.1').hide();
                    $('.2').show();
                }
                else{
                    $('#email-err').html(data);
                }
              }
          })
        })
        $('#otp-btn').on('click',function(){
           otp = $('#otp').val();
           email= $('#email').val();
           $.ajax({
               url:'./php/forgot-otp.php',
               method:"POST",
               data:{otp,email},
               success:function(data){
                   if(data == "working"){
                    $('.2').hide();
                    $('.3').show();
                   }
                   else
                   {
                    $('#otp-err').html(data);  
                   }
               }
           })
        })
        $('#pass-btn').on('click',function(){
            pass = $('#Pass').val();
           email= $('#email').val();
           $.ajax({
               url:'./php/forgot-pass.php',
               method:"POST",
               data:{pass,email},
               success:function(data){
                   if(data)
                   {
                      $('#pass-err').html(data);
                      $('#a').show();
                   }
               }
           })
        })
     })
</script>
</html>