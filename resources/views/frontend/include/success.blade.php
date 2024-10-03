{{-- @if (@Session::has('success'))
<div class="alert alert-success" role="alert">
    {{@Session::get('success')}}


</div>

@endif --}}


@if (Session::has('success'))
    <div id="successToast" class="Toastify__toast Toastify__toast-theme--light Toastify__toast--success" role="alert"
        style="position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); z-index: 9999; background-color: #28a745; color: #ffffff; padding: 12px 16px; border-radius: 4px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); font-weight: 600; display: flex; align-items: center;">
        <div class="Toastify__toast-icon" style="margin-right: 8px;">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="#ffffff">
                <path
                    d="M12 0a12 12 0 1012 12A12.014 12.014 0 0012 0zm6.927 8.2l-6.845 9.289a1.011 1.011 0 01-1.43.188l-4.888-3.908a1 1 0 111.25-1.562l4.076 3.261 6.227-8.451a1 1 0 111.61 1.183z">
                </path>
            </svg>
        </div>
        <div>{{ Session::get('success') }}</div>
    </div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Check if the toast exists
        if ($('#successToast').length) {
            // Set a timeout to fade out the toast after 10 seconds
            setTimeout(function() {
                $('#successToast').fadeOut('slow');
            }, 10000); // 10000 milliseconds = 10 seconds
        }
    });
</script>
