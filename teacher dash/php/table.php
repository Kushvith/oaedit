<?php

   include("../../config/pdoconfig.php");
   session_start();
   $id = $_SESSION['id'];

   $output = '
     <table class="table">
     <thead>
            <tr>
            <th scope="col" class="table-dark">Email</th>
              <th scope="col" class="table-primary">File_name</th>
              <th scope="col" class="table-primary">Subject</th>
              
              <th scope="col" class="table-primary">Time</th>
              <th scope="col" class="table-primary">semester</th>
              <th scope="col" class="table-primary">view</th>
              <th scope="col" class="table-primary">Marks</th>
              <th scope="col" class="table-primary">Action</th>
            </tr>
          </thead>
          <tbody>
     ';
     $name = $_SESSION['name'];
     $pending = "pending";
     $col =$_SESSION['college'];
         $sql = "SELECT * FROM hw where teachername = '$name'AND college = '$col' AND verification = '$pending' ORDER BY time asc";
         $statement = $connection->prepare($sql);
         $statement->execute();
         $result = $statement->fetchAll();
         foreach($result as $row) {
          $output .= '
          <th scope="row">'.$row['name'].'</th>
          <th scope="row">'.$row['file_name'].'</th>
          <th scope="row">'.$row['subject'].'</th>
          
          <th scope="row">'.$row['time'].'</th>
          <th scope="row">'.$row['semester'].'</th>
          <th scope="row"><a href="../../student dash/uploads/'.$row['address'].'" target="_blank">view</a></th>
          <th scope="row" width="10px"><button type="button"  class="btn btn-sm btn-primary start_chat"  data-tousername="'.$row['name'].'" data-filename="'.$row['id'].'"  data-toggle="modal" data-target="#myModal">ADD MARKS</button></th>
          
          <th scope="row"><a href="../php/reject.php?id='.$row['id'].'" target="_blank"><img src="../assets/img/remove.png" width ="25px"alter="remove"/></th>

          </tr>
      </tbody>';
      }
      // echo $output;     
 $output .=  '  </table>';
        
         echo $output;
?>