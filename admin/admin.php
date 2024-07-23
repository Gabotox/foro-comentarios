<?php require_once "../config/app.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        /* General */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: top;
            height: 100vh;
            margin: 0;
        }

        /* Contenedor principal */
        .contenedor_admin {
            width: 100%;
            max-width: 400px;
            margin: 20px;
            margin-top: 2rem;
            padding: 2rem 3rem;
            background: #fff;
            border-radius: 1rem;
            -webkit-box-shadow: 0px 0px 35px 6px rgba(0, 0, 0, 0.23);
            -moz-box-shadow: 0px 0px 35px 6px rgba(0, 0, 0, 0.23);
            box-shadow: 0px 0px 35px 6px rgba(0, 0, 0, 0.23);
            height: max-content;
        }

        /* Subcontenedor */
        .sub {
            text-align: center;
        }

        /* Título */
        h1 {
            color: #0056b3;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Formulario */
        .formulario {
            display: flex;
            flex-direction: column;
        }

        /* Grupos de campos */
        .grupo {
            margin-bottom: 15px;
            text-align: left;
        }

        /* Etiquetas */
        label {
            display: block;
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }

        /* Campos de entrada */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: .8rem;
        }

        /* Botón de envío */
        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
            width: max-content;
            margin: 0 auto;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
    <!-- Cargar jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Cargar SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Cargar tu script -->
    <script src="../assets/js/login.js"></script>
</head>

<body>

    <div class="contenedor_admin">
        <div class="sub">
            <h1>Panel de Administración</h1>
            <form action="" method="post" class="formulario" id="loginForm" autocomplete="off">
                <div class="grupo">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="grupo">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <br>
                <input type="submit" value="Iniciar Sesión">
            </form>
        </div>
    </div>
</body>

</html>