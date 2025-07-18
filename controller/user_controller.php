<?php 
session_start();
// if (isset($_POST["accion"])) {
//     echo '
//         <form action="" method="post">
//             <div class="container">
//                 <label for="id"><b>ID</b></label>
//                 <input type="text" placeholder="ID/nombre usuario..." name="id" value="'.$_POST["id"].'" readonly>
//                 <label for="contraseña"><b>Contraseña</b></label>
//                 <input type="text" placeholder="ID/nombre usuario..." name="contraseña" value="'.$_POST["contraseña"].'" required>
//                 <input type="submit" name="mmodificar" value="Modificar">
//             </div>
//         </form>
//         <input type="submit" id="cancelar" value="Cancelar" onclick="cancelar()">
//     ';
// }
function home(){
    require_once("model/user_model.php");
    $datos = new User_model();
    $message = "";

    if (!isset($_SESSION["id"])) {
        if (isset($_POST["submit"])) {
            $id = isset($_POST["id"])?$_POST["id"]:'';
            $contrasena = isset($_POST["contraseña"])?$_POST["contraseña"]:'';
            if ($datos->login($id,$contrasena)) {
                $_SESSION["id"] = $id;
                // Redireccionar a la página principal tras login exitoso
                header("Location: index.php?controller=paquete&action=home");
            } else {
                $message = "Usuario o contraseña incorrectos";
            }
        }
    }

    // if (isset($_POST["borrar"])) {
    //     $id = isset($_POST["id"])?$_POST["id"]:'';
    //     if ($datos->borrar($id)) {
    //         $message = "Borrado correctamente";
    //     } else {
    //         $message = "Error al borrar";
    //     }
    // }

    // if (isset($_POST["insertar"])) {
    //     $id = isset($_POST["id"])?$_POST["id"]:'';
    //     $contrasena = isset($_POST["contraseña"])?$_POST["contraseña"]:'';
    //     if ($datos->insertar($id,$contrasena)) {
    //         $message = "Insertado correctamente";
    //     } else {
    //         $message = "Error al insertar";
    //     }
        
    // }

    // if (isset($_POST["modificar"])) {
    //     $id = isset($_POST["id"])?$_POST["id"]:'';
    //     $contrasena = isset($_POST["contraseña"])?$_POST["contraseña"]:'';
    //     if ($datos->modificar($id,$contrasena)) {
    //         $message = "Modificado correctamente";
    //     } else {
    //         $message = "Error al modificar";
    //     }
    // }

    $array = $datos->get_users();
    require_once("view/login_view.php");
}

function desconectar() {
    session_destroy();
    header("Location: index.php");
}

?>