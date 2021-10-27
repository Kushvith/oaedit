<?php
     include("../config/pdoconfig.php");
     session_start();

    

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>REGISTER PAGE</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>     
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqBootstrapValidation/1.3.7/jqBootstrapValidation.min.js" integrity="sha512-JHVzEjx3zsh0SY+F9jc0VlW7VBXeDIJNXR0xcYySu1QLhf+Du8Zx9p28zP5MjIW7onsVy0qMsVls0YO6GTg2Aw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Favicon -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- <link rel="stylesheet" href="assets/css/style.css" type="text/css"> -->
</head>

<body class="bg-default">
  <!-- Navbar -->
  <?php
       include("./php/register_nav.php");
   ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Create an account</h1>
              <p class="text-lead text-white">create new account.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div id="err"></div>
    <form id="simple_form" novalidate="novalidate" method="POST">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-header bg-transparent pb-5">
              
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sign up with credentials</small>
              </div>
              <div class="control-group">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Name" type="text" name="name" data-validation-required-message="please enter User name " required="required">
                  </div>
                  <p class="text-danger help-block"></p>
                  </div>
                </div>
                
                <div class="control-group">          
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" id="email" name="email" data-validation-required-message="please enter email" required="required">
                    </div>
                  <p class="text-danger help-block"></p>
                  </div>
                </div>

                <div class="control-group">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="pass" data-validation-required-message="please enter password " required="required">
                    </div>
                  <p class="text-danger help-block"></p>
                  </div>
                </div>

                <div class="control-group">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Re-Password" type="password" name="repass" data-validation-required-message="please enter Re-password" required="required">
                    </div>
                  <p class="text-danger help-block"></p>
                  </div>
                </div>
                
                
                <div class="control-group">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Qualification" name='design' type="text" data-validation-required-message="please enter Qualifaction" required="required">
                    </div>
                  <p class="text-danger help-block"></p>
                  </div>
                </div>
                <div class="control-group">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-app"></i></span>
                    </div>
                    <select name="post" id="selectbox" class="form-control" data-validation-required-message="Select Your Post" required="required">
                       <option value="">Select Post</option>
                       <option value="Senior Training officier">Senior Training officier</option>
                       <option value="Training Officer">Training Officer</option>
                        <option value="Assistant training officer">Assistant training officer</option>
                        <option value="Manager">Manager</option>
                        <option value="deputy manager">deputy manager</option>
                          <option value="Divisional Manager">Divisional Manager</option>  
                      </select>
                      </div>
                  <p class="text-danger help-block"></p>
                      </div>
                </div>

                <div class="control-group">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-app"></i></span>
                    </div>
                    <select name="department" id="selectbox 2" class="form-control" data-validation-required-message="please Select your Department" required="required">
                         <option value="">Select Department</option>
                         <option value="cp08">cp08</option>
                          <option value="cp15">cp15</option>
                          <option value="cp09">cp09</option>
                          <option value="cp07">cp07</option>
                      </select>
                      </div>
                  <p class="text-danger help-block"></p>
                  </div>
                </div>

                <div class="control-group">
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-building"></i></span>
                    </div>
                    <select name="college" id="selectbox 3" class="form-control" data-validation-required-message="please Select Your College" required="required">
                      <option value="">Select Centre</option>
                      <option value="NEC">NEC</option>
                       <option value="GTC">GTC</option>
                       <option value="RNTC">RNTC</option>
                       <option value="TTC">TTC</option>
                   </select>
                   </div>
                  <p class="text-danger help-block"></p>
                  </div>
                </div>
                <div class="control-group">
                <div class="form-group">
                <div class="text-center">
                  <input type="submit" class="btn btn-primary mt-4 form-control" value="Create account" id="submit"/>
                <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="hide" class="form-control btn btn-primary">verify Otp</button> 
                
                </div>
                </div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" >Otp Verification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
                  </div>
                  <div class="modal-body">
                    <div>
                       <div class="error"></div>
                        <div class="alert alert-success"><center>Otp Sent Your Email</center> 
                    	   <input type="text" placeholder="Enter OTP" name="otp" class="form-control" id="otp">
                         <input type="button" value="submit" id="submit-btn" class="btn btn-primary form-control">
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Close</button>
                      <button type="button" class="btn btn-primary" id="login-btn">Login</button>
                    </div>
                </div>
              </div>
            </div>
  <!-- Footer -->
  <?php
     include("../php/footer.php");
  ?>
  <!-- Argon Scripts -->
  <!-- Core -->
  <!-- <script src="assets/vendor/jquery/dist/jquery.min.js"></script> -->
  <!-- <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="assets/vendor/js-cookie/js.cookie.js"></script> -->
  <!-- <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script> -->
  <!-- <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script> -->
  <!-- Argon JS -->
  <!-- <script src="assets/js/argon.js?v=1.2.0"></script> -->
</body>
<script>
   $(document).ready(function(){
     
     
    $('#hide').hide();
  $('#login-btn').hide();
 $('#submit').on('click',function(){
    $('#simple_form input,#simple_form select').jqBootstrapValidation(
       {
         preventSubmit:true,
         submitSuccess:function($form,event)
         {
           event.preventDefault();
           $this = $('#submit');
           $this.prop('disabled',true);
           var form_data = $('#simple_form').serialize();
           $.ajax({
            url:"./php/signin.php",
             method:"POST",
             data:form_data,
           success:function(data){
            //  alert(data);
             if(data == 'done-email'){
              email = $('#email').val();
             $this.prop('disabled',true);
            //  $('#simple_form').trigger('reset');
            $('#hide').show();
             }else{
              $("#err").html(data);
              $this.prop('disabled',false);
              $('#simple_form').trigger('reset');

             
            
             }
        },
        error:function(data){
           alert("error")
           $this.prop('disabled',false);
        }
        // // complete:function(){
        // //   setTimeout(() => {
        // //     $this.prop('disabled',false);
        // //   }, 5000);
        // // }
           })
         }
       }
     )
    })
     $('#close').on('click',function(){
      $('#hide').hide();
      $('#simple_form').trigger('reset');
    })

    $('#submit-btn').on('click',function(){
      //  alert(1)
      otpVal = $('#otp').val();
      email = $('#email').val();
      alert(email)
          $.ajax({
        url:"./php/checkotp.php",
        method:"POST",
        data:{otpVal:otpVal,email:email},
        success:function(data){
          // alert(data)
         
            if(data == 'YOU ARE VERIFIED'){
              $('#login-btn').show();

              $('.error').html(data);
              
            }else{
              $('.error').html(data);
            }

            $('#otp').val() = "";
        }
      })

    })
   })
</script>
</html>