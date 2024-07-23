<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo 'error';
    exit();
}

// Incluir el archivo de conexión a la base de datos
require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $sql = "DELETE FROM comentarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        if ($stmt->rowCount() > 0) {
            echo 'success';
        } else {
            echo 'error';
        }
    } catch (PDOException $e) {
        echo 'error';
    }
} else {
    echo 'error';
}
