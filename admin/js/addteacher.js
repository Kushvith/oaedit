const file = document.querySelector('#file');
file.addEventListener('change', (e) => {
  // Get the selected file
  const [file] = e.target.files;
  // Get the file name and size
  const { name: fileName, size } = file;
  // Convert size in bytes to kilo bytes
  const fileSize = (size / 1000).toFixed(2);
  // Set the text content
  const fileNameAndSize = `${fileName} - ${fileSize}KB`;
  document.querySelector('.file-name').textContent = fileNameAndSize;
});
$(document).ready(function(){

    $('#upload_csv').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url:'../php/import_csv.php',
            method:'POST',
            data:new FormData(this),
            dataType:'json',
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                alert(data)
                var html = '<table class="table table-bordered">';
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
             url:'../php/fetch_csv.php',
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