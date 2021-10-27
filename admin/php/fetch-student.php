<?php
    include("../../config/pdoconfig.php");
    $limit = '5';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}
$query = "
SELECT * FROM  signin
";
if($_POST['query'] != '')
{
  $query .= '
  WHERE TokenNumber LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  ';
}

$query .= 'ORDER BY id ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connection->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connection->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();


    $output = '
    <label>Total Records - '.$total_data.'</label>
    <table class="table">
    <thead>
           <tr>
             <th scope="col" class="table-primary">Name</th>
             <th scope="col" class="table-primary">Email</th>
             <th scope="col" class="table-primary">Token no</th>
             <th scope="col" class="table-primary">Department</th>
             <th scope="col" class="table-primary">College</th>
             
             <th scope="col" class="table-primary">Action</th>
           </tr>
         </thead>
         <tbody>
    ';
    if($total_data > 0)
{
  
         foreach($result as $row) {
             if($row['action'] == ""){
               $stat = "block";
               $class = 'btn btn-success btn-sm teacher-block';
             }
             else{
                 $stat = "unblock";
                 $class = 'btn btn-primary btn-sm teacher-unblock';
             }
            $output .= '      <tr>
            <td>'.$row['Name'].'</td>
            <td>'.$row['Email'].'</td>
            <td>'.$row['TokenNumber'].'</td>
            <td>'.$row['Department'].'</td>
            <td> '.$row['Centre'].'</td>
            <td>
            <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight"><button class="'.$class.'" data-bs-toggle="tooltip" data-bs-placement="bottom" title="block" data-id="'.$row['id'].'" data-stat="'.$stat.'">'.$stat.'</button></div>
            <div class="p-2 bd-highlight"><button class="btn btn-danger btn-sm stuedent-delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" data-id="'.$row['id'].'"><i class="fa fa-times" aria-hidden="true"></i></button></div>
            </div>
            </td>
            </tr>
                </tbody>';
         }
        }
        else
            {
              $output .= '
              <tr>
                <td colspan="2" align="center">No Data Found</td>
              </tr>
              ';
            }
            $output .= '
            </table>
            <br />
            <div align="center">
              <ul class="pagination">
            ';
            $total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

// echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';
         echo $output;
?>