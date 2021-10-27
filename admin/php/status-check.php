<?php
    include('../../config/pdoconfig.php');
    $id = $_POST['id'];
    $sql = "SELECT * FROM teacher_signin WHERE id = '$id'";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row){
        $name = $row['name'];
        $email = $row['email'];
    }
    $query = "SELECT * FROM hw WHERE 	teachername = '$name'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    if($results){
        $pending= "pending";
    $appr = "approved";
    $rejected = "rejected";
    $query1 = "SELECT * FROM hw WHERE verification = '$pending' AND teachername='$name'";
    $statement = $connection->prepare($query1);
    $statement->execute();
    $pendin = $statement->rowCount();
    
    $query1 = "SELECT * FROM hw WHERE verification = '$appr' AND teachername='$name'";
    $statement = $connection->prepare($query1);
    $statement->execute();
    $appr = $statement->rowCount();
    
    $query1 = "SELECT * FROM hw WHERE verification = '$rejected' AND teachername='$name'";
    $statement = $connection->prepare($query1);
    $statement->execute();
    $rej = $statement->rowCount();
    $total = $pendin+$appr+$rej;
    $sum = $appr+$rej;
    if($sum > 0){
    $per = ceil(($sum/$total)*100);
    }
    else{
      $per = 0;
    } 
        $output = '
        <div class="row">
        <div class="col-8">NAME</div>
        <div class="col-4">'.$name.'</div>  
        </div>
        <div class="dropdown-divider"></div>
        <div class="row"><div class="col-12"> See your  progression</div></div>
        <div class="dropdown-divider"></div>
        <div class="row">
        <div class="col-8">Pending Assignment</div>
        <div class="col-4">'.$pendin.'</div>  
        </div>
        <div class="row">
        <div class="col-8">Approved Assignment</div>
        <div class="col-4">'.$appr.'</div>  
        </div>
        <div class="row">
        <div class="col-8">Rejected Assignment</div>
        <div class="col-4">'.$rej.'</div>  
        </div>
        <div class="dropdown-divider"></div>
        <div class="row">
        <div class="col-6">Progression</div>
        <div class="col-6">'.$per.'</div>  
        </div>
        ';
        
        echo $output;
    }
    else{
        $output = '
        <div class="row">
        <div class="col-8">NAME</div>
        <div class="col-4">'.$name.'</div>  
        </div>
        <div class="dropdown-divider"></div>
        <div class="row"><div class="col-12"> See your  progression</div></div>
        <div class="dropdown-divider"></div>
        <div class="row"><div class="col-12">There is no assignment uploaded</div></div>
        <div class="dropdown-divider"></div>
        <div class="row">
        <div class="col-6">Progression</div>
        <div class="col-6">0</div>  
        </div>
        ';
    }