<!-- Header -->
<header> 
    <nav>

        <div class="navbar-left">

            <h1 class="name-menu">RESTAURANTE AVENIDA</h1>

            <ul>
                <?php
                    
                    if (isset($_SESSION["id"])) {
                        require_once("model/user_model.php");
                        $userData = new User_model();
                        $currentUser = $userData->get_users($_SESSION["id"]);
                        
                        echo '
                            <li><a href="index.php?controller=paquete&action=home" >Home</a></li>
                            ';
                        
                        if ($currentUser["type" == "administrator"]) {
                            echo '
                                <li><a href="index.php?controller=paquete&action=home" >Gestion Usuarios</a></li>
                                
                                <li><a href="index.php?controller=paquete&action=home" >Gestion Productos</a></li>
                                
                                <li><a href="index.php?controller=paquete&action=home" >Gestion Reservas</a></li>

                                ';
                        }

                        if ($currentUser["type" == "worker"]) {
                            
                        }
                        
                        if ($currentUser["type" == "user"]) {
                            
                        }

                        echo '
                            
                            

                            <li><a href="index.php?controller=user&action=desconectar" >Desconectar</a></li>
                            
                            
                        ';
                    } else {
                        // Menú para invitados
                        echo '
                            <li><a href="index.php?controller=paquete&action=home">Home</a></li>

                            <li><a href="index.php?controller=user&action=home">Inicia Sesión</a></li>

                            <li><a href="index.php?controller=contactar&action=home" >Contactar</a></li>
                        ';
                    }
                ?>
            </ul>
        </div>

        <div class="navbar-right">
            <ul>
                <li class="navbar-user">
                    <?php

                    if (isset($_SESSION["id"])) {
                        $nombreUsuario = $_SESSION["id"];
                        echo strtoupper($nombreUsuario);
                    } else {
                        echo '<li><a href="index.php?controller=user&action=home">Inicia Sesión</a></li>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</header>