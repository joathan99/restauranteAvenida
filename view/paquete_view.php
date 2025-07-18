<?php
require_once("view/menu.php");


echo '<!-- Grid -->
    <div class="w3-row">';
$contador = 1;
if (isset($array)) {
    echo '<!-- Blog entries -->
        <div class="w3-col l8 s12">';
    foreach ($array as $registro) {
        //Primero tratamos las no promocionales
        if (is_array($registro) && !$registro["promocional"]) {
        echo '<!-- Blog entry -->
                <div class="w3-card-4 w3-margin w3-white">
                    <img src="images/'.$registro['imagen'].'" alt="'.$registro["nombre"].'" style="width:100%">
                    <div class="w3-container">
                    <h3><b>'.$registro["nombre"].'</b></h3>
                    <h5>'.$registro["duracion"].' dias, <span class="w3-opacity">'.$registro["fechaInicio"].'</span></h5>
                    </div>
                    <div class="w3-container">
                    <p>'.$registro["descripcion"].'</p>
                    </div>
                </div>
                <hr>';
        
        }
    }
    echo '<!-- END BLOG ENTRIES --></div>';

    echo '<!-- Introduction menu -->
        <div class="w3-col l4">
        <!-- Posts -->
        <div class="w3-card w3-margin">
            <div class="w3-container w3-padding w3-cyan">
            <h4>Paquetes promocionales</h4>
            </div>
            <ul class="w3-ul w3-hoverable w3-white">';
    foreach ($array as $registro) {
        //Primero tratamos las no promocionales
        if (is_array($registro) && $registro["promocional"]) {
            echo '<li class="w3-padding-16">
                <img src="images/'.$registro['imagen'].'" alt="'.$registro["nombre"].'" class="w3-left w3-margin-right" style="width:50px">
                <span class="w3-large">'.$registro["nombre"].'</span><br>
                <span>'.$registro["fechaInicio"].'</span>
            </li>';
        }
    }

    echo '</ul>
        </div>
        <hr> 
        
        <!-- END Introduction Menu -->
        </div>

        <!-- END GRID -->
        </div><br>';
}
?>