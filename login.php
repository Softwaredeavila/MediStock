<?php
// Iniciamos la sesión para poder guardar mensajes de error si fallan las credenciales
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediClic - Login</title>
    <style>
        /* Estilos globales y centrado absoluto (Tus estilos originales) */
        body {
            display: grid;
            place-content: center;
            min-height: 100vh;
            margin: 0;
            font-family: system-ui, -apple-system, sans-serif;
            background: #f0f4f8;
        }

        /* Contenedor del Login (Tarjetas modernas) */
        .login-card {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 340px;
            padding: 2.5rem;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            text-align: center; /* Centrar textos internos */
        }

        h1 {
            margin: 0;
            color: #1e3a8a;
            font-size: 2rem;
        }

        p.subtitle {
            color: #64748b;
            margin-top: 0.25rem;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        /* Estilos para los campos del formulario */
        .input-group {
            margin-bottom: 1.25rem;
            text-align: left;
        }

        .input-group input {
            width: 100%;
            padding: 0.85rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 0.95rem;
            outline: none;
        }

        .input-group input:focus {
            border-color: #0284c7;
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.1);
        }

        /* Botón de ingreso */
        .btn-submit {
            width: 100%;
            padding: 0.85rem;
            background: #0284c7;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            margin-top: 0.5rem;
            transition: background 0.2s;
        }

        .btn-submit:hover {
            background: #0369a1;
        }

        a.forgot-pass {
            display: block;
            margin-top: 1.5rem;
            color: #0284c7;
            text-decoration: none;
            font-size: 0.85rem;
        }

        a.forgot-pass:hover {
            text-decoration: underline;
        }

        /* Alerta de error estilizada */
        .error-message {
            background: #fef2f2;
            color: #991b1b;
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.85rem;
            border: 1px solid #fee2e2;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h1>MediClic</h1>
        <p class="subtitle">Citas médicas a un solo clic.</p>

        <?php if (isset($_SESSION['error_login'])): ?>
            <div class="error-message">
                <?php 
                    echo $_SESSION['error_login']; 
                    unset($_SESSION['error_login']); // Borramos el error para que no se quede ahí siempre
                ?>
            </div>
        <?php endif; ?>

        <form action="procesar_login.php" method="POST">
            
            <div class="input-group">
                <input type="text" name="usuario" placeholder="Usuario" required autocomplete="off">
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>

            <button type="submit" class="btn-submit">Ingresar al sistema</button>
        
        </form>

        <a href="#" class="forgot-pass">¿Olvidaste tu contraseña?</a>
    </div>

</body>
</html>