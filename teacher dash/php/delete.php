<?php
     include("../../config/pdoconfig.php");
     $sql = "DELETE FROM announcement WHERE id = ".$_GET['id']."";
     $statement = $connection->prepare($sql);
     $statement->execute();
     header("location:../examples/announce.php");
?>