<?php
  include("../../config/pdoconfig.php");
  session_start();
  $email = $_SESSION['department'];
  $name = $_SESSION['email'];
  $col = $_SESSION['college'];
  $output="";
  $query = "SELECT * FROM announcement WHERE department = '$email' AND email ='$name' AND college = '$col' ";
  $statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row){
    $output .= '
     <div class="p-2 bd-highlight  ">
    <div class="card" style="width: 50rem;">
    <div class="card-body">
    
        <h5 class="card-title">'.$row['name'].'</h5>
        <h6 class="card-subtitle mb-2 text-muted">'.$row['email'].'</h6>
        <p class="card-text">'.$row['announce'].'</p>
        <a href="#" class="card-link">'.$row['time'].'</a>
        <a href="../php/delete.php?id='.$row['id'].'" class="card-link">Delete</a>
    </div>
    </div>
' ;
  }
  
   echo $output;
?>



