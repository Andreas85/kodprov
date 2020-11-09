$(document).ready(function(){
    $('[data-menu-link]').on('click', function(e){
        e.preventDefault();

        switch ($(this).data('menu-link')) {
            case 'home':
                $('[data-home-container]').show();
                $('[data-messages-container]').hide();
                $('[data-contact-container]').hide();
                history.pushState('home', null, null);
                break;

            case 'messages':
                $('[data-home-container]').hide();
                $('[data-messages-container]').show();
                $('[data-contact-container]').hide();
                history.pushState('messages', null, null);
                break;

            case 'contact':
                $('[data-home-container]').hide();
                $('[data-messages-container]').hide();
                $('[data-contact-container]').show();
                history.pushState('contact', null, null);
                break;

            default:
                $('[data-home-container]').show();
                $('[data-messages-container]').hide();
                $('[data-contact-container]').hide();
        }
    });

    function populate_messages() {
        $('[data-messages-container]').html('');

        var messages = JSON.parse(localStorage.getItem('messages'));
        
        var message_row_template = '';

        if (messages !== null && messages.length !== 0) {
            console.log('not null');
            for (var a=0; a<messages.length; a++) {
                message_row_template = $('[data-message-row-template]').html();
                message_row_template = message_row_template.replace("$", messages[a][0]);
                message_row_template = message_row_template.replace("$", messages[a][1]);
                message_row_template = message_row_template.replace("$", a);

                $('[data-messages-container]').append(message_row_template);
            }
        } else {
            $('[data-messages-container]').append($('[data-no-messages-template]').html());
        }
    }

    $('body').on('click', '[data-delete-message]', function(e) {
        e.preventDefault();

        if (confirm('Are you sure you want to delete this message?')) {
            var messages = JSON.parse(localStorage.getItem('messages'));
            var id = $(this).data('delete-message');

            messages.splice(id, 1);
            localStorage.setItem('messages', JSON.stringify(messages));

            populate_messages();
        }
    });

    populate_messages();

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
        e.preventDefault();

        var valid_email = validate_email($('[data-email]').val());
        var valid_message = validate_message($('[data-message]').val());

        if (!valid_email || !valid_message) {
            return false;
        }

        var email = $('[data-email]').val();
        var message = $('[data-message]').val();

        var messages = localStorage.getItem('messages');

        if (messages == null) {
            messages = [[email, message]];
        } else {
            messages = JSON.parse(messages);
            messages.push([email, message]);
        }

        localStorage.setItem('messages', JSON.stringify(messages));
        populate_messages();

        $('[data-email]').val('');
        $('[data-message]').val('');

        $('[data-message-sent-confirmation]').show();
        setTimeout(function(){ $('[data-message-sent-confirmation]').hide() }, 3000);
    });
});
