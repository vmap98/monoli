<?php

namespace App\views;

use App\controllers\IngresosController;

class IngresosView {

    private $ingresosController;

    function __construct() {
        $this->ingresosController = new IngresosController();
    }

    function tablaIngresos() {
        $ingresos = $this->ingresosController->allIngresos();
        $html = '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>ID</th>';
        $html .= '<th>Código</th>';
        $html .= '<th>Nombre Estudiante</th>';
        $html .= '<th>Programa</th>';
        $html .= '<th>Fecha Hora Ingreso</th>';
        $html .= '<th>Sala</th>';
        $html .= '<th>Responsable</th>';
        $html .= '<th>Acciones</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';
        foreach ($ingresos as $ingreso) {
            $html .= '<tr>';
            $html .= '<td>' . $ingreso->get('id') . '</td>';
            $html .= '<td>' . $ingreso->get('codigoEstudiante') . '</td>';
            $html .= '<td>' . $ingreso->get('nombreEstudiante') . '</td>';
            
            $html .= '<td>' . $ingreso->get('programaNombre') . '</td>';  
            $html .= '<td>' . $ingreso->get('fechaIngreso') . '</td>';
            $html .= '<td>' . $ingreso->get('salaNombre') . '</td>';  
            $html .= '<td>' . $ingreso->get('responsableNombre') . '</td>';  
            $html .= '<td>';
            $html .= '<a href="formularioIngreso.php?id=' . $ingreso->get('id') . '">Modificar</a>';
            $html .= '<button class="borrar" data-id="' . $ingreso->get('id') . '">Borrar</button>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';
        return $html;
    }
}