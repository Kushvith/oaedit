<?php
    include("../../config/pdoconfig.php");
    session_start();
if(isset($_POST['submit'])){
    $text =  $_POST['text'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $college = $_SESSION['college'];
    $department = $_SESSION['department'];
    echo $college,$department,$name;
    $sql = "insert into announcement (name,email, announce, college, department) VALUES('$name','$email','$text','$college','$department')";
    $statement = $connection->prepare($sql);
    $statement->execute();
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Announcement</title>
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
</head>

<body>
  <?php
include("../php/side_top_navbar.php");
 ?>
  <!-- Main content -->
 
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Annoncement</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['department']; ?></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $_SESSION['name']; ?></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card border-0">
          <div class="card">
          <div class="card-header bg-transparent">
              <h3 class="mb-0">Annoncement</h3>
              <div class=" text-right">
                  <input type="button" name="filter" class="btn btn-sm btn-primary" value="Add" data-toggle="modal" data-target="#myModal"/>
                </div>
            </div>
            
            <div class="card-body">
            <div class="table-responsive verified overflow-auto crd">
                                    
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
        <h5 class="modal-title" id="exampleModalLabel">Add Announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form action="" method="post">
              <label><b>Announcement:</b></label>
              <br>
                   <textarea name="text" id="" cols="30" rows="3" class="form-control" placeholder="Announcement Text......" required></textarea>
                   <br>
                   <input type="submit" name="submit" value="submit" class="btn btn-primary">
              </form> 
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script> -->
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  <script>
    $(document).ready(function(){
      setInterval(() => {
          fetch_data();
      }, 3000);
        fetch_data();
        function fetch_data()
 {
  $.ajax({
   url:"../php/announce.php",
   method:"POST",
   success:function(data){
      $('.crd').html(data);
   }
  })
 }
    })
    </script>
</body>
</html>