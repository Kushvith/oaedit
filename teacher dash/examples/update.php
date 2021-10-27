<?php
include("../../config/pdoconfig.php");
session_start();
$id = $_SESSION['id'];
$query = "SELECT * FROM teacher_signin WHERE id = '$id'";
          $statement = $connection->prepare($query);
          $statement->execute();
          $result = $statement->fetchAll();
          foreach($result as $row){
            $dep =  trim($row["department"]);
            $name = trim($row['name']);
            $email= $row['email'];
            $post= $row['post'];
            $college= $row['college'];
          }

  
    $id = $_SESSION['id'];
    
  if(!$id){
    header('location:../index.php');
  }  
//   $query = "SELECT * FROM signin WHERE id='$id'" ;

  $query = "SELECT * FROM signin WHERE id='$id'" ;
$statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row){
        $profile = trim($row['profile']);
     
    }


  $link = "";
  $link_status = "display: none;";
  

  if(isset($_POST['upload'])){
    
	 $college = $_SESSION['college'];
   $subject = $_POST['subject'];
   $submit_date = $_POST['submit_date'];
	// $name = 'testing';
	$base_url = 'localhost/oaedit/';
	$verification = "pending";
	// file uploading data
	$location = "../uploads/";
	$file_new_name = date("dmy") . time() . $_FILES["file"]["name"]; // New and unique name of uploaded file
	$file_name = $_FILES["file"]["name"]; // Get uploaded file name
	$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
	$file_size = $_FILES["file"]["size"]; // Get uploaded file size
	
	if ($file_size > 1048576000000000000) { // Check file size 10mb or not
		echo "file size too large";
	}else{
    $semester = $_POST['semester'];
		$sql = "INSERT INTO teacher_hw (name,email,subject,file_name, address,department,college,submit_date,semester)
				VALUES ('$name','$email','$subject','$file_name', '$file_new_name','$dep','$college','$submit_date','$semester')";
		$statement = $connection->prepare($sql);
        $result = $statement->execute();
		if ($result) {
			move_uploaded_file($file_temp, $location . $file_new_name);
			
			$sql = "SELECT id FROM teacher_hw";
			$statement = $connection->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll();
			// if ($row = mysqli_fetch_assoc($result)) {
                foreach($result as $row){
                    echo $row['id'][0];
				$link = $base_url . "download_teacher.php?id=" . $row['id'];
				$link_status = "display: block;";
			}
		}
		else{
			echo "error in uploading";
		}
	}



  }

?> 
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="TARUN RK">
  <title>Assignment Upload</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <link href="../../student dash/html/css/style.css" rel="stylesheet">
  <link href="../../student dash/html/css/upload.css" rel="stylesheet">
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
              <h6 class="h2 text-white d-inline-block mb-0">Assignments uploads</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="./index.php"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Uploads</a></li>
                  <!-- <li class="breadcrumb-item active" aria-current="page">Upgrade to pro</li> -->
                </ol>
              </nav>
            </div>
            <!-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row mt--5">
        <div class="col-md-10 ml-auto mr-auto">
          <div class="card card-upgrade">
            <div class="card-header text-center border-bottom-0">
              <h4 class="card-title">Upload Assignments</h4>
              <p class="card-category">You can only upload assignments for department of <?php echo $dep; ?>.</p>
            </div>
            <div class="card-body">
              <center> <div  id="hide">
                    	<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                      <h3 id="status"></h3>
                      <p id="loaded_n_total"></p>
                    </div></center>
            <center><div class="file__upload">
	                                        <div class="header">
			                                      <p><i class="fa fa-cloud-upload fa-2x"></i><span><span>up</span>load</span></p>			
		                                      </div>
		                                      <form action="" method="POST" enctype="multipart/form-data" class="body">
		                                      <input type="checkbox" id="link_checkbox">
			                                    <input type="text" value="<?php echo $link; ?>" id="link" width="100%" readonly>
		                                    	<label for="link_checkbox" style="<?php echo $link_status; ?>">Get Sharable Link</label>
        
	                                      	<input type="file" name="file" id="upload" required>
        
			                                    <label for="upload">
				                                    <i class="fa fa-file-text-o fa-3x"></i>
				                                   <p>
					                                   <strong>Drag and drop</strong> files here<br>
					                                   or <span>browse</span> to begin the upload
				                                   </p>
                                          </label>
                                         
                                          <label>Submission Date</label>
                                          <input type="date" width="10px" name="submit_date" width="50%" placeholder="SUBMIT DATE YYYY-MM-DD" value="" class="form-control" required>
                                          <div class="d-flex flex-row-reverse bd-highlight">
                                          <div class="p-2 bd-highlight">
                                          <select name="semester" id="" class="form-control" required>
                                                <option value="sem1">Semester 1</option>
                                                <option value="sem2">Semester 2</option>
                                                <option value="sem3">Semester 3</option>
                                                <option value="sem4">Semester 4</option>
                                                <option value="sem5">Semester 5</option>
                                                <option value="sem6">Semester 6</option>

                                                </select>
                                          
                                        </div>
                                            <div class="p-2 bd-highlight">
                                          
                                          <input type="text" width="10px" name="subject" width="50%" placeholder="SUBJECT"  class="form-control" required>

                                          </div>  
                                        </div>
	                                    	<button name="upload" id="btn" class="btns"  onclick="uploadFile()">Upload</button>
	                                    </form>
                                      <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->

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
 <!-- Modal -->


  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <script>
              function _(el){
        return document.getElementById(el);
      }
      
      function uploadFile(){
        
        var file = _("upload").files[0];
        // alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("file1", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "upgrade.php");
        ajax.send(formdata);
      }
      function progressHandler(event){
        _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
        var percent = (event.loaded / event.total) * 100;
        _("progressBar").value = Math.round(percent);
        _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
      }
      function completeHandler(event){
        _("status").innerHTML = event.target.responseText;
        _("progressBar").value = 0;
      }
      function errorHandler(event){
        _("status").innerHTML = "Upload Failed";
      }
      // function abortHandler(event){
      //   _("status").innerHTML = "Upload Aborted";
      // }
          </script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      
          <script>
              $(document).ready(function(){
                $('#hide').hide();
                  $('#btn').on('click' ,function(){
                    $('#hide').show();
                    

                  })
              });
      
      </script>
</body>

</html>