<?php

class Conectar{
    public static function conexion() {
        try{
            $conexion = new mysqli("127.0.0.1", "root", "","restauranteavenida");
        } catch(Exception $e){
            die('Error:'.$e->getMessage());
        }
        return $conexion;
    }
}

?>