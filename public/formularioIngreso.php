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
$horaIngreso = ''; 

if (!empty($_GET['id'])) {
    $controller = new IngresosController();
    $ingreso = $controller->getIngreso($_GET['id']);
    $codigoEstudiante = $ingreso->get('codigoEstudiante');
    $nombreEstudiante = $ingreso->get('nombreEstudiante');
    $idPrograma = $ingreso->get('idPrograma');
    $fechaIngreso = $ingreso->get('fechaIngreso');
    $idSala = $ingreso->get('idSala');
    $idResponsable = $ingreso->get('idResponsable');
    $horaIngreso = $ingreso->get('horaIngreso');  
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar ingreso</title>
    <link rel="stylesheet" href="../public/css/estilos.css">
</head>
<body>
    <h1>Registrar ingreso</h1>
    <section>
        <form action="confirmarIngreso.php" method="post">
            <div>
                <label for="codigoEstudiante">Código del Estudiante:</label>
                <input type="text" id="codigoEstudiante" name="codigoEstudiante" value="" required>
            </div>
            <div>
                <label for="nombreEstudiante">Nombre del Estudiante:</label>
                <input type="text" id="nombreEstudiante" name="nombreEstudiante" value="" required>
            </div>
            <div>
                <label for="idPrograma">Programa:</label>
                <input type="text" id="idPrograma" name="idPrograma" value="" required>
            </div>
            <div>
                <label for="fechaIngreso">Fecha:</label>
                <input type="date" id="fechaIngreso" name="fechaIngreso" value="" required>
            </div>
            <div>
                <label for="horaIngreso">Hora de Ingreso:</label>
                <input type="time" id="horaIngreso" name="horaIngreso" value="" required>
            </div>
            <div>
                <label for="idSala">Sala:</label>
                <input type="text" id="idSala" name="idSala" value="" required>
            </div>
            <div>
                <label for="idResponsable">Responsable:</label>
                <input type="text" id="idResponsable" name="idResponsable" value="" required>
            </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </section>
</body>
</html>