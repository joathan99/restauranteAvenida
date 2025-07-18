<?php 
session_start();
if (isset($_POST["accion"]) ) {
    echo '
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <input type="hidden" name="id" value="'.$_POST["id"].'">
                <label for="nombre"><b>Nombre</b></label>
                <input type="text" placeholder="Nombre ..." name="nombre" value="'.$_POST["nombre"].'" required>
                <label for="duracion"><b>Duracion</b></label>
                <input type="number" name="duracion" value="'.$_POST["duracion"].'" required>
                <label for="fechaInicio"><b>Fecha de inicio</b></label>
                <input type="date" name="fechaInicio" value="'.$_POST["fechaInicio"].'" required>
                <label for="descripcion"><b>Descripcion</b></label>
                <input type="text" placeholder="Descripcion ..." name="descripcion" value="'.$_POST["descripcion"].'" required>
                <label for="imagen"><b>Imagen</b></label>
                <input type="file" placeholder="Nombre ..." name="imagen1" value="'.$_POST["imagen"].'" required>
                <label for="promocional"><b>Promocional</b></label>
                <input type="text" placeholder="Nombre ..." name="promocional" value="'.$_POST["promocional"].'" required>
                <input type="text" name="idAgente" value="'.$_POST["idAgente"].'" readonly>
                <input type="submit" name="modificar" value="Modificar">
            </div>
        </form>
        <input type="submit" id="cancelar" value="Cancelar" onclick="cancelar()">
    ';
}
function home() {
    // require_once("view/home_view.php");
    require_once("model/paquete_model.php");
    $datos = new Paquete_model();
    $array = $datos->get_paquetes();
    require_once("view/paquete_view.php");

}

function gestionar() {
    require_once("model/paquete_model.php");
    $datos = new Paquete_model();
    $message="";

    if (isset($_POST["borrar"])) {
        $id = isset($_POST["id"])?$_POST["id"]:'';
        $imagen = isset($_POST["imagen"])?$_POST["imagen"]:'';
        if ($datos->borrar($id)) {
            $imagen = 'images/'.$imagen;
            unlink($imagen);
            $message = "Borrado correctamente";
        } else {
            $message = "Error al borrar";
        }
    }

    if (isset($_POST["insertar"])) {
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
        $duracion = isset($_POST["duracion"]) ? $_POST["duracion"] : '';
        $fechaInicio = isset($_POST["fechaInicio"]) ? $_POST["fechaInicio"] : '';
        $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : '';
        $promocional = isset($_POST["promocional"]) ? $_POST["promocional"] : 0;
        $idAgente = $_SESSION["id"];
        
        if (isset($_FILES["imagen"]) && !empty($_FILES["imagen"]["name"])) {
            $imagen = $_FILES["imagen"]["name"];
            $origen = $_FILES["imagen"]["tmp_name"];
            $destino = 'images/'.$imagen;
            if (@move_uploaded_file($origen, $destino)) {
                if ($datos->insertar($nombre, $duracion, $fechaInicio, $descripcion, $imagen, $promocional, $idAgente)) {
                    $message = "Insertado correctamente";
                } else {
                    $message = "Error al insertar";
                }
            }
        }
    }

    if (isset($_POST["modificar"])) {
        $id = isset($_POST["id"])?$_POST["id"]:'';
        $nombre = isset($_POST["nombre"])?$_POST["nombre"]:'';
        $duracion = isset($_POST["duracion"])?$_POST["duracion"]:'';
        $fechaInicio = isset($_POST["fechaInicio"])?$_POST["fechaInicio"]:'';
        $descripcion = isset($_POST["descripcion"])?$_POST["descripcion"]:'';
        $promocional = isset($_POST["promocional"])?$_POST["promocional"]:0;
        $idAgente = isset($_POST["idAgente"])?$_POST["idAgente"]:'';

        // Consulta adicional para obtener la imagen actual
        $paqueteActual = $datos->get_paquete($id);
        $imagen_old = $paqueteActual["imagen"];

        if (isset($_FILES["imagen1"])&&!empty($_FILES["imagen1"]["name"])) {
            $imagen = $_FILES["imagen1"]["name"];
            $origen = $_FILES["imagen1"]["tmp_name"];
            $destino = 'images/'.$imagen;
            if (@move_uploaded_file($origen,$destino)) {
                unlink('images/'.$imagen_old);
                if ($datos->modificar($id,$nombre,$duracion,$fechaInicio,$descripcion,$imagen,$promocional,$idAgente)) {
                    $message = "Modificado correctamente";
                } else {
                    $message = "Error al modificar";
                }
            }
        } else {
            // No se ha subido una nueva imagen, mantener la antigua
            if ($datos->modificar($id, $nombre, $duracion, $fechaInicio, $descripcion, $imagen_old, $promocional, $idAgente)) {
                $message = "Modificado correctamente";
            } else {
                $message = "Error al modificar";
            }
        }
    }
    
    $array = $datos->get_paquetes_by_agentes($_SESSION["id"]);
    require_once("view/gestionar_view.php");
}
?>

