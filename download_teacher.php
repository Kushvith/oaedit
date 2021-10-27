<?php 

include 'config/cofig.php';

$id = $_GET['id']; // Get id from url bar


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/user.css">

	<title>download</title>
</head>
<body>
	<div class="file__upload">
		<div class="header">
			<p><i class="fa fa-download fa-2x"></i><span><span>down</span>load</span></p>			
		</div>
		<form class="body">
			<div class="download">
                <?php 
                    
                $sql = "SELECT * FROM teacher_hw WHERE id='$id'";
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    if ($row = mysqli_fetch_assoc($result)) {
                ?>
                <h2><center>download</center></h2><br>
                <a href="teacher dash/uploads/<?php echo $row['address']; ?>" target="_blank" download="<?php echo $row['file_name']; ?>" class="download_link"><?php echo $row['file_name']; ?></a><br>
                <br><h2><center>open</center></h2><br>
                <a href="teacher dash/uploads/<?php echo $row['address']; ?>" target="_blank" class="download_link"><?php echo $row['file_name']; ?></a>
               <?php
                
                    }
                }
                ?>
            
            </div>
		</form>
	</div>
</body>
</html>