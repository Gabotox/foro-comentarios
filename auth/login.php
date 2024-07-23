<?php
session_start();
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Preparar la consulta
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y la contraseña es correcta
    if ($user && $password === $user['contra']) {  // Comparar la contraseña directamente
        $_SESSION['admin'] = $username;
        header("Location: ../admin/admin_panel.php");
        exit;
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
