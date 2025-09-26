<?php

require_once("view/menu.php");
echo 'holas';
echo '<div>';

if (isset($array)) {
    foreach ($array as $registro) {
        if ($registro['foodId'] == 1) {
            echo '<img src="images/' . $registro['image'] . '" alt="paella" class="imagen1">';
        }
    }
} else {
    echo 'No se ha cargado la imagen';
}


echo '</div>';
?>
