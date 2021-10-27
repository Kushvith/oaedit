<?php
    include("../../config/pdoconfig.php");
    $output = '<table class="table table-hover">
    <thead class="text-warning">
      <th>Name</th>
      <th>Email</th>
      <th>Department</th>
      <th>centre</th>
    </thead>';
    $sql = "SELECT * FROM signin WHERE action = 'block' order by id desc";
         $statement = $connection->prepare($sql);
         $statement->execute();
         $result = $statement->fetchAll();
         foreach($result as $row) {
            $output .= '      <tr>
            <td>'.$row['Name'].'</td>
            <td>'.$row['Email'].'</td>
            <td>'.$row['Department'].'</td>
            <td>'.$row['Centre'].'</td></tr>';
        }
        $output .= '</table>';
        echo $output;
?>