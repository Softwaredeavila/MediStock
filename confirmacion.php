<?php
session_start();

// Control de seguridad: Si no está logueado, lo saca
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Capturamos los datos enviados por el formulario para mostrarlos en el mensaje
// Usamos el operador ternario por si acaso recargan la página directamente
$medico = isset($_POST['medico']) ? htmlspecialchars($_POST['medico']) : 'No seleccionado';
$fecha = isset($_POST['fecha']) ? htmlspecialchars($_POST['fecha']) : 'No seleccionada';
$hora = isset($_POST['hora']) ? htmlspecialchars($_POST['hora']) : 'No seleccionada';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediClic - Cita Confirmada</title>
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }
        .card-success {
            width: 100%;
            max-width: 450px;
            background: white;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            text-align: center;
        }
        .icon-check {
            width: 70px;
            height: 70px;
            background: #bbf7d0;
            color: #166534;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1.5rem auto;
        }
        h2 { color: #166534; margin-top: 0; }
        p.main-msg { color: #475569; font-size: 1.1rem; margin-bottom: 1.5rem; }
        
        .details-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1.25rem;
            text-align: left;
            margin-bottom: 2rem;
        }
        .details-row {
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            color: #334155;
        }
        .details-row:last-child { margin-bottom: 0; }
        .details-row strong { color: #1e293b; }

        .btn-home {
            display: inline-block;
            width: 100%;
            padding: 0.85rem;
            background: #0284c7;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            box-sizing: border-box;
            transition: background 0.2s;
        }
        .btn-home:hover { background: #0369a1; }
    </style>
</head>
<body>

    <div class="card-success">
        <div class="icon-check">✓</div>
        <h2>¡Cita Agendada con Éxito!</h2>
        <p class="main-msg">Tu solicitud ha sido procesada correctamente en el sistema.</p>

        <div class="details-box">
            <div class="details-row"><strong>Paciente:</strong> <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></div>
            <div class="details-row"><strong>Especialista:</strong> <?php echo $medico; ?></div>
            <div class="details-row"><strong>Fecha:</strong> <?php echo $fecha; ?></div>
            <div class="details-row"><strong>Hora:</strong> <?php echo $hora; ?></div>
        </div>

        <a href="dashboard.php" class="btn-home">Agendar otra cita</a>
    </div>

</body>
</html>