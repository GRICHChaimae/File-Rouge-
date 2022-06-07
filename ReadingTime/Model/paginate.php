<?php

require_once 'dataBase.php';

class Blog {

    public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM blogs');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }    

}    

?>