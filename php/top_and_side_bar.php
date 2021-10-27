<?php
//   include("../../config/pdoconfig.php");
// session_start();
  $id = $_SESSION['id'];
  if(!$id){
    header('location:../../index.php');
  }  
//   $query = "SELECT * FROM signin WHERE id='$id'" ;
// $statement = $connection->prepare($query);
//     $statement->execute();
//     $result = $statement->fetchAll();
//     foreach($result as $row){
//         $profile = trim($row['profile']);
     
//     }
// ?>

<div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" width = "190"/>
                            <!-- Light Logo text -->
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="Student" /></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box"> <a
                                class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="fa fa-search"></i></a>
                                    <form class="app-search">
                                <input type="text"  id="search_text" class="form-control" placeholder="Search...."> <a
                                    class="srh-btn"><i class="fa fa-times"></i></a></form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"
                                id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="<?php   
if($profile == ""){
    echo '../assets/images/users/5.jpg';
}else{
    echo $profile;
}
?> " alt="user" class="" /> <span
                                    class="hidden-md-down"><?php echo $_SESSION['name'] ?> &nbsp;</span> </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i
                                    class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-profile.php" aria-expanded="false"><i
                                    class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="table-basic.php" aria-expanded="false"><i
                                    class="fa fa-book"></i><span class="hide-menu">ASSINGMENTS</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="icon-fontawesome.php" aria-expanded="false"><i
                                    class="fa fa-upload"></i><span class="hide-menu">UPLOADS</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="map-google.php" aria-expanded="false"><i
                                    class="fa fa-wechat"></i><span class="hide-menu">CHAT APP</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-blank.php" aria-expanded="false"><i
                                    class="fa fa-bullhorn"></i><span class="hide-menu">ANNOUNCEMENT</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.php" aria-expanded="false"><i
                                    class="fa fa-book"></i><span class="hide-menu">Teachers Assignments</span></a>
                        </li>
                    </ul>
                    <div class="text-center mt-4">
                        <a href="feedback.php"
                            class="btn waves-effect waves-light btn-info hidden-md-down text-white"> Feedback</a>
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        