 {{-- @if (@Session::has('error'))
<div class="alert alert-danger" role="alert">
    {{@Session::get('error')}}


</div>
    
@endif  --}}


@if (Session::has('error'))
<div id="errorToast" class="Toastify__toast Toastify__toast-theme--light Toastify__toast--error" role="alert" style="position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); z-index: 9999; background-color: #dc3545; color: #ffffff; padding: 12px 16px; border-radius: 4px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); font-weight: 600; display: flex; align-items: center;">
    <div class="Toastify__toast-icon" style="margin-right: 8px;">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="#ffffff">
            <path d="M12 0a12 12 0 1012 12A12.014 12.014 0 0012 0zm1 17h-2v-2h2zm0-4h-2V7h2z"></path>
        </svg>
    </div>
    <div>{{ Session::get('error') }}</div>
</div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Check if the toast exists
        if ($('#errorToast').length) {
            // Set a timeout to fade out the toast after 10 seconds
            setTimeout(function() {
                $('#errorToast').fadeOut('slow');
            }, 10000); // 10000 milliseconds = 10 seconds
        }
    });
</script>


