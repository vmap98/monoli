<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../models/db/ingresossalasdb.php';
require '../models/queries/ingresosQuery.php';
require '../models/entity/ingresos.php';
require '../controllers/ingresosController.php';
require '../views/IngresosView.php';

use App\controllers\IngresosController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $codigoEstudiante = isset($_POST['codigoEstudiante']) ? $_POST['codigoEstudiante'] : '';
    $nombreEstudiante = isset($_POST['nombreEstudiante']) ? $_POST['nombreEstudiante'] : '';
    $idPrograma = isset($_POST['idPrograma']) ? $_POST['idPrograma'] : '';
    $fechaIngreso = isset($_POST['fechaIngreso']) ? $_POST['fechaIngreso'] : '';
    $horaIngreso = isset($_POST['horaIngreso']) ? $_POST['horaIngreso'] : '';
    $idResponsable = isset($_POST['idResponsable']) ? $_POST['idResponsable'] : '';
    $idSala = isset($_POST['idSala']) ? $_POST['idSala'] : '';

  
    if ($codigoEstudiante && $nombreEstudiante && $idPrograma && $fechaIngreso && $horaIngreso && $idResponsable && $idSala) {
        $datos = [
            'codigoEstudiante' => $codigoEstudiante,
            'nombreEstudiante' => $nombreEstudiante,
            'idPrograma' => $idPrograma,
            'fechaIngreso' => $fechaIngreso,
            'horaIngreso' => $horaIngreso,
            'idResponsable' => $idResponsable,
            'idSala' => $idSala
        ];

        $controller = new IngresosController();
        $controller->newIngreso($datos);

        header("Location: inicio.php?mensaje=Ingreso registrado con éxito.");
        exit;
    } else {
        
        header("Location: inicio.php?mensaje=Error: Todos los campos son obligatorios.");
        exit;
    }
}
?>