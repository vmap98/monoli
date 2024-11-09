<?php
namespace App\models\entity;

use App\models\db\IngresoSalas;
use App\models\queries\IngresosQuery;

class Ingresos {
    private $id;
    private $codigoEstudiante;
    private $nombreEstudiante;
    private $idPrograma;
    private $fechaIngreso;
    private $horaIngreso;
    private $horaSalida;
    private $idResponsable;
    private $idSala;

    function set($prop, $value){
        $this->{$prop} = $value;
    }

    function get($prop){
        return $this->{$prop};
    }

    static function all(){
        $sql = IngresosQuery::all();
        $db = new IngresoSalas();
        $result = $db->query($sql);
        $ingresos = [];
        while($row = $result->fetch_assoc()){
            $ingreso = new Ingresos();
            $ingreso->set('id', $row['id']);
            $ingreso->set('codigoEstudiante', $row['codigoEstudiante']);
            $ingreso->set('nombreEstudiante', $row['nombreEstudiante']);
            $ingreso->set('fechaIngreso', $row['fechaIngreso']);
            $ingreso->set('horaIngreso', $row['horaIngreso']);
            $ingreso->set('horaSalida', $row['horaSalida']);
            $ingreso->set('idSala', $row['idSala']);
            $ingreso->set('idResponsable', $row['idResponsable']);
            $ingresos[] = $ingreso;
        }
        $db->close();
        return $ingresos;
    }

    function save(){
        $sql = IngresosQuery::insert($this);
        $db = new IngresoSalas();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }

    static function find($id){
        $sql = IngresosQuery::whereId($id);
        $db = new IngresoSalas();
        $result = $db->query($sql);
        $ingreso = new ingresos();
        while($row = $result->fetch_assoc()){
            $ingreso = new Ingresos();
            $ingreso->set('id', $row['id']);
            $ingreso->set('codigoEstudiante', $row['codigoEstudiante']);
            $ingreso->set('nombreEstudiante', $row['nombreEstudiante']);
            $ingreso->set('fechaIngreso', $row['fechaIngreso']);
            $ingreso->set('horaIngreso', $row['horaIngreso']);
            $ingreso->set('horaSalida', $row['horaSalida']);
            $ingreso->set('idSala', $row['idSala']);
            $ingreso->set('idResponsable', $row['idResponsable']);
        }
        $db->close();
        return $ingreso;
    }

    function update(){
        $sql = IngresosQuery::update($this);
        $db = new IngresoSalas();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }

    function delete(){
        $sql = IngresosQuery::delete($this);
        $db = new IngresoSalas();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }
}
