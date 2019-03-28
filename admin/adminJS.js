$(document).ready(function () {
    $('#posts').click(function () {
        $('.slideMenu').slideToggle(500);
    });
});

$('#activate-newsletter').click(function () {
    $('#all-newsletters').toggle();
    $('#newsletter').slideToggle(500);
});