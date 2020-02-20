jQuery(function($) {

    $('.myForm').submit(function(e) {
        
        var first_name = $('.firstname').val();
        var last_name = $('.lastname').val();
        var email = $('.mail').val();
        var nameCheck = /^[a-zA-Z '-]+$/;
        var emailCheck = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        var subject = $('.subject').val();
        
        var detectErrors = false;

        var validFirstName = nameCheck.test(first_name);
        if(!validFirstName) {
            $('.error_msg1').html('Enter a valid first name.');
            
            detectErrors = true;
            
        }

        var validLastName = nameCheck.test(last_name);
        if(!validLastName) {
            $('.error_msg2').html('Enter a valid last name.');
            detectErrors = true;
        }
        
        var validEmail = emailCheck.test(email);
        if(!validEmail) {
            $('.error_msg3').html('Enter a valid email.');
            detectErrors = true;
        }

        if(subject == "") {
            $('.error_msg4').html('Enter a subject.');
        }        

        //If there are errors, do not submit form.
        if (detectErrors == true) {
            $('.error_msg6').html('**Failed to submit. Please check the form.');
            return false;
        } else {
            return true;
        }
    
    });

});

