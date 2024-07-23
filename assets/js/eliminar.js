$(document).ready(function () {
    $('.eliminar').click(function () {
        var id = $(this).data('id');
        var comentarioDiv = $(this).closest('.caja');

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../public/eliminar_comentario.php',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        if (response === 'success') {
                            comentarioDiv.remove();
                            Swal.fire({
                                position: "top-end",
                                text: '¡Eliminado!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                position: "top-end",
                                text: 'Error al eliminar!',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    }
                });
            }
        });
    });
});