<?php
    include('../../config/pdoconfig.php');
    $id = $_POST['id'];
    $sql = "SELECT * FROM feedback Where id = '$id'";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    if($result){
        foreach($result as $row){
            $token = $row['token'];
            $email = $row['email'];
            $depart = $row['course'];
            $centre = $row['centre'];
            $teacher = $row['teacher'];
            $one = $row['one'];
            $two = $row['two'];
            $three = $row['three'];
            $four = $row['four'];
            $five = $row['five'];
            $six = $row['six'];
            $seven = $row['seven'];
            $eight = $row['eight'];
            $nine = $row['nine'];
            $ten = $row['ten'];
            $eleven = $row['eleven'];
            $twelve = $row['twelve'];
            
            $output = '
            <div class="row">
            <div class="col-6">Token no</div>
            <div class="col-6">'.$token.'</div>
            <div class="dropdown-divider"></div>
            <div class="col-6">department</div>
            <div class="col-6">'.$depart.'</div>
            <div class="dropdown-divider"></div>
            <div class="col-6">centre</div>
            <div class="col-6">'.$centre.'</div>
            <div class="col-6">teacher</div>
            <div class="col-6">'.$teacher.'</div>
         </div>
         <div class="dropdown-divider"></div>
         <div class="row">
         <div class="col-8">Receive syllabus & instructions at first</div>
         <div class="col-4">'.$one.'</div>
         <div class="col-8">Course objectives stated clearly</div>
         <div class="col-4">'.$two.'</div>
         <div class="col-8">Material presented in class matches syllabus</div>
         <div class="col-4">'.$three.'</div>
         <div class="col-8">Instructor responded questions</div>
         <div class="col-4">'.$four.'</div>
         <div class="col-8">Instructor demonstrates adequate knowledge of course</div>
         <div class="col-4">'.$five.'</div>
         <div class="col-8">Instructor uses appropriate teaching methods</div>
         <div class="col-4">'.$six.'</div>
         <div class="col-8">Instructor returns papers & tests promptly</div>
         <div class="col-4">'.$seven.'</div>
         <div class="col-8">Class time is used efficient</div>
         <div class="col-4">'.$eight.'</div>
         <div class="col-8">Instructor is helpful</div>
         <div class="col-4">'.$nine.'</div>
         <div class="col-8">Instructor is well prepared</div>
         <div class="col-4">'.$ten.'</div>
         <div class="col-8">Instructors overall teaching</div>
         <div class="col-4">'.$eleven.'</div>
         <div class="col-8">Recommend the class</div>
         <div class="col-4">'.$twelve.'</div>
     </div>

        ';
       
        echo $output;
        }
        
    }
    else{
        echo 'nothing found';
    }
?>