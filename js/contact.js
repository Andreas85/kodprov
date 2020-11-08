$(document).ready(function(){

    function validate_email(email) {
        if( /(.+)@(.+){2,}\.(.+){2,}/.test(email) ){
            $('[data-email-error-div]').remove();
            $('[data-email]').removeClass('error-border');
            return true;
        } else {
            $('[data-email]').addClass('error-border');
            $('[data-email]').after('<div class="error-div" data-email-error-div>Invalid email</div>');
            return false;
        }
    }

    function validate_message(message) {
        if (message.length > 0) {
            $('[data-message-error-div]').remove();
            $('[data-message]').removeClass('error-border');
            return true;
        } else {
            $('[data-message]').addClass('error-border');
            $('[data-message]').after('<div class="error-div" data-message-error-div>Too short message</div>');
            return false;
        }
    }

    $('[data-email]').on('focusout', function() {
        validate_email($(this).val());
    });

    $('[data-message]').on('focusout', function() {
        validate_message($(this).val());
    });

    $('[data-contact-form]').on('submit', function(e) {
        var valid_email = validate_email($('[data-email]').val());
        var valid_message = validate_message($('[data-message]').val());

        if (!valid_email || !valid_message) {
            e.preventDefault();
        }
    });

});
