jQuery(document).ready(function($) {
    $('#formAddUser').submit(function(e) {
        e.preventDefault();
        if ($("#password").val() !== $("#confirmPassword").val()) {
            $("#password").addClass('error');
            $("#passwordConfirm").addClass('error');
            toastr.error('Error, both passwords must match!');
            return;
        }
        $('#submitUserBtn').prop('disabled', true);
        $('#submitUserBtn').addClass('disabled');
        $.post($(this).attr('action'), $(this).serialize(), function(response) {
            toastr.success('Successfully added user!');
            setTimeout(function() {
                window.location.href = '/users';
            }, 3000)
        }).fail(function(response) {
            toastr.error(response.responseJSON.message);
            $('#submitUserBtn').prop('disabled', false);
            $('#submitUserBtn').removeClass('disabled');
        });
        return false;
        return false;
    });
    return false;
});