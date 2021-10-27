<?php
   include("../../config/pdoconfig.php");
    session_start();
   
    $query1 = "SELECT * FROM signin";
    $statement = $connection->prepare($query1);
    $statement->execute();
    $users = $statement->rowCount(); 
    $query1 = "SELECT * FROM signin where action !=''";
    $statement = $connection->prepare($query1);
    $statement->execute();
    $blocked = $statement->rowCount();
    $query1 = "SELECT * FROM teacher_signin";
    $statement = $connection->prepare($query1);
    $statement->execute();
    $teachers = $statement->rowCount();
    $pending= "pending";
    $appr = "approved";
    $rejected = "rejected";
    $name = $_SESSION['name'];
    $query1 = "SELECT * FROM hw WHERE verification = '$pending' AND teachername='$name'";
    $statement = $connection->prepare($query1);
    $statement->execute();
    $pendin = $statement->rowCount();
    
    $query1 = "SELECT * FROM hw WHERE verification = '$appr' AND teachername='$name'";
    $statement = $connection->prepare($query1);
    $statement->execute();
    $appr = $statement->rowCount();
    
    $query1 = "SELECT * FROM hw WHERE verification = '$rejected' AND teachername='$name'";
    $statement = $connection->prepare($query1);
    $statement->execute();
    $rej = $statement->rowCount();
    $total = $pendin+$appr+$rej;
    $sum = $appr+$rej;
    if($sum > 0){
    $per = ceil(($sum/$total)*100);
    }
    else{
      $per = 0;
    } 
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Dashboard</title>
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
  <!-- Sidenav -->
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
              <h6 class="h2 text-white d-inline-block mb-0">Teacher</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <!-- <li class="breadcrumb-item active" aria-current="page">Default</li> -->
                </ol>
              </nav>
            </div>
            <!-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div> -->
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Students</h5>
                      <span class="h2 font-weight-bold mb-0"><?php
                       echo $users;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Blocked users</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $blocked;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total teachers</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $teachers;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0"><?php $pe = "%"; echo $per .$pe ;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
      <div class="container-fluid mt--6">
      <div class="row"> 
       <!-- <div class="col-xl-8">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-light text-uppercase ls-1 mb-1">Assignment Uploads</h6>
                  <!-- <h5 class="h3 text-white mb-0">Sales value</h5> -->
               <!-- </div>
                <div class="col"> -->
                  <!-- <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li> -->
                    <!-- <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
                      </a> -->
                    <!-- </li>
                  </ul> -->
               <!-- </div>
              </div>
            </div>
            <div class="card-body"> -->
              <!-- Chart -->
             <!--  <div id="curve_chart" style="height: 350px"></div>
            </div>
          </div>
        </div> -->
        <div class="col-xl">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h5 class="h3 mb-0">Total Status</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div id="Visitors" style="width:350; height: 300px;"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Pending Assesments</h3>
                </div>
                <div class="col text-right">
                  <a href="assesments.php" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">File name</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Time</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query1 = "SELECT * FROM hw WHERE verification = '$pending' AND teachername='$name'";
                  $statement = $connection->prepare($query1);
                  $statement->execute();
                  $result = $statement->fetchAll();
                  foreach($result as $row)
                  {
                    ?>
                    <tr>
                    <th scope="row">
                    <?php echo $row['name']; ?>
                    </th>
                    <td>
                    <?php echo $row['file_name']; ?>
                    </td>
                    <td>
                    <?php echo $row['semester']; ?>
                    </td>
                    <td>
                    <?php echo $row['time']; ?>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                 
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Blocked Users</h3>
                </div>
                <div class="col text-right">
                  <a href="tables.php" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Student Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Batch Year</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $query1 = "SELECT * FROM signin WHERE action !=''";
                  $statement = $connection->prepare($query1);
                  $statement->execute();
                  $result = $statement->fetchAll();
                  foreach($result as $row)
                  {
                    ?>
                  <tr>
                    <th scope="row">
                      <?php echo $row['TokenNumber']; ?>
                    </th>
                    <td>
                    <?php echo $row['Name']; ?>
                    </td>
                    <td>
                    <?php echo $row['BatchYear']; ?>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
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
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['VERIFIED',     <?php echo $appr;?>],
          ['REJECTED',     <?php echo $rej;?>],
          ['PENDING', <?php echo $pendin;?>]
          
         
        ]);

        var options = {
        //   title: 'My Daily Activities',
          is3D: true,
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.PieChart(document.getElementById('Visitors'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Marks'],
        //   ['2004',  1000],
        //   ['2005',  1170],
        //   ['2006',  660],
        //   ['2007',  1030]
        <?php 
            $emails = $_SESSION['email'];
            $department = $_SESSION['department'];
            $query3 = "SELECT * FROM teacher_hw WHERE name = '$emails'";
            $statement = $connection->prepare($query3);
            $statement->execute();
            $result = $statement->fetchAll();    
            foreach($result as $row){
              $string = "2010-11-24";
$timestamp = strtotime($string);
$day = date("d", $timestamp);
              echo '["'.$row["time"].'('.$row['file_name'].')" , "$day"],';
              }
          ?>
          
        ]);

        var options = {
        //   title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  
</body>

</html>