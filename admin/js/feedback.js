$(document).ready(function(){
    fetch_feedback();
    interval = setInterval(fetch_feedback, 3000);
    function fetch_feedback() {
        $.ajax({
            url: "../php/fetch-feedback.php",
            method: "POST",
            success: function (data) {
                $(".fetch-feedback").html(data);

            }
        })
    }
    // fetch ends
 
        
        $(document).on('click','.feedback-view',function(){
            $('.teacher-check').hide();
            $('.send-email').hide();
     $('.feedback-modal-view').show();
            id = $(this).data('id');
            $.ajax({
                url: "../php/view-feedback.php",
                method: "POST",
                data:{id},
                success: function (data) {
                    $(".feedback-modal-view").html(data);
    
                }
            })
        })

    feedback_delete();
    function feedback_delete(){
        $(document).on('click','.feedback-delete',function(){
            id = $(this).data('id');
            $.ajax({
                url: "../php/delete-feedback.php",
                method: "POST",
                data:{id},
                success: function (data) {
                    toastr.success("feedback deleted");

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