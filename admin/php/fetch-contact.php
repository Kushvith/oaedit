<?php
include("../../config/pdoconfig.php");
$output = '
<table class="table">
<thead>
       <tr>
         <th scope="col" class="table-primary">Name</th>
         <th scope="col" class="table-primary">Email</th>
         <th scope="col" class="table-primary">Message</th>
         <th scope="col" class="table-primary">Time</th>
         <th scope="col" class="table-primary">Action</th>
       </tr>
     </thead>
     <tbody>
';
$sql = "SELECT * FROM contact order by id desc";
     $statement = $connection->prepare($sql);
     $statement->execute();
     $result = $statement->fetchAll();
     foreach($result as $row) {
        $output .= '      <tr>
        <td>'.$row['name'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['message'].'</td>
        <td>'.$row['time'].'</td>
        <td>
        <button class="btn btn-success btn-sm contact-reply" data-bs-toggle="modal" data-bs-target="#exampleModal" title="view"  data-id="'.$row['id'].'">Reply</button>    
        </td>
        </tr>
            </tbody>';
     }
     $output .=  '  </table>';
     echo $output;
?>