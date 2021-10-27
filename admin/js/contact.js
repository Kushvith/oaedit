
$(document).ready(function(){
    fetch_contact();
    interval = setInterval(fetch_contact, 3000);
    function fetch_contact() {
 
        $.ajax({
            url: "../php/fetch-contact.php",
            method: "POST",
            success: function (data) {

                $(".fetch-contact").html(data);

            }
        })
    }
    // fetch ends
    $(document).on('click','.contact-reply',function(){
        $('.feedback-modal-view').hide();
        $('.teacher-check').show();
        $('.send-email').show();
        statid = $(this).data('id');
         $('#number').val(statid)
        
    })
    $(document).on('click','#send',function(){
        emailid = $('#number').val();
        emailtxt = $('#email-txt').val();
        if(emailtxt == ''){
            toastr.error("email text is required");
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
        }else{
            $(this).hide();
            $('#loading').show();
            $.ajax({
                url: "../php/email.php",
                method: "POST",
                data:{id : emailid,emailtxt},
                success: function (data) {
                    $('#loading').hide();
                    $('#send').show();
                    $('#email-txt').val('');
                    if(data == 'done'){
                        toastr.success("email sent");
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
                    else{
                        toastr.error("something went wrong");
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
                   
                    
                }
            })
        }
       
    })
})