$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Evita el envío del formulario de manera tradicional

        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            url: '../auth/login_process.php', // Asegúrate de que esta ruta sea correcta
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                if (response === 'success') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Inicio de sesión exitoso',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'admin_panel.php'; // Redirige al panel de administración
                    });
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Usuario o contraseña incorrectos',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    });
});
