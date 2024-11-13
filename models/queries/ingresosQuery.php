<?php
namespace App\models\queries;

class IngresosQuery {
    
    
    public static function getIngresosPorRangoFechas($fechaInicio, $fechaFin) {
        return "SELECT ingresos.id, ingresos.codigoEstudiante, ingresos.nombreEstudiante, programas.nombre AS programa, ingresos.fechaIngreso, ingresos.horaIngreso
                FROM ingresos
                JOIN programas ON ingresos.idPrograma = programas.id
                WHERE DATE(ingresos.fechaIngreso) BETWEEN '$fechaInicio' AND '$fechaFin'";
    }

    
    static function all() {
        return "SELECT * FROM ingresos";
    }

    static function insert($ingreso) {
        $codigoEstudiante = $ingreso->get('codigoEstudiante');
        $nombreEstudiante = $ingreso->get('nombreEstudiante');
        $idPrograma = $ingreso->get('idPrograma');
        $fechaIngreso = $ingreso->get('fechaIngreso');
        $horaIngreso = $ingreso->get('horaIngreso');
        $idResponsable = $ingreso->get('idResponsable');
        $idSala = $ingreso->get('idSala');
        return "INSERT INTO ingresos (codigoEstudiante, nombreEstudiante, idPrograma, fechaIngreso, horaIngreso, idResponsable, idSala)
                VALUES ('$codigoEstudiante', '$nombreEstudiante', $idPrograma, '$fechaIngreso', '$horaIngreso', $idResponsable, $idSala)";
    }

    static function whereId($id) {
        return "SELECT * FROM ingresos WHERE id=$id";
    }

    static function update($ingreso) {
        $id = $ingreso->get('id');
        $codigoEstudiante = $ingreso->get('codigoEstudiante');
        $nombreEstudiante = $ingreso->get('nombreEstudiante');
        return "UPDATE ingresos SET codigoEstudiante='$codigoEstudiante', nombreEstudiante='$nombreEstudiante' WHERE id=$id";
    }

    static function delete($ingreso) {
        $id = $ingreso->get('id');
        return "DELETE FROM ingresos WHERE id=$id";
    }

    static function getProgramas() {
        return "SELECT id, nombre FROM programas";
    }

    
    static function getIngresosDelDia() {
        $fecha_actual = date('Y-m-d'); 
        return "SELECT ingresos.id, ingresos.codigoEstudiante, ingresos.nombreEstudiante, programas.nombre AS programa, ingresos.fechaIngreso, ingresos.horaIngreso
                FROM ingresos
                JOIN programas ON ingresos.idPrograma = programas.id
                WHERE DATE(ingresos.fechaIngreso) = '$fecha_actual'";
    }
}