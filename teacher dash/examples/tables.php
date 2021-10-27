<?php 

include("../../config/pdoconfig.php");
session_start();
$limit = 5;

//  
if(isset($_GET['page'])){
    $page = $_GET['page'];
  
}
else{
    $page =1;
}
$dep = $_SESSION['department'];
$start_from=(($page-1)*5);
$block = "block";
$sql = "SELECT * FROM signin  LIMIT $start_from,$limit";
// echo $sql;
$statement = $connection->prepare($sql);

$statement->execute();
$result = $statement->fetchAll();
$output = '
<table class="table">
<thead>
       <tr>
       <th scope="col" class="table-primary">Student Id</th>
         <th scope="col" class="table-primary">Name</th>
         <th scope="col" class="table-primary">Email</th>
         <th scope="col" class="table-primary">Semester</th>
         <th scope="col" class="table-primary">department</th>
         <th scope="col" class="table-primary">Action</th>
       </tr>
     </thead>
     <tbody>
';
foreach($result as $row) {
  if($row['action'] == '')
  {
   $output .= '
   <th scope="row">'.$row['TokenNumber'].'</th>
   <th scope="row">'.$row['Name'].'</th>
   <th scope="row">'.$row['Email'].'</th>
   <th scope="row">'.$row['BatchYear'].'</th>
   <th scope="row">'.$row['Department'].'</th>
   <th scope="row"><a href="../php/block.php?id='.$row['id'].'"><button class="btn btn-danger">Block</button></a></th>
   </tr>
</tbody>';
}
}
$output .=  '  </table>';
$sql = "SELECT * FROM signin";
$statement = $connection->prepare($sql);
$statement->execute();
$total_rows = $statement->rowCount();
$total_pages = ceil($total_rows/$limit);
// echo $total_pages;
for($i=1; $i<=$total_pages;$i++)
{
   $pag =  "<li class='page-item active'><a href='tables.php?page=".$i."'>
   ".$i."</a>
 </li>";
//  echo $pag;
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Users Action</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
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
              <h6 class="h2 text-white d-inline-block mb-0">Action</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Block Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">tables</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <!-- <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Block Users</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush block">
              <?php echo $output;?>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <?php
                  for($i=1; $i<=$total_pages;$i++)
                      {
                         $pag =  "<li class='page-item'><a href='tables.php?page=".$i."' class='page-link'>
                         ".$i."</a>
                       </li>";
                       echo $pag;
                      }
                      
                      ?>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Dark table -->
      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Blocked Users</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush unblock">
             
              </table>
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
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  <script>
  $(document).ready(function(){
    var interval;
    fetch();
    interval = setInterval(fetch,1000);
    
  function fetch(){
    $.ajax({
      url:'../php/unblock.php',
      method:'POST',
      success:function(data){
        $('.unblock').html(data);
      }
    })
  }
 
  });
  </script>
</body>

</html>