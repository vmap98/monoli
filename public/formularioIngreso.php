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
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="../public/css/estilos.css">
</head>
<body>
    <h1><?= $titulo ?></h1>
    <section>
        <form action="confirmarIngreso.php" method="post">
            <div>
                <label for="codigoEstudiante">Código del Estudiante:</label>
                <input type="text" id="codigoEstudiante" name="codigoEstudiante" value="<?= $codigoEstudiante ?>" required>
            </div>
            <div>
                <label for="nombreEstudiante">Nombre del Estudiante:</label>
                <input type="text" id="nombreEstudiante" name="nombreEstudiante" value="<?= $nombreEstudiante ?>" required>
            </div>
            <div>
                <label for="idPrograma">Programa:</label>
                <select name="idPrograma" id="idPrograma">
                    <option value="1" <?= ($idPrograma == 1) ? 'selected' : '' ?>>Ing. Sistemas</option>
                    <option value="2" <?= ($idPrograma == 2) ? 'selected' : '' ?>>Ing. Multimedia</option>
                    <option value="3" <?= ($idPrograma == 3) ? 'selected' : '' ?>>Arquitectura</option>
                    <option value="4" <?= ($idPrograma == 4) ? 'selected' : '' ?>>Contabilidad</option>
                </select>           
            </div>
            <div>
                <label for="fechaIngreso">Fecha:</label>
                <input type="date" id="fechaIngreso" name="fechaIngreso" value="<?= $fechaIngreso ?>" required>
            </div>
            <div>
                <label for="horaIngreso">Hora de Ingreso:</label>
                <input type="time" id="horaIngreso" name="horaIngreso" value="<?= $horaIngreso ?>" required>
            </div>
            <div>
                <label for="idSala">Sala:</label>
                <select name="idSala" id="idSala">
                    <option value="1" <?= ($idSala == 1) ? 'selected' : '' ?>>201G</option>
                    <option value="2" <?= ($idSala == 2) ? 'selected' : '' ?>>202H</option>
                    <option value="3" <?= ($idSala == 3) ? 'selected' : '' ?>>203I</option>
                    <option value="4" <?= ($idSala == 4) ? 'selected' : '' ?>>301G</option>
                    <option value="5" <?= ($idSala == 5) ? 'selected' : '' ?>>302H</option>
                    <option value="6" <?= ($idSala == 6) ? 'selected' : '' ?>>303I</option>
                </select> 
            </div>
            <div>
            <label for="idResponsable">Responsable:</label>
                <select name="idResponsable" id="idResponsable">
                    <option value="1" <?= ($idResponsable == 1) ? 'selected' : '' ?>>Juan Perez</option>
                    <option value="2" <?= ($idResponsable == 2) ? 'selected' : '' ?>>Ana Lopeez</option>
                    <option value="3" <?= ($idResponsable == 3) ? 'selected' : '' ?>>Juan Perez</option>
                    <option value="4" <?= ($idResponsable == 4) ? 'selected' : '' ?>>Ana Lopeez</option>
                    
                </select> 
        </div>
            <div>
                <button type="submit">Guardar</button>
            </div>
        </form>
    </section>
</body>
</html>