jQuery(document).ready(function($) {
    // Add item
    $('#formAddItem').submit(function(e) {
        e.preventDefault();
        $('#submitItemBtn').prop('disabled', true);
        $('#submitItemBtn').addClass('disabled');
        $.post($(this).attr('action'), $(this).serialize(), function(response) {
            toastr.success('Successfully added item!');
            setTimeout(function() {
                window.location.href = '/items';
            }, 3000)
        }).fail(function(response) {
            toastr.error(response.responseJSON.message);
            $('#submitItemBtn').prop('disabled', false);
            $('#submitItemBtn').removeClass('disabled');
        });
        return false;
    });

    // Search
    $("#search").keyup(function() {
        var searchValue = $(this).val().toUpperCase();
        $('#itemsTable tbody tr').show();
        $('#itemsTable tbody tr').each(function() {
            var foundValue = false;
            $(this).find('td.searchable').each(function() {
                if (foundValue) return;
                if ($(this).html().toUpperCase().indexOf(searchValue) >= 0) {
                    foundValue = true;
                }
            });
            if (foundValue) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});