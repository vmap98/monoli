<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../models/db/ingresosSalasDb.php';
require '../models/queries/ingresosQuery.php';
require '../models/entity/ingresos.php';
require '../controllers/ingresosController.php';
require '../views/IngresosView.php';

use App\controllers\IngresosController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $datos = [
        'codigoEstudiante' => $_POST['codigoEstudiante'],
        'nombreEstudiante' => $_POST['nombreEstudiante'],
        'idPrograma' => $_POST['idPrograma'],
        'fechaIngreso' => $_POST['fechaIngreso'],
        'horaIngreso' => $_POST['horaIngreso'],
        'idResponsable' => $_POST['idResponsable'],
        'idSala' => $_POST['idSala']
    ];

    
    $controller = new IngresosController();
    $controller->newIngreso($datos);

    
    header("Location: inicio.php?mensaje=Ingreso registrado con éxito.");
    exit;
}
?>