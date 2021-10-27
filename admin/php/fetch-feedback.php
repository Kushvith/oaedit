<?php
    include("../../config/pdoconfig.php");
    $output = '
    <table class="table">
    <thead>
           <tr>
             <th scope="col" class="table-primary">Token no</th>
             <th scope="col" class="table-primary">Email</th>
             <th scope="col" class="table-primary">Department</th>
             <th scope="col" class="table-primary">College</th>
             <th scope="col" class="table-primary">Teacher</th>
             <th scope="col" class="table-primary">Time</th>
             <th scope="col" class="table-primary">Action</th>
           </tr>
         </thead>
         <tbody>
    ';
    $sql = "SELECT * FROM feedback order by id desc";
         $statement = $connection->prepare($sql);
         $statement->execute();
         $result = $statement->fetchAll();
         foreach($result as $row) {
            $output .= '      <tr>
            <td>'.$row['token'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['course'].'</td>
            <td>'.$row['centre'].'</td>
            <td> '.$row['teacher'].'</td>
            <td> '.$row['time'].'</td>
            <td>
            
            <div style="display:flex;">
            <button class="btn btn-success btn-sm feedback-view" data-bs-toggle="modal" data-bs-target="#exampleModal" title="view"  data-id="'.$row['id'].'">View</button>
            <button class="btn btn-danger btn-sm feedback-delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" data-id="'.$row['id'].'"><i class="fa fa-times" aria-hidden="true"></i></button></div>
            </td>
            </tr>
                </tbody>';
         }
         $output .=  '  </table>';
         echo $output;
?>