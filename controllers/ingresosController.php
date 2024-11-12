<?php
namespace App\controllers;

use App\models\entity\Ingresos;
use App\models\queries\ProgramasQuery;

class IngresosController {

    function allIngresos(){
        $ingresos = Ingresos::all(); 
        return $ingresos;
    }

    function newIngreso($datos){
       
        $fechaIngreso = new \DateTime($datos['fechaIngreso']);
        $horaIngreso = new \DateTime($datos['horaIngreso']);
    
        
        $diaSemana = $fechaIngreso->format('w');
        $hora = $horaIngreso->format('H:i'); 

        
        echo "Día de la semana: " . $diaSemana . "<br>";
        echo "Hora de ingreso: " . $hora . "<br>";

        
        if (($diaSemana >= 1 && $diaSemana <= 5 && $hora >= '07:00' && $hora <= '20:50') || 
            ($diaSemana == 6 && $hora >= '07:00' && $hora <= '16:30')) {
            
            $ingreso = new Ingresos();
            $ingreso->set('codigoEstudiante', $datos['codigoEstudiante']);
            $ingreso->set('nombreEstudiante', $datos['nombreEstudiante']);
            $ingreso->set('idPrograma', $datos['idPrograma']);
            $ingreso->set('fechaIngreso', $datos['fechaIngreso']);
            $ingreso->set('horaIngreso', $datos['horaIngreso']);
            $ingreso->set('idResponsable', $datos['idResponsable']);
            $ingreso->set('idSala', $datos['idSala']);
            return $ingreso->save();
        } else {
           
            $mensajeError = 'El horario de ingreso no es válido. ';
            if ($diaSemana >= 1 && $diaSemana <= 5) {
                $mensajeError .= 'El horario permitido de lunes a viernes es de 07:00 a 20:50.';
            } elseif ($diaSemana == 6) {
                $mensajeError .= 'El horario permitido los sábados es de 07:00 a 16:30.';
            } else {
                $mensajeError .= 'Los domingos no se permiten registros.';
            }
            throw new \Exception($mensajeError);
        }
    }

    function getIngreso($id){
        return Ingresos::find($id);
    }

    function updateIngreso($datos){
        $ingreso = new Ingresos();
        $ingreso->set('id', $datos['id']);
        $ingreso->set('codigoEstudiante', $datos['codigoEstudiante']);
        $ingreso->set('nombreEstudiante', $datos['nombreEstudiante']);
        return $ingreso->update();
    }

    function deleteIngreso($id){
        $ingreso = new Ingresos();
        $ingreso->set('id', $id);
        return $ingreso->delete();
    }

    function getProgramas(){
        $programasQuery = new ProgramasQuery();
        return $programasQuery->all();  
    }
}