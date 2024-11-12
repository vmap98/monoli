<?php
require '../models/db/IngresosSalasDb.php';
require '../models/queries/IngresosQuery.php';

$database = new \App\models\db\IngresoSalas();

$fechaInicio = isset($_GET['fechaInicio']) ? $_GET['fechaInicio'] : null;
$fechaFin = isset($_GET['fechaFin']) ? $_GET['fechaFin'] : null;

if ($fechaInicio && $fechaFin) {
    
    $query = \App\models\queries\IngresosQuery::getIngresosPorRangoFechas($fechaInicio, $fechaFin);
} else {
    
    $query = \App\models\queries\IngresosQuery::getIngresosDelDia();
}

$result = $database->query($query);

if (!$result) {
    die("Error en la consulta: " . $database->conex->error);
}

$ingresos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ingresos[] = $row;
    }
} else {
    $ingresos = [];
}

$database->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ingreso en las Salas de Cómputo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        section {
            margin: 2rem;
        }

        a {
            display: inline-block;
            margin: 1rem 0;
            padding: 0.5rem 1rem;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 1rem;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 1rem;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <header>
        <h1>Registro de Ingreso en las Salas de Cómputo</h1>
    </header>

    
    <section>
        <a href="formularioIngreso.php">Ingreso Estudiante</a>
        <br>
        
        <?php if (count($ingresos) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código Estudiante</th>
                        <th>Nombre Estudiante</th>
                        <th>Programa</th>
                        <th>Fecha Ingreso</th>
                        <th>Hora Ingreso</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ingresos as $ingreso): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($ingreso['id']); ?></td>
                            <td><?php echo htmlspecialchars($ingreso['codigoEstudiante']); ?></td>
                            <td><?php echo htmlspecialchars($ingreso['nombreEstudiante']); ?></td>
                            <td><?php echo htmlspecialchars($ingreso['programa']); ?></td>
                            <td><?php echo htmlspecialchars($ingreso['fechaIngreso']); ?></td>
                            <td><?php echo htmlspecialchars($ingreso['horaIngreso']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay ingresos registrados para el rango de fechas seleccionado.</p>
        <?php endif; ?>
    </section>

    
    <section>
        <h2>Consultar Ingresos por Rango de Fechas</h2>
        <form action="inicio.php" method="get">
            <label for="fechaInicio">Fecha de inicio:</label>
            <input type="date" name="fechaInicio" id="fechaInicio" required>
            <label for="fechaFin">Fecha de fin:</label>
            <input type="date" name="fechaFin" id="fechaFin" required>
            <button type="submit">Consultar</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Vivian Arias. Aplicación para el registro de ingreso en las salas de cómputo.</p>
    </footer>
</body>

</html>