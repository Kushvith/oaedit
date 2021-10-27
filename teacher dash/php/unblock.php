<?php
   include("../../config/pdoconfig.php");
   $block = 'block';
   $sql = "SELECT * FROM signin WHERE action = 'block'";
   $statement = $connection->prepare($sql);
   $statement->execute();
   $result = $statement->fetchAll();

   $output = '
<table class="table">
<thead>
       <tr>
       <th scope="col" class="table-info">Student Id</th>
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
  
   $output .= '
   <th scope="row">'.$row['TokenNumber'].'</th>
   <th scope="row">'.$row['Name'].'</th>
   <th scope="row">'.$row['Email'].'</th>
   <th scope="row">'.$row['BatchYear'].'</th>
   <th scope="row">'.$row['Department'].'</th>
   <th scope="row"><a href="../php/unblocks.php?id='.$row['id'].'"><button class="btn btn-primary">UnBlock</button></a></th>
   </tr>
</tbody>';
}

$output .=  '  </table>';
echo $output;
?>