$(document).ready(function () {
    fetch_teacher();
    interval = setInterval(fetch_teacher, 3000);
    function fetch_teacher() {
        $.ajax({
            url: "../php/fetch-teacher.php",
            method: "POST",
            success: function (data) {
                $(".fetch-teachers").html(data);

            }
        })
    }
    //   fetch ends
    teacher_search();
    function teacher_search() {
        $('#search_teacher').keyup(function () {
            var txt = $(this).val();
            if (txt = "") {
                interval = setInterval(fetch_teacher, 1000);
            }
            else {
                clearInterval(interval);
                $(".fetch-teachers").html('');
                var txt = $(this).val();

                $.ajax({
                    url: "../php/teacher-search.php",
                    method: "POST",
                    data: { search: txt },
                    dataType: "text",
                    success: function (data) {
                        $(".fetch-teachers").html(data);
                    }
                })
            }

        });
    }
    delet();
    function delet(){
        $(document).on('click','.teacher-delete',function(){
            id = $(this).data('id');
            $.ajax({
                url:"../php/teacher-delete.php",
                method:"POST",
                data:{id},
                success: function(data){
                    toastr.success("Teacher account deleted");

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
            })
        })
    }
})
