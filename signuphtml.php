<?php
require 'config/pdoconfig.php';
$err = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqBootstrapValidation/1.3.7/jqBootstrapValidation.min.js" integrity="sha512-JHVzEjx3zsh0SY+F9jc0VlW7VBXeDIJNXR0xcYySu1QLhf+Du8Zx9p28zP5MjIW7onsVy0qMsVls0YO6GTg2Aw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    #select {
      width: 30px;
    }
  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/signup.css">
  <title>form</title>
</head>

<body>
  <div class="logo">
    <img src="./images/logo.png" alt="NTTF" srcset="">
  </div>

  <div class="containers">

    <center>
      <h1>REGISTRATION</h1>
    </center>
    <div id="err">
      <h3><?php echo $err;
          ?></h3>
    </div>
    <center> <img src="./images/avatar-1299805.png" class="avater" alt="img"> </center>

    <form action="" id="simple_form" novalidate="novalidate" method="POST">
      <div class="control-group">
        <div class="form-group">
          <b><label>NAME:</label></b> <br><input type="text" class="form-control" placeholder="name" title='name' id="name" data-validation-required-message="please enter User name " name="username" required="required">
          <p class="text-danger help-block"></p>
        </div>
      </div>
      <br>
      <div class="control-group">
        <div class="form-group">
          <b><label>EMAIL:</label></b> <br>
          <input type="email" name="email" id="email" class="form-control" placeholder="email" title='email' data-validation-required-message="please enter email" required="required">
          <p class="text-danger help-block"></p>
        </div>
      </div>
      <br>
      <div class="control-group">
        <div class="form-group">
          <b><label for="college">CENTRE:</label></b>
          <select name="college" class="form-control" id="centre" data-validation-required-message="please Select Centre" required="required">
            <option value="">select centre</option>
            <option value="NEC">NEC</option>
            <option value="GTC">GTC</option>
            <option value="RNTC">RNTC</option>
            <option value="TTC">TTC</option>
          </select>
          <p class="text-danger help-block"></p>
        </div>
      </div>
      <br>
      <div class="control-group">
        <div class="form-group">
          <b><label>YEAR:</label></b> <br>
          <input type="text" name="year" id="year" class="form-control" placeholder="year" title='year' data-validation-required-message="please enter Batch year" required="required">
          <p class="text-danger help-block"></p>
        </div>
      </div>
      <br>
      <div class="control-group">
        <div class="form-group">
          <b><label for="college">DEPARTMENT:</label></b>
          <select name="department" id="department" class="form-control" data-validation-required-message="please enter department" required="required">
            <option value="">select Department</option>
            <option value="cp08">cp08</option>
            <option value="cp15">cp15</option>
            <option value="cp09">cp09</option>
            <option value="cp07">cp07</option>
          </select>
          <p class="text-danger help-block"></p>
        </div>
      </div>
      <br>
      <div class="control-group">
        <div class="form-group">
          <b><label>TOKEN NUMBER:</label></b> <br>
          <input type="text" name="tkno" id="tkno" class="form-control" placeholder="Token Number" title='Token Number' data-validation-required-message="please enter token NO" required="required">
          <p class="text-danger help-block"></p>
        </div>
      </div>
      <br>
      <div class="control-group">
        <div class="form-group">
          <b><label for="password">PASSWORD</label></b> <br>
          <input type="password" name="password" class="form-control" id="password" placeholder="password" title='password' data-validation-required-message="please enter password" required="required">
          <p class="text-danger help-block"></p>
        </div>
      </div>
      <br>
      <div class="control-group">
        <div class="form-group">
          <b><label>RE-ENTER YOUR PASSWORD</label> <br></b>
          <input type="password" name="repassword" class="form-control" id="repass" placeholder="re-enter password" title="re-enter password" data-validation-required-message="please enter re-check password" required="required"><br>
          <p class="text-danger help-block"></p>
        </div>
      </div>
      <input type="submit" value="submit" name="submit" id="submit"></center> <br>
      <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="hide" class="form-control btn btn-primary">verify Otp</button>

      <center>
        <h5>if your account is already exists<a href="index.php">SIGN IN</a></h5>
      </center>
  </div>
  </form>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Otp Verification</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
        </div>
        <div class="modal-body">
          <div>
            <div class="error"></div>
            <div class="alert alert-success">
              <center>Otp Sent Your Email</center>
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
  </div>
  </center>

</body>
<script>
  $(document).ready(function() {
    $('#hide').hide();
    $('#login-btn').hide();
    cred();
    
    function cred(){
      $(document).on('click','#submit',function(){
    $('#simple_form input,#simple_form select').jqBootstrapValidation({
      preventSubmit: true,
      submitSuccess: function($form, event) {
        event.preventDefault();
        $this = $('#submit');
        $this.prop('disabled', true);
        var form_data = $('#simple_form').serialize();
        $.ajax({
          url: "./php/signin.php",
          method: "POST",
          data: form_data,
          success: function(data) {
            if (data) {
              $("#err").html(data);
              $this.prop('disabled', true);
              $('#simple_form').trigger('reset');
            } else {
              email = $('#email').val();
              $this.prop('disabled', false);
              //  $('#simple_form').trigger('reset');
              $('#hide').show();

            }
          },
          error: function(data) {
            alert("error")
            $this.prop('disabled', false);
          }
          // complete:function(){
          //   setTimeout(() => {
          //     $this.prop('disabled',false);
          //   }, 5000);
          // }
        })
      }
    })
  })
    }    

    $('#close').on('click', function() {
      $('#hide').hide();
      $('#simple_form').trigger('reset');
    })

    $('#submit-btn').on('click', function() {
      otpVal = $('#otp').val();
      email = $('#email').val();
      $.ajax({
        url: "./php/checkotp.php",
        method: "POST",
        data: {
          otpVal: otpVal,
          email: email
        },
        success: function(data) {
          if (data == 'YOU ARE VERIFIED') {
            $('#simple_form').trigger('reset');
            $('.error').html(data);

          } else {
            $('.error').html(data);
          }

          $('#otp').val() = "";
        }
      })

    })

  })
</script>

</html>