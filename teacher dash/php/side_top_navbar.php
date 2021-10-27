<?php
// include("../../config/pdoconfig.php");

$id = $_SESSION['id'];


if(!$id){
  header('location:../index.php');
}
  $query= "SELECT * FROM teacher_signin WHERE id = '$id'";
  $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row){
        $profile = $row['profile'];
        $name=  $row['name'];
        
    }
    ?>
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../assets/img/brand/logo-text.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="assesments.php">
                <i class="fa fa-hourglass-start"></i>
                <span class="nav-link-text">Pending Asignments</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="approved.php">
                <i class="fa fa-check"></i>
                <span class="nav-link-text">Approved Asignments</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reject-table.php">
                <i class="fa fa-ban"></i>
                <span class="nav-link-text">Rejected Asignments</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tables.php">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">User Status</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="announce.php">
                <i class="fa fa-bullhorn"></i>
                <span class="nav-link-text">Announcement</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="update.php">
                <i class="fa fa-upload"></i>
                <span class="nav-link-text">Update Assesments</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          
          <!-- Navigation -->
          
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text" id="search_txt">
              </div>
            </div>
            <button type="button" class="close"  data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              
            
            
                <!-- Dropdown header -->
           
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src=<?php if($profile == ""){ echo "../assets/img/theme/team-4.jpg";} else{ echo $profile;}?>>
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $name;?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="profile.php" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="assesments.php" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Pending Asignments</span>
                </a>
                <a href="announce.php" class="dropdown-item">
                  <i class="fa fa-bullhorn"></i>
                  <span>Annoncement</span>
                </a>
                <a href="update.php" class="dropdown-item">
                  <i class="fa fa-upload"></i>
                  <span>Update</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="../php/logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>