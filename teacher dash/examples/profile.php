<?php
        include("../../config/pdoconfig.php");
        session_start();
        $id = $_SESSION['id'];
       
        if(isset($_POST['submit'])){
          $name= strtoupper($_POST['name']);
          $email= $_POST['email'];
          $pass = $_POST['password'];
          $design= $_POST['design'];
          $dep= $_POST['dep'];
          $post= $_POST['post'];
          $college= $_POST['college'];
          
          // $id = $_SESSION['id'];
         $query = "UPDATE teacher_signin SET name='$name',email='$email',password='$pass',designation='$design',department='$dep',post='$post',college='$college' WHERE id='$id'";
         $statement =  $connection->prepare($query);
         $statement->execute();
        }
        $query = "SELECT * FROM teacher_signin WHERE id = '$id'";
          $statement = $connection->prepare($query);
          $statement->execute();
          $result = $statement->fetchAll();
          foreach($result as $row){
            $name =  trim($row["name"]);
            $email =  trim($row["email"]);
            $pass =  trim($row["password"]);
            $design =  trim($row["designation"]);
            $post =  trim($row["post"]);
            $dep =  trim($row["department"]);
            $college = trim($row['college']);
            $time = trim($row['time']);
            $profile = trim($row['profile']);
          }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Profile</title>
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
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $name; ?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
            <a href="#edit" class="btn btn-neutral">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <form action="" method="post">
   <a name="edit"> <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="../upload-and-crop-image/">
                    <img src=<?php if($profile==""){ echo "../assets/img/theme/team-4.jpg"; }else{ echo $profile;}?> class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <!-- <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a> -->
                <!-- <a href="#" class="btn btn-sm btn-default float-right">Message</a> -->
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <!-- <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  <?php echo $name;?><span class="font-weight-light"> </span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $design; ?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $post;?> - <?php echo $college; ?>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Department of <?php echo $dep; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-4 text-right">
                  <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Edit Profile"/>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" name="name" class="form-control" placeholder="Username" value="<?php echo $name;?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" name="email" class="form-control" placeholder="<?php echo $name;?>@example.com" value="<?php echo $email;?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">password</label>
                        <input type="password" id="input-first-name" name="password" class="form-control" placeholder="First name" value="<?php echo $pass;?>" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Post</label>
                        <select name="post" id="selectbox" class="form-control" value="" required>
                         <option value="Professor"<?php if($post == "Professor"){echo "selected"; }?>>Professor</option>
                          <option value="Assitent Professor"<?php if($post == "Assitent Professor"){echo "selected"; }?>>Assitent Professor</option>
                          
                      </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4"></h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Designation</label>
                        <input id="input-address" class="form-control" placeholder="Designation" name="design" value="<?php echo $design; ?>" type="text" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Centre</label>
                        <select name="college" id="selectbox" class="form-control" required>
                      <option value="NEC"  <?php if($college == "NEC"){ echo "selected";}?>>NEC</option>
                       <option value="GTC" <?php if($college == "GTC"){ echo "selected";}?> >GTC</option>
                       <option value="RNTC"<?php if($college == "RNTC"){ echo "selected";}?> >RNTC</option>
                       <option value="TTC" <?php if($college == "TTC"){ echo "selected";}?>>TTC</option>
                   </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Department</label>
                        <select name="dep" id="selectbox" class="form-control" required>
                         <option value="cp08" <?php if($dep == "cp08"){ echo "selected";}?> >cp08</option>
                          <option value="cp15"<?php if($dep == "cp15"){ echo "selected";}?> >cp15</option>
                          <option value="cp09"<?php if($dep == "cp09"){ echo "selected";}?> >cp09</option>
                          <option value="cp07"<?php if($dep == "cp07"){ echo "selected";}?> >cp07</option>
                      </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Account Created</label>
                        <input type="text" id="input-postal-code" class="form-control" placeholder="time" value="<?php  echo $time;?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <!-- <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">About Me</label>
                    <textarea rows="4" class="form-control" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                  </div>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      </form>
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
  
</body>

</html>