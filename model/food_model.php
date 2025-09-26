<?php

class Food_model {
    private $db;
    private $datos;
    
    public function __construct() {
        require_once("model/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = [];
    }

    public function get_foods() {
        $sql = "SELECT * FROM food";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos[]=$registro;
        }
        return $this->datos;
    }

    // public function get_food($id) {
    //     $sql = "SELECT * FROM food WHERE id = '$id'";
    //     $consulta = $this->db->query($sql);
    //     while ($registro = $consulta->fetch_assoc()) {
    //         return $registro;
    //     }
    //     return null;
    // }

}
?>