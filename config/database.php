<?php

// Intentar cargar la configuración
$configPath = __DIR__ . '/config.php';

if (!file_exists($configPath)) {
    die("El archivo de configuración no se encuentra.");
}

$config = require $configPath;


// Verificar que la configuración de la base de datos se cargó correctamente
if (!isset($config['db'])) {
    die("Configuración de base de datos no encontrada en el archivo de configuración.");
}

// Obtener los datos de configuración para la base de datos
$dbConfig = $config['db'];

try {
    // Crear el DSN para PDO
    $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['name']};charset={$dbConfig['charset']}";

    // Crear una nueva instancia de PDO para conectar a la base de datos
    $pdo = new PDO($dsn, $dbConfig['user'], $dbConfig['pass']);

    // Configurar el modo de error de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Manejar errores de conexión
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
