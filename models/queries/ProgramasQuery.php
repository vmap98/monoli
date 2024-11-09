<?php
namespace App\models\queries;

class ProgramasQuery {

    // Obtener todos los programas
    static function all() {
        return "SELECT * FROM programas";
    }


    // Obtener un programa por su ID
    static function whereId($id) {
        return "SELECT * FROM programas WHERE id=$id";
    }

}
