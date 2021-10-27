<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>     
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqBootstrapValidation/1.3.7/jqBootstrapValidation.min.js" integrity="sha512-JHVzEjx3zsh0SY+F9jc0VlW7VBXeDIJNXR0xcYySu1QLhf+Du8Zx9p28zP5MjIW7onsVy0qMsVls0YO6GTg2Aw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .container{
        top: 10px;

    }
    label{
        margin: 10px 300px;
    }
    input{
        margin: 10px 300px;
        
    }
    .top{
        border:5px solid orange;
        margin:auto 100px ;
    }
   
    </style>
    <title>Teacher Cred</title>
</head>
<body>
<div class="container">
 
  <div class="top">
  <center>ADD Teacher Accounts HERE</center>
    <form action="" id="upload_csv" method='post' enctype='mutipart/form-data'>
    <label for="">Select Csv file</label>
    <div class="col-md-4">
      <center> <input type="file" name="csv_file" id="csv_file" accept='.csv' class="form-control"></center>
    </div>
    <div class="col-md-5">
  <center>  <input type="submit" value="submit" id='upload' class='btn btn-info'></center>
    </div>
    </div>
    <div class="clear:both"></div>
    </form>
    <div id="csv_file_data"></div>
    </div>
</body>
<script>
   $(document).ready(function(){
       $('#upload_csv').on('submit',function(e){
           e.preventDefault();
           $.ajax({
               url:'./php/import_csv.php',
               method:'POST',
               data:new FormData(this),
               dataType:'json',
               contentType:false,
               cache:false,
               processData:false,
               success:function(data){
                   var html = '<table class="table table-striped table-bordered">';
                   if(data.column){
                      html += '<tr>';
                      for(var count=0;count< data.column.length; count++)
                      {
                        
                          html+='<th>'+data.column[count]+'</th>';
                          
                      }
                      html+='</tr>';
                   }
                   if(data.row_data){
                       
                        for(var count=0;count< data.row_data.length; count++)
                        {
                            html +='<tr>';
                            html +='<td class="name" contenteditable>'+data.row_data[count].name+'</td>';
                            html +='<td class="email" contenteditable>'+data.row_data[count].email+'</td>';
                            html +='<td class="department" contenteditable>'+data.row_data[count].department+'</td>';
                            html +='<td class="college" contenteditable>'+data.row_data[count].college+'</td></tr>';
                        }
                        
                   }
                   html +='</table>';
                   html+='<button id="import_data" class="btn btn-info">import</button>';
                   $('#csv_file_data').html(html);
                   $('#upload_csv')[0].reset();
               }
           })
       })
       $(document).on('click','#import_data',function(){
            var name = [];
            var email = [];
            var department = [];
            var college = [];
            $('.name').each(function(){
                name.push($(this).text());
            })
            $('.email').each(function(){
                email.push($(this).text());
            })
            $('.department').each(function(){
                department.push($(this).text());
            })
            $('.college').each(function(){
                college.push($(this).text());
            })
            $.ajax({
                url:'./php/fetch_csv.php',
                method:'POST',
                data:{name,email,department,college},
                success:function(data){
                    if(data == 'done'){
                    $('#csv_file_data').html('<div class=alert alert-primary>imported successfully</div>');
                    }
                    else{
                        $('#csv_file_data').html(data);
                    }
                }
            })
       })
   })
</script>
</html>