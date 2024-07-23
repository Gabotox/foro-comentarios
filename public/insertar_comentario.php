<?php
include '../config/database.php';

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$comentario = $_POST['comentario'];

// Insertar comentario en la base de datos
$sql = "INSERT INTO comentarios (usuario, comentario) VALUES (:usuario, :comentario)";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':comentario', $comentario);

try {
    $stmt->execute();
    echo 'Comentario agregado correctamente';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
