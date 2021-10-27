<?php
include("../../config/pdoconfig.php");
 session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Pending Assesments</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
  <!-- Sidenav -->
  <?php
    include("../php/side_top_navbar.php");
  ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Assesments Verification</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Assesments</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Verification</li>
                </ol>
              </nav>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Pending Assesments</h3>
              <div class=" text-right">
                  <!-- <input type="button" name="filter" class="btn btn-sm btn-primary" value="Filter"/> -->
                </div>
            </div>
            
            <div class="card-body">
            <div class="table-responsive pending overflow-auto">
                                    
             </div>
            </div>
          </div>
         
          </div>
        </div>
      </div>
    
      <!-- Footer -->
      <?php
        include("../../php/footer.php");
      ?>
    </div>
  </div>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approve</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="number" placeholder="Enter Marks" name="marks" min="1" id="marks" class="form-control" required/>
          <span class="text-danger"></span>     
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="btn" id="btn">Approved</button>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script>
          $(document).ready(function(){
            // alert("working");
            var interval;
            interval = setInterval(fetch,5000);
            
            search();
            fetch();
            // marks();
            function fetch(){
                $.ajax({
                    url:"../php/table.php",
                    method:"POST",
                    success:function(data){
                $(".pending").html(data);
                    
                         }
                })
              }
            function fetchverified(){
              var marks = $(this).data('marks');
              $.ajax({
                    url:"../php/verified_table.php",
                    method:"POST",
                    success:function(data){
                $(".verified").html(data);
                    
                         }
                })
            }  
              
              $(document).on('click', '.start_chat', function(){
                var email = $(this).data('tousername');
                var file = $(this).data('filename');
                $("#btn").on("click",function(){
                  var marks = $("#marks").val();
                  if(marks==""){
                    $('.text-danger').append('Marks is required');
                  }
                  else{
                  $.ajax({
                    url:"../php/marks_update.php",
                    method:"POST",
                    data:{email:email,marks:marks,file:file},
                    success:function(data){
                        // $(".table-responsive").html(data);
                           alert(data);
                         }
                })
                  }
                 });
              })        
              function search(){
                  
                  $('#search_txt').keyup(function(){
                      var txt = $(this).val();
                      
                      if(txt =""){
                        interval = setInterval(fetch,3000);
                      }
                      else{
                        clearInterval(interval);
                        $(".table-responsive").html('');
                        var txt = $(this).val();
                        
                          $.ajax({
                           url:"../php/search2.php",
                            method:"POST",
                          data:{search:txt},
                          dataType:"text",
                          success:function(data)
                          {
                              
                              $(".table-responsive").html(data);
                          }
                      })
                          }
                          
                  });
                }
            });
      </script>
</body>

        
        
</html>