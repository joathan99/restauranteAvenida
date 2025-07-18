<body class="w3-light-grey"></body>
    <?php

    require_once("view/menu.php");

    ?>
    <div class="w3-content">
        <form action="" method="post">
            <h2>Contactar</h2>
            <label for="correo">Correo:</label><br>
            <input type="email" id="correo" name="correo" placeholder="Correo..." required>
            <br><br>
            <label for="asunto">Asunto:</label><br>
            <input type="text" placeholder="Asunto..." id="asunto" name="asunto" required>
            <br><br>
            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" placeholder="Mensaje..." name="mensaje" rows="5" cols="95" required></textarea>
            <br><br>
            <input type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>

</html>