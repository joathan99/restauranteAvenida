<?php 

class Product_model {
    private $db;
    private $datos;

    public function __construct(){
        require_once("model/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = [];
    }

    public function get_paquetes(){
        $sql = "SELECT * FROM paquetes";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos[]=$registro;
        }
        return $this->datos;
    }

    //devuelva un paquete específico
    public function get_paquete($id) {
        $sql = "SELECT * FROM paquetes WHERE id = '$id'";
        $consulta = $this->db->query($sql);
        if ($registro = $consulta->fetch_assoc()) {
            return $registro;
        }
        return null;
    }

    function get_paquetes_by_agentes($idAgente){
        $sql = "SELECT * FROM paquetes WHERE idAgente='$idAgente'";
        $consulta= $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos[]=$registro;
        }
        return $this->datos;
    }

    public function borrar($id){
        $sql = "DELETE FROM paquetes WHERE id='$id'";
        return ($this->db->query($sql));
    }

    public function insertar($nombre,$duracion,$fechaInicio,$descripcion,$imagen,$promocional,$idAgente){
        $sql = "INSERT INTO paquetes (id,nombre,duracion,fechaInicio,descripcion,imagen,promocional,idAgente) VALUES (NULL,'$nombre','$duracion','$fechaInicio','$descripcion','$imagen','$promocional','$idAgente')";
        return $this->db->query($sql);
    }

    public function modificar($id,$nombre,$duracion,$fechaInicio,$descripcion,$imagen,$promocional,$idAgente){
        $sql = "UPDATE paquetes  SET nombre='$nombre', duracion='$duracion', fechaInicio='$fechaInicio', descripcion='$descripcion', imagen='$imagen', promocional='$promocional' WHERE id='$id' AND idAgente='$idAgente'";
        return $this->db->query($sql);
    }
}

?>