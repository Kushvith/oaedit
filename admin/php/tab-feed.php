<?php
    include("../../config/pdoconfig.php");
    $output = '<table class="table table-hover">
    <thead class="text-warning">
      <th>Name</th>
      <th>email</th>
      <th>Teacher</th>
      <th>centre</th>
    </thead>';
    $sql = "SELECT * FROM feedback order by id desc";
         $statement = $connection->prepare($sql);
         $statement->execute();
         $result = $statement->fetchAll();
         foreach($result as $row) {
            $output .= '      <tr>
            <td>'.$row['token'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['teacher'].'</td>
            <td>'.$row['centre'].'</td></tr>';
        }
        $output .= '</table>';
        echo $output;
?>