//onload
$(document).ready(function(){
    //set scroll position
    $('.mainContent').scrollTop(60);
    if(($(document).width())<768){
        resize();
    }else{
        $(".footer-content").css("display","block");
    }
});

//on resize

$(window).resize(function(){
    if (($(this).width())<768) {
       resize();
    }else{
        removeCaret();
    }
});

function resize() {
    $(".footer-content").hide();

    var about_us = $("#info_company").html();
    $("#info_company").html(about_us);
    $("#info_company").append('<i class="fa fa-caret-down"></i>');

    var contact_info = $("#our_contact").html();
    $("#our_contact").html(contact_info);
    $("#our_contact").append('<i class="fa fa-caret-down"></i>');

    var quick_links = $("#links").html();
    $("#links").html(quick_links);
    $("#links").append('<i class="fa fa-caret-down"></i>');

    var Available_jobs = $("#jobs_available").html();
    $("#jobs_available").html(Available_jobs);
    $("#jobs_available").append('<i class="fa fa-caret-down"></i>');

    //call show functions
        $("#our_contact").click(function(){
            if(($(document).width())<768) {
                $(".footer-content-contact").slideToggle(300);
            }
        });

        $("#info_company").click(function(){
            if(($(document).width())<768) {
                $(".footer-content-about").slideToggle(300);
            }
        });

        $("#links").click(function() {
            if(($(document).width())<768) {
                $(".footer-content-links").slideToggle(300);
            }
        });
}

function removeCaret() {
    $('.footer-content').show();
    $('#links i').removeClass('fa-caret-down');
    $('#info_company i').removeClass('fa-caret-down');
    $('#our_contact i').removeClass('fa-caret-down');
}