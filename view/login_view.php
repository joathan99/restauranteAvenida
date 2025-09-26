<?php
    require_once("view/menu.php");
?>
 <div class="login">
    <div class="form-container">
        <form class="form" action="" method="post">
            <label class="label" for="user"><b>Usuario</b></label>
            <input class="input" id="user" type="text" placeholder="Usuario..." name="id" required>
            <label class="label" for="psw"><b>Contraseña</b></label>
            <input class="input" type="password" placeholder="Contraseña..." name="contraseña" autocomplete="off" required>
            <input class="login-button primary-button" type="submit" name="submit" value="Login">
        </form>
    </div>
</div>
<?php
    echo "<p>$message</p>";
?>