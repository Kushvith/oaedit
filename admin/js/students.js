$(document).ready(function(){
    load_data(1);

       

    function load_data(page, query = '')
    {
      $.ajax({
        url:"../php/fetch-student.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('.fetch-students').html(data);
        }
      });
    }
    $(document).on('click', '.page-link', function(){
        var page = $(this).data('page_number');
        var query = $('#search_box').val();
        load_data(page, query);
      });
  
      $('#search_student').keyup(function(){
        var query = $('#search_student').val();
        load_data(1, query);
      });
      block();
      function block(){
           $(document).on('click','.teacher-block',function(){
               id = $(this).data('id');
               $.ajax({
                url:"../php/student-block.php",
                method:"POST",
                data:{id},
                success:function(data)
                {
                    load_data(1);
                   toastr.success("User blocked");
                   toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
                }
              });
              });  
      }
      unblock();
      function unblock(){
           $(document).on('click','.teacher-unblock',function(){
               id = $(this).data('id');
               $.ajax({
                url:"../php/student-unblock.php",
                method:"POST",
                data:{id},
                success:function(data)
                {
                    load_data(1);
                   toastr.success("User Unblocked");
                   toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
                }
              });
              });  
      }
      student_delete()
      function student_delete(){
        $(document).on('click','.stuedent-delete',function(){
          id = $(this).data('id');
          $.ajax({
            url:"../php/student-delete.php",
            method:"POST",
            data:{id},
            success:function(data)
            {
              load_data(1);
              toastr.success("Student removed");
                     toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
            }
          });
        });
       
      }
});