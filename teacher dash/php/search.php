<?php
include("../../config/cofig.php");
  session_start();
$output = "";
$pending = 'rejected';
$sql = "SELECT * FROM hw WHERE (teachername LIKE '%".$_SESSION['name']."%' and verification LIKE '%".$pending."%' and 	file_name  LIKE '%".$_POST['search']."%') or (teachername LIKE '%".$_SESSION['name']."%' and verification LIKE '%".$pending."%' and 	subject  LIKE '%".$_POST['search']."%') or (teachername LIKE '%".$_SESSION['name']."%' and verification LIKE '%".$pending."%' and 	name  LIKE '%".$_POST['search']."%')or(teachername LIKE '%".$_SESSION['name']."%' and verification LIKE '%".$pending."%' and 	verification  LIKE '%".$_POST['search']."%') or (teachername LIKE '%".$_SESSION['name']."%' and verification LIKE '%".$pending."%' and 	marks  LIKE '%".$_POST['search']."%') or (teachername LIKE '%".$_SESSION['name']."%' and verification LIKE '%".$pending."%' and 	time  LIKE '%".$_POST['search']."%')
OR (teachername LIKE '%".$_SESSION['name']."%' and verification LIKE '%".$pending."%' and 	semester  LIKE '%".$_POST['search']."%')";
$result = mysqli_query($connection,$sql);
if(mysqli_num_rows($result) > 0 ){
      $output .= "<h4 align='center'>Search Results</h4>";
      $output = '
      <table class="table">
      <thead>
             <tr>
               <th scope="col" class="table-dark">File_name</th>
               <th scope="col" class="table-primary">Subject</th>
               <th scope="col" class="table-primary">Name</th>
               <th scope="col" class="table-primary">Time</th>
               <th scope="col" class="table-primary">semester</th>
               <th scope="col" class="table-primary">view</th>
               <th scope="col" class="table-primary">Marks</th>
               
             </tr>
           </thead>
           <tbody>
      ';
      

      while($row = mysqli_fetch_array($result))
      {
    

    
        $output .= '
        <th scope="row">'.$row['file_name'].'</th>
        <th scope="row">'.$row['subject'].'</th>
        <th scope="row">'.$row['name'].'</th>
        <th scope="row">'.$row['time'].'</th>
        <th scope="row">'.$row['semester'].'</th>
        <th scope="row"><a href="../../student dash/uploads/'.$row['address'].'">view</a></th>
        <th scope="row" width="10px"><button type="button"  class="btn btn-sm btn-primary start_chat"  data-tousername="'.$row['name'].'" data-filename="'.$row['id'].'" data-marks="'.$row['marks'].'"  data-toggle="modal" data-target="#myModal">Edit Marks</button></th>
        
        

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