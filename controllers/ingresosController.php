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
        $ingreso = new Ingresos();
        $ingreso->set('codigoEstudiante', $datos['codigoEstudiante']);
        $ingreso->set('nombreEstudiante', $datos['nombreEstudiante']);
        $ingreso->set('idPrograma', $datos['idPrograma']);
        $ingreso->set('fechaIngreso', $datos['fechaIngreso']);
        $ingreso->set('horaIngreso', $datos['horaIngreso']);
        $ingreso->set('idResponsable', $datos['idResponsable']);
        $ingreso->set('idSala', $datos['idSala']);
        return $ingreso->save();
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