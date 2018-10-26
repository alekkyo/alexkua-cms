jQuery(document).ready(function($) {
	// CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	// Image manager on click
	$('.imageManagerBtn').click(function() {
		console.log('open image manager');
	});

	// Toastr init
    toastr.options.newestOnTop = false;
    toastr.options.progressBar = true;

    // Checkbox all
    $('.checkboxAll').change(function() {
        $(this).closest('table').find('input[type=checkbox]').prop('checked', $(this).prop('checked'));
    });

    // Init tooltips
    $('[data-toggle="tooltip"]').tooltip();
});