jQuery(document).ready(function($) {
    // CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Add category ajax form
    $('#formAddCategory').submit(function(e) {
        e.preventDefault();
        $('#submitCategoryBtn').prop('disabled', true);
        $('#submitCategoryBtn').addClass('disabled');
        $.post($(this).attr('action'), $(this).serialize(), function(response) {
            toastr.success('Successfully added category!');
            setTimeout(function() {
                window.location.href = '/categories';
            }, 3000)
        }).fail(function(response) {
            console.log(response);
            $('#submitCategoryBtn').props('disabled', false);
            $('#submitCategoryBtn').removeClass('disabled');
        });
        return false;
    });
});