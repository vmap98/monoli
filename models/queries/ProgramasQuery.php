<?php
namespace App\models\queries;

class ProgramasQuery {

    
    static function all() {
        return "SELECT * FROM programas";
    }


    
    static function whereId($id) {
        return "SELECT * FROM programas WHERE id=$id";
    }

}
