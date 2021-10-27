$(document).ready(function(){
    fetch_teacher_status();
    // interval = setInterval(fetch_teacher_status, 3000);
    function fetch_teacher_status() {
        $.ajax({
            url: "../php/fetch-teacher-status.php",
            method: "POST",
            success: function (data) {
                $(".teacher-status").html(data);

            }
        })
    }
 
    //   fetch ends

        $(document).on('click','.checking',function(){
            $('.feedback-modal-view').hide();
            $('.send-email').hide();
            $('.teacher-check').show();
            statid = $(this).data('statid');
            $.ajax({
                url: "../php/status-check.php",
                method: "POST",
                data:{id : statid},
                success: function (data) {
                    $(".teacher-check").html(data);
                }
            })
        })
    
    
})