<?php
session_start();

// Control de seguridad: Si no existe la sesión, lo expulsamos al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediClic - Dashboard</title>
    <style>
        body {
            font-family: system-ui, -apple-system, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 2rem;
            display: flex;
            justify-content: center;
        }
        .container {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        h2 { color: #1e3a8a; margin-top: 0; }
        p.welcome { color: #64748b; margin-bottom: 2rem; }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #1e293b;
            font-weight: 600;
            font-size: 0.95rem;
        }
        select, input {
            width: 100%;
            padding: 0.85rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 0.95rem;
            outline: none;
        }
        select:focus, input:focus {
            border-color: #0284c7;
        }
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
            transition: background 0.2s;
        }
        .btn-submit:hover { background: #0369a1; }
        .logout-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: #ef4444;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .logout-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?> 👋</h2>
        <p class="welcome">Por favor, selecciona los datos para agendar tu cita médica.</p>

        <form action="confirmacion.php" method="POST">
            
            <div class="form-group">
                <label for="medico">Médico Especialista</label>
                <select name="medico" id="medico" required>
                    <option value="">-- Seleccione un especialista --</option>
                    <option value="Dr. Carlos Mendoza - Cardiología">Dr. Carlos Mendoza - Cardiología</option>
                    <option value="Dra. Laura Restrepo - Pediatría">Dra. Laura Restrepo - Pediatría</option>
                    <option value="Dr. Andrés Silva - Medicina General">Dr. Andrés Silva - Medicina General</option>
                    <option value="Dra. Elena Gómez - Dermatología">Dra. Elena Gómez - Dermatología</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha de la Cita</label>
                <input type="date" name="fecha" id="fecha" required min="<?php echo date('Y-m-d'); ?>">
            </div>

            <div class="form-group">
                <label for="hora">Hora de la Cita</label>
                <input type="time" name="hora" id="hora" required>
            </div>

            <button type="submit" class="btn-submit">Confirmar Agendamiento</button>
        </form>

        <a href="logout.php" class="logout-link">Cerrar Sesión de forma segura</a>
    </div>

</body>
</html>