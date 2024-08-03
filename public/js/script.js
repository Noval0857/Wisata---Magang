document.addEventListener('DOMContentLoaded', (event) => {
    if (window.loginSuccess) {
        Swal.fire({
            title: 'Berhasil!',
            text: window.loginSuccess,
            icon: 'success',
            confirmButtonText: 'OK'
        });
    } else if (window.loginWarning) {
        Swal.fire({
            title: 'Error!',
            text: window.loginWarning,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
});