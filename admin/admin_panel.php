<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
} else {

    // Incluir el archivo de conexión a la base de datos
    require_once __DIR__ . '/../config/database.php';

    // Obtener todos los comentarios
    try {
        $sql = "SELECT * FROM comentarios ORDER BY fecha DESC";
        $stmt = $pdo->query($sql);
        $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Panel de Administración</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <script src="https://kit.fontawesome.com/2e68a5ac65.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../assets/js/eliminar.js"></script>
    </head>

    <body>
        <div class="caja2">
            <div class="arriba">
                <h1>Panel de Administración</h1>
                <a href="../auth/logout.php" class="btn">Cerrar sesión <i class="fa-solid fa-power-off"></i></a>
            </div>

            <br><br>
            <h2>Comentarios:</h2>
            <br>
            <div id="comentarios">
                <?php
                if ($comentarios) {
                    foreach ($comentarios as $row) {
                        echo "<div class='caja'>
                        <div class='comentario-header'>
                            <strong>" . htmlspecialchars($row["usuario"]) . "</strong> 
                            <span class='fecha'>" . htmlspecialchars($row["fecha"]) . "</span>
                        </div>
                        <div class='comentario-texto'>
                            " . htmlspecialchars($row["comentario"]) . "
                        </div>
                        <button class='eliminar' data-id='" . htmlspecialchars($row["id"]) . "'>Eliminar</button>
                    </div>";
                    }
                } else {
                    echo "No hay comentarios";
                }
                ?>
            </div>
        </div>

        <script>

        </script>
    </body>

    </html>
<?php
}
?>