<script>
    document.addEventListener('DOMContentLoaded', function () {
        // SweetAlert notifications for session messages
        @if (session('success'))
            Swal.fire({
                position: "center",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @elseif (session('error'))
            Swal.fire({
                position: "center",
                icon: "error",
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    });
</script>