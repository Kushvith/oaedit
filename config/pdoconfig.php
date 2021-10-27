<?php
$connection = new PDO("mysql:host=localhost;dbname=logiin", "root", "");

if (!$connection) {
  echo " unable connect to data base";
}

date_default_timezone_set('Asia/Kolkata');
function fetch_status($name, $connection)
{

  $query = "SELECT * FROM signin 
    WHERE name = '$name'
    ORDER BY STATUS DESC
    LIMIT 1";
  $statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $rows) {
    return $rows['STATUS'];
  }
}
function fetch_chat_history($from_user_id, $to_user_id, $connection)
{
  $query = "
 SELECT * FROM chat_message 
 WHERE (from_user_id = '" . $from_user_id . "' 
 AND to_user_id = '" . $to_user_id . "') 
 OR (from_user_id = '" . $to_user_id . "' 
 AND to_user_id = '" . $from_user_id . "') 
 ORDER BY timestamp DESC
 ";
  $statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '<ul class="list-unstyled">';
  foreach ($result as $row) {
    $user_name = '';
    if ($row["from_user_id"] == $from_user_id) {
      $user_name = '<b class="text-success">You</b>';
    } else {
      $user_name = '<b class="text-danger">' . get_user_name($row['from_user_id'], $connection) . '</b>';
    }
    $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>' . $user_name . ' - ' . $row["chat_message"] . '
    <div align="right">
     - <small><em>' . $row['timestamp'] . '</em></small>
    </div>
   </p>
  </li>
  ';
  }
  $output .= '</ul>';
  $query = "
 UPDATE chat_message 
 SET status = '0' 
 WHERE from_user_id = '" . $to_user_id . "' 
 AND to_user_id = '" . $from_user_id . "' 
 AND status = '1'
 ";
  $statement = $connection->prepare($query);
  $statement->execute();
  return $output;
}

function get_user_name($user_id, $connection)
{
  $query = "SELECT Name FROM signin WHERE id = '$user_id'";
  $statement = $connection->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    return $row['Name'];
  }
}

function count_unseen_message($from_user_id, $to_user_id, $connection)
{
  $query = "
 SELECT * FROM chat_message 
 WHERE from_user_id = '$from_user_id' 
 AND to_user_id = '$to_user_id' 
 AND status = '1'
 ";
  $statement = $connection->prepare($query);
  $statement->execute();
  $count = $statement->rowCount();
  $output = '';
  if ($count > 0) {
    $output = '<span class="label label-success">' . $count . '</span>';
  }
  return $output;
}
?>
