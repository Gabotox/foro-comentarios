$(document).ready(function () {
    $('#commentForm').on('submit', function (e) {
        e.preventDefault(); // Evita el envío del formulario tradicional

        var formData = $(this).serialize(); // Serializa los datos del formulario

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function (response) {
                Swal.fire({
                    position: "top-end",
                    text: response,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                    willClose: () => {
                        // Actualiza la lista de comentarios
                        loadComments();
                        // Limpia el formulario
                        $('#commentForm')[0].reset();
                    }
                });
            },
            error: function () {
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al agregar el comentario',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        });
    });

    function loadComments() {
        $.ajax({
            url: 'public/mostrar_comentarios.php',
            success: function (data) {
                $('#comentarios').html(data);
            },
            error: function () {
                $('#comentarios').html('<p>Hubo un problema al cargar los comentarios.</p>');
            }
        });
    }

    // Carga los comentarios al cargar la página
    loadComments();
});
