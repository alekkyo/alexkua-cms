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
            toastr.error(response.responseText);
            $('#submitCategoryBtn').prop('disabled', false);
            $('#submitCategoryBtn').removeClass('disabled');
        });
        return false;
    });

    // Search
    $("#search").keyup(function() {
        var searchValue = $(this).val().toUpperCase();
        $('#categoriesTable tbody tr').show();
        $('#categoriesTable tbody tr').each(function() {
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

    // Move up
    var btnClicked = false;
    $('#categoriesTable .moveOrderUpBtn').click(function() {
        if (btnClicked) {
            return;
        }
        btnClicked = true;
        $.post('/api/categories/' + $(this).closest('tr').attr('data-id') + '/order-up', function() {
            window.location.reload();
            btnClicked = false;
        }).fail(function(response) {
            toastr.error(response.responseText);
            btnClicked = false;
        });
    });

    // Move down
    $('#categoriesTable .moveOrderDownBtn').click(function() {
        if (btnClicked) {
            return;
        }
        btnClicked = true;
        $.post('/api/categories/' + $(this).closest('tr').attr('data-id') + '/order-down', function() {
            window.location.reload();
            btnClicked = false;
        }).fail(function(response) {
            toastr.error(response.responseText);
            btnClicked = false;
        });
    });

    $('#categoriesTable .deleteBtn').click(function() {
        var dataId = $(this).closest('tr').attr('data-id');
        var dataName = $(this).closest('tr').attr('data-name');
        window.confirm('Are you sure you want to delete <b>' + dataName + '</b>?', function() {
            if (btnClicked) {
                return;
            }
            btnClicked = true;
            $.ajax({
                type: "DELETE",
                url: '/api/categories/' + dataId
            }).done(function() {
                window.location.reload();
                btnClicked = false;
            }).fail(function(response) {
                toastr.error(response.responseText);
                btnClicked = false;
            });
        });
    });
});