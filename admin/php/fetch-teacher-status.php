<?php
    include("../../config/pdoconfig.php");
    $output = '
    <table class="table">
    <thead>
           <tr>
             <th scope="col" class="table-primary">Name</th>
             <th scope="col" class="table-primary">Email</th>
             <th scope="col" class="table-primary">Department</th>
             <th scope="col" class="table-primary">College</th>
             
             <th scope="col" class="table-primary">Status</th>
           </tr>
         </thead>
         <tbody>
    ';
    $sql = "SELECT * FROM teacher_signin WHERE stat = 'verified' order by id desc";
         $statement = $connection->prepare($sql);
         $statement->execute();
         $result = $statement->fetchAll();
         foreach($result as $row) {
            $output .= '      <tr>
            <td>'.$row['name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['department'].'</td>
            <td> '.$row['college'].'</td>
            <td>
            <div class="p-2 bd-highlight"><button class="btn btn-success btn-sm checking" data-bs-toggle="modal" data-bs-target="#exampleModal" title="status"  data-statid="'.$row['id'].'">Check</button></div>
            </td>
            </tr>
                </tbody>';
         }
         $output .=  '  </table>';
         echo $output;
?>