$(document).ready(function(){
    dsh_contact();
    dsh_students();
    dsh_teachers();
    dsh_feedback();
    dsh_tab_feed();
    dsh_tab_block();
    setInterval(() => {
        dsh_contact();
        dsh_students();
        dsh_teachers();
        dsh_feedback();
        dsh_tab_feed();
        dsh_tab_block(); 
    }, 2000);
    function dsh_students(){
        $.ajax({
            url:'../php/count-students.php',
            method:'post',
            success:function(data){
                $('#stud').html(data);
            }
        })
    }
    function dsh_teachers(){
        $.ajax({
            url:'../php/count-teachers.php',
            method:'post',
            success:function(data){
                $('#teach').html(data);
            }
        })
    }
    function dsh_feedback(){
        $.ajax({
            url:'../php/count-feedback.php',
            method:'post',
            success:function(data){
                $('#feed').html(data);
            }
        })
    }
    function dsh_contact(){
        $.ajax({
            url:'../php/count-contact.php',
            method:'post',
            success:function(data){
                $('#cont').html(data);
            }
        })
    }
    function dsh_tab_block(){
        $.ajax({
            url:'../php/tab-block.php',
            method:'post',
            success:function(data){
                $('#body-block').html(data);
            }
        })
    }
    function dsh_tab_feed(){
        $.ajax({
            url:'../php/tab-feed.php',
            method:'post',
            success:function(data){
                $('#body-feed').html(data);
            }
        })
    }
})