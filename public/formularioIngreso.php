<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../models/db/ingresosSalasDb.php';
require '../models/queries/ingresosQuery.php';
require '../models/entity/ingresos.php';
require '../controllers/ingresosController.php';

use App\controllers\IngresosController;

$titulo = empty($_GET['id']) ? 'Registrar ingreso' : 'Modificar ingreso';
$codigoEstudiante = '';
$nombreEstudiante = '';
$idPrograma = '';
$fechaIngreso = '';
$idSala = '';
$idResponsable = '';
$horaIngreso = ''; // Inicializa la variable horaIngreso

if (!empty($_GET['id'])) {
    $controller = new IngresosController();
    $ingreso = $controller->getIngreso($_GET['id']);
    $codigoEstudiante = $ingreso->get('codigoEstudiante');
    $nombreEstudiante = $ingreso->get('nombreEstudiante');
    $idPrograma = $ingreso->get('idPrograma');
    $fechaIngreso = $ingreso->get('fechaIngreso');
    $idSala = $ingreso->get('idSala');
    $idResponsable = $ingreso->get('idResponsable');
    $horaIngreso = $ingreso->get('horaIngreso');  // Asigna el valor de horaIngreso si existe
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($titulo); ?></h1>
    <section>
        <form action="confirmarIngreso.php" method="post">
            <?php if (!empty($_GET['id'])): ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
            <?php endif; ?>
            <div>
                <label for="codigoEstudiante">Código del Estudiante:</label>
                <input type="text" id="codigoEstudiante" name="codigoEstudiante" value="<?php echo htmlspecialchars($codigoEstudiante); ?>" required>
            </div>
            <div>
                <label for="nombreEstudiante">Nombre del Estudiante:</label>
                <input type="text" id="nombreEstudiante" name="nombreEstudiante" value="<?php echo htmlspecialchars($nombreEstudiante); ?>" required>
            </div>
            <div>
                <label for="idPrograma">Programa:</label>
                <input type="text" id="idPrograma" name="idPrograma" value="<?php echo htmlspecialchars($idPrograma); ?>" required>
            </div>
            <div>
                <label for="fechaIngreso">Fecha y Hora de Ingreso:</label>
                <input type="datetime-local" id="fechaIngreso" name="fechaIngreso" value="<?php echo htmlspecialchars($fechaIngreso); ?>" required>
            </div>
            <div>
                <label for="horaIngreso">Hora de Ingreso:</label>
                <input type="time" id="horaIngreso" name="horaIngreso" value="<?php echo htmlspecialchars($horaIngreso); ?>" required>
            </div>
            <div>
                <label for="idSala">Sala:</label>
                <input type="text" id="idSala" name="idSala" value="<?php echo htmlspecialchars($idSala); ?>" required>
            </div>
            <div>
                <label for="idResponsable">Responsable:</label>
                <input type="text" id="idResponsable" name="idResponsable" value="<?php echo htmlspecialchars($idResponsable); ?>" required>
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </section>
</body>
</html>