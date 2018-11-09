jQuery(document).ready(function($) {
	// CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

	// Toastr init
    toastr.options.newestOnTop = false;
    toastr.options.progressBar = true;

    // Checkbox all
    $('.checkboxAll').change(function() {
        $(this).closest('table').find('.itemCheckbox').prop('checked', $(this).prop('checked'));
    });

    // Init tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Override alert
    window.confirm = function(message, onSuccess, onCancel) {
        $("#staticModal").modal('show');
        $("#staticModal .modal-body p").html(message);
        $("#staticModal .modal-footer .cancelBtn").click(function() {
            if (typeof onCancel !== 'undefined') {
                onCancel();
            }
            $("#staticModal .modal-footer .btn").unbind();
            $("#staticModal").modal('hide');
        });
        $("#staticModal .modal-footer .confirmBtn").click(function() {
            onSuccess();
            $("#staticModal .modal-footer .btn").unbind();
            $("#staticModal").modal('hide');
        });
    }
});