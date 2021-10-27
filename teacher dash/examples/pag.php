<?php
     include("../../config/pdoconfig.php");
     
     $limit = 5;
   
    //  
     if(isset($_GET['page'])){
         $page = $_GET['page'];
        echo "working";
     }
     else{
         $page =1;
     }
     $start_from=(($page-1)*5);
     $sql = "SELECT * FROM signin LIMIT $start_from,$limit";
     echo $sql;
     $statement = $connection->prepare($sql);
     echo "working";
     $statement->execute();
     $result = $statement->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pag</title>
</head>
<body>
    <table border="1px" align="center">
         <tr>
         <th>name</th>
         <th>email</th>
         <th>center</th>
         <th>dep</th>
         </tr>
       <?php
       foreach($result as $row)
       {
           ?>
           <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo  $row['Email']; ?></td>
              <td><?php echo  $row['Name']; ?></td>
              <td><?php echo $row['id']; ?></td>
          </tr>
          
           <?php
       }
       
       ?>
    </table>

    <?php
        $sql = "SELECT * FROM signin";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $total_rows = $statement->rowCount();
        $total_pages = ceil($total_rows/$limit);
        echo $total_pages;
        for($i=1; $i<=$total_pages;$i++)
        {
            echo "<a href='pag.php?page=".$i."'>".$i."</a>";
        }
    ?>
</body>
</html>