@if (session('success') || session('error'))

<script>
document.addEventListener('DOMContentLoaded', function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        width: 'auto', 
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        },
        showClass: {
            popup: 'animate__animated animate__fadeInRight'
        },
        hideClass: {
            popup: 'animate__animated animate__backOutRight'
        }
    });

    @if (session('success'))
        Toast.fire({
            icon: "success",
            title: "{{ session('success') }}",
            customClass: {
                // I've renamed the class to be more descriptive
                popup: 'toast-success-container', 
                title: 'swal-title-small-success' 
            }
        });
    @endif

    @if (session('error'))
        Toast.fire({
            icon: "error",
            title: "{{ session('error') }}",
            customClass: {
                // I've renamed the class to be more descriptive
                popup: 'toast-error-container', 
                title: 'swal-title-small-error' 
            }
        });
    @endif
});
</script>

@endif