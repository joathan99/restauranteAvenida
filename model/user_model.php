<?php 

class User_model {
    private $db;
    private $datos;

    public function __construct() {
        require_once("model/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = [];
    }

    public function get_users(){
        $sql = "SELECT * FROM users";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos[]=$registro;
        }
        return $this->datos;
    }

    public function get_user($id){
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $consulta = $this->db->query($sql);
        if ($registro = $consulta->fetch_assoc()) {
            return $registro;
        }
        return null;
    }

    public function login ($id, $password) {
        $sql = "SELECT * FROM users WHERE id='$id' and password='$password'";
        $consulta = $this->db->query($sql);
        return (mysqli_num_rows($consulta) > 0);
    }

    // public function insertar($id,$constrasena) {
    //     $sql = "INSERT INTO users (id,contraseña) VALUES ('$id','$constrasena')";
    //     return ($this->db->query($sql)); 
    // }

    public function borrar($id) {
        $sql = "DELETE FROM users WHERE id='$id'";
        return ($this->db->query($sql));
    }

    // public function modificar($id,$constrasena) {
    //     $sql = "UPDATE users SET contraseña='$constrasena' WHERE id='$id'";
    //     return ($this->db->query($sql));
    // }
}

?>