<?php

// Incluir el archivo de conexión a la base de datos
require_once __DIR__ . '/../config/database.php';

try {
    // Preparar la consulta SQL
    $sql = "SELECT id, usuario, comentario, fecha FROM comentarios ORDER BY fecha DESC";
    $stmt = $pdo->query($sql);

    // Ejecutar la consulta
    $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($comentarios) {
        foreach ($comentarios as $comentario) {
            echo "<div class='caja'>
                    <div class='comentario-header'>
                        <strong>" . htmlspecialchars($comentario["usuario"]) . "</strong> 
                        <span class='fecha'>" . htmlspecialchars($comentario["fecha"]) . "</span>
                    </div>
                    <div class='comentario-texto'>
                        " . htmlspecialchars($comentario["comentario"]) . "
                    </div>
                </div>";
        }
    } else {
        echo "No hay comentarios";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
