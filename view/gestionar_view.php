<?php 
if (isset($_SESSION["id"])) {
    require_once("view/menu.php");
   ?>
   <div id="nuevo">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <label for="nombre"><b>Nombre:</b></label>
                <input type="text" placeholder="Nombre Paquete..." name="nombre" required>
                <label for="duracion"><b>Duracion:</b></label>
                <input type="text" placeholder="Duracion..." name="duracion" required>
                <label for="fechaInicio"><b>Fecha Inicio:</b></label>
                <input type="date" placeholder="Inicio..." name="fechaInicio" required>
                <label for="descripcion"><b>Descripcion:</b></label>
                <input type="text" placeholder="Descripcion..." name="descripcion" required>
                <label for="imagen"><b>Imagen:</b></label>
                <input type="file" placeholder="Imagen..." name="imagen" required>
                <label for="promocional"><b>Promocion:</b></label>
                <input type="text" placeholder="0 o 1" name="promocional" required>
                

                <input type="submit" name="insertar" value="Insertar">
            </div>
        </form>
    </div>
    <div id="modificar"></div>
   <?php
   if (isset($array)) {
    echo "<table border><tr><th>Id</th><th>Nombre</th><th>Duracion</th><th>Fecha Inicio</th><th>Descripcion</th><th>Imagen</th><th>Promocional</th><th>Agente</th></tr>";
    foreach ($array as $registro) {
        if (is_array($registro) && !empty($array)) {
            echo "<tr>";
            foreach ($registro as $key => $campo) {
                echo "<td>$campo</td>";
            }
            echo '<td>
                    <form action="" method="post">
                    <input type="hidden" name="id" value="'.$registro["id"].'">
                    <input type="hidden" name="imagen" value="'.$registro["imagen"].'">
                    <input type="submit" name="borrar" value="Eliminar">
                    </form>
                </td>';
            echo '<td>
                <input type="hidden" id="id'.$registro["id"].'" value="'.$registro["id"].'">
                <input type="hidden" id="nombre'.$registro["id"].'" value="'.$registro["nombre"].'">
                <input type="hidden" id="duracion'.$registro["id"].'" value="'.$registro["duracion"].'">
                <input type="hidden" id="fechaInicio'.$registro["id"].'" value="'.$registro["fechaInicio"].'">
                <input type="hidden" id="descripcion'.$registro["id"].'" value="'.$registro["descripcion"].'">
                <input type="hidden" id="imagen'.$registro["id"].'" value="'.$registro["imagen"].'">
                <input type="hidden" id="promocional'.$registro["id"].'" value="'.$registro["promocional"].'">
                <input type="hidden" id="idAgente'.$registro["id"].'" value="'.$registro["idAgente"].'">
                <input type="button" id="modificar" value="Modificar" onclick="modificarPaquete('.$registro["id"].')">
                </td>';
                echo "</tr>";
        }
    }
    echo "</table>";
}

}
?>