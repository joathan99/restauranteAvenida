<?php
function home() {
    require_once("model/food_model.php");
    $datos = new Food_model();
    $array = $datos->get_foods();
    require_once("view/presentation_view.php");
}
?>