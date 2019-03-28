

$(document).ready(function () {
   $(window).scroll(function () {
       var pos=$(this).scrollTop();
       $('#mainNav').css({
           'z-index': '1',
           'transform' : 'translate(0px,'+pos+'px)'
       });
       $('#myCarousel').css({
           'transform' : 'translate(0px,'+pos/1.2+'px)'
       });
       if (pos===0){
           $('#myCarousel').css({
               'position' : 'relative'
           });
       }
   });
});

var input,feedback;
function validate(input,feedback) {
    var str=$('#'+input+'').val();
    /*
    if (input === 'id'){
        var checkType=/[^0-9]+/g;
        var findNumber= checkType.test(str);
        if (findNumber){
            warningIndicator(input);
            ('#'+input+'-err').text('ID should contain numbers only');
        }
        else {
            removeWarningIndicator(input)
        }
    }
    */
    if (input === 'gender') {
        if (str === 'other') {
            warningIndicator(input);
            $('#'+input+'-err').text('');
        }
        else {
            removeWarningIndicator(input,str);
        }
    }
    // if (input==='fname' || input==='sname' || input==='surname'){
    if (input==='fname'){
        var regex=/[^a-z\s]+/gi;
        var flag=regex.test(str);
        if(flag){
            warningIndicator(input);
            $('#'+input+'-err').text(' Name should contain letters only');
            return false;
        }
        else
        {
            removeWarningIndicator(input,str);
        }
    }
    else if (input==='email'){
        flag=str.indexOf('.');
        var atposition=str.indexOf('@');
        if (flag===-1 && atposition===-1) {
            warningIndicator(input);
            $('#'+input+'-err').text(' invalid email address');

        }
        else {
            removeWarningIndicator(input,str);
        }
    }
    else if (input==='password') {
        length=str.length;
        $('#confirm-err').text('');
        confirmVal=$('#confirm').val();
        if (confirmVal !== str){
            warningIndicator('confirm');
            $('#confirm-err').text('passwords do not match');
        }
        else {
            removeWarningIndicator('confirm','ignore4Pass');
        }
        removeWarningIndicator(input,'ignore4Pass');

    }
    else if (input==='confirm'){
        var password=$('#password').val();
            if (str !== password){
                warningIndicator(input);
                $('#'+input+'-err').text('Passwords do not match');
            }
            else {
                removeWarningIndicator(input,'ignore4Pass');
            }

    }


}
function warningIndicator(input){
    $('#'+input+'-err').show();
    $('#'+input+'').css('border','1px solid red');
    $('#'+input+'-err').css('color','red');
}

function removeWarningIndicator(input,str) {
    $('#'+input+'').css('border','1px solid lightgrey');
    $('#'+input+'-err').hide();
    if (str !== 'ignore4Pass') {
        $('#'+input+'').val(str.toUpperCase());
    }
}

/**
 * ############################ENROLL.PHP ########################
 * @returns {boolean}
 */
    $('#enroll-form').submit(function (e) {
        //prevent form from submitting
        terms=$('#terms').prop('checked');
        $('.empty-fields').html('<em>The inputs with a red border must be filled</em>');
        if (terms === true) {
            // id = $('#id').val();
            fname = $('#fname').val();
            // surname = $('#surname').val();
            email = $('#email').val();
            /*
            if (id === '' || id == null) {
                $('#id').css('border', '1px solid red');
                $('.empty-fields').show();
                e.preventDefault();
            }
            else {
                var checkType = /[^0-9]+/g;
                var findNumber = checkType.test(id);
                if (findNumber) {
                    warningIndicator('id');
                    ('#' + input + '-err').text('ID should contain numbers only');
                    e.preventDefault();
                }
            }
            */
            if ((fname === '' || fname === null)) {
                $('#sfname').css('border', '1px solid red');
                $('.empty-fields').show();
                e.preventDefault();
            }
            else {
                status = validate('fname', 'fname-err');
                if (status === false) {
                    warningIndicator('fname', 'fname-err');
                    $('#fname-err').text('name should contain letters only');
                    e.preventDefault();
                }
            }
           /* if (surname === '' || surname === null) {
                $('#surname').css('border', '1px solid red');
                $('.empty-fields').show();
                e.preventDefault();
            }
            */
            if (email === '' || email === null) {
                $('#email').css('border', '1px solid red');
                $('.empty-fields').show();
                e.preventDefault();
            }
        }
        else {
            $('.terms').css({
                'border':'1px solid #ff4d4d',
                'border-radius': '5px'
            });
            e.preventDefault();
        }

    });

    /* ####################3 index.php #####*/
    $("#trigger-who-we-are").click(function(e){
        e.preventDefault();
        $("#team").hide();
        $("#who-we-are").slideToggle(800);
    });

    $("#trigger-team").click(function(e){
        e.preventDefault();
        $("#who-we-are").hide();
        $("#team").slideToggle(800);
        
    });


    