<?php
    require_once("view/menu.php");
if (isset($_SESSION["id"])) {
    ?>
    <form action="" method="post">
        <div class="container">
            <label class="label" for="user"><b>Usuario:</b></label>
            <input class="input" id="user" type="text" placeholder="Usuario..." name="id" required>
            <label class="label" for="password"><b>Contraseña:</b></label>
            <input class="input" id="password" type="password" placeholder="Contraseña..." name="contraseña" required>
            <input type="submit" name="insertar" value="Insertar">
        </div>
    </form>
    <?php
    if (isset($array)) {
        echo "<table border><tr><th>Nombre</th><th>Clave</th><th></th></tr>";
        foreach ($array as $registro) {
            if (is_array($registro)) {
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
                echo "</tr>";
            }
        }
        echo "</table>";
    }
}
?>