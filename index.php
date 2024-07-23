<?php
require_once "config/app.php";

    # Desarrollado por Gabriel Meza, todos los derechos reservados
    # IG: gabotoxf
    # Github: gabotoxf
    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de Comentarios</title>

    <link rel="stylesheet" href="<?php echo SERVERURL; ?>assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/2e68a5ac65.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <header>
            <h1>Foro</h1>
        </header>
        <main>
            <section class="comment-form">
                <form id="commentForm" action="public/insertar_comentario.php" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="usuario">Nombre:</label>
                        <input type="text" id="usuario" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentario:</label>
                        <textarea id="comentario" name="comentario" required></textarea>
                    </div>
                    <input type="submit" value="Enviar">
                    <a href="admin/admin.php" class='eliminar' style="text-decoration: none; padding: 10px 20px;">Administrar</a>
                </form>
            </section>
            <section class="comments-list">
                <h2>Comentarios:</h2>
                <div id="comentarios">
                    <!-- Los comentarios se mostrarán aquí -->
                    <?php
                    include "public/mostrar_comentarios.php";
                    ?>
                </div>
            </section>
        </main>
    </div>

    <script src="assets/js/scripts.js"></script>
</body>

</html>