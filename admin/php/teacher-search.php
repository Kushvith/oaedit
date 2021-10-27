<?php
include("../../config/cofig.php");
  session_start();
$output = "";
$sql = "SELECT * FROM teacher_signin WHERE (name  LIKE '%".$_POST['search']."%') or (email  LIKE '%".$_POST['search']."%') or (department  LIKE '%".$_POST['search']."%')or(college  LIKE '%".$_POST['search']."%')";
$result = mysqli_query($connection,$sql);
if(mysqli_num_rows($result) > 0 ){
      $output .= "<h4 align='center'>Search Results</h4>";
      $output .= '
      <table class="table">
      <thead>
             <tr>
               <th scope="col" class="table-primary">Name</th>
               <th scope="col" class="table-primary">Email</th>
               <th scope="col" class="table-primary">Department</th>
               <th scope="col" class="table-primary">College</th>
               <th scope="col" class="table-primary">Action</th>
             </tr>
           </thead>
           <tbody>
      ';

      while($row = mysqli_fetch_array($result))
      {
        $output .= '      <tr>
            <td>'.$row['name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['department'].'</td>
            <td> '.$row['college'].'</td>
            <td>
            <div class="p-2 bd-highlight"><button class="btn btn-danger btn-sm delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" data-id="'.$row['id'].'"><i class="fa fa-times" aria-hidden="true"></i></button></div>
            </td>
            </tr>
                </tbody>';
    }
    // echo $output;     
$output .=  '  </table>';
echo $output;
      
}else{
    echo "Nothing found";
}

?>