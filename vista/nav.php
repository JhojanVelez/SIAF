<header class="nav-container">
    <div class="user-icon-container">
        <figure class="user-icon-container__img-usu-container" >
            <img 
            class="user-icon-container__img" 
            alt="usuario IMG"
            src=
                "
                    <?php 
                        echo (file_exists("fotosEmpleados/empleado_{$_SESSION["usuario"]["documento"]}.jpeg"))
                            ? URL_RAIZ."fotosEmpleados/empleado_{$_SESSION["usuario"]["documento"]}.jpeg?=".random_int(1,1000) 
                            : URL_RAIZ."fotosEmpleados/default_1.jpeg?=".random_int(1,1000);
                    ?>
                " 
            >
        </figure>
        <p class="user-icon-container__nombre-usu" >
            <?php 
                $primerNombre = explode(" ",$_SESSION["usuario"]["nombre"])[0];
                $primerApellido = explode(" ",$_SESSION["usuario"]["apellido"])[0];
                echo($primerNombre." ".$primerApellido);
            ?>
        </p>
    </div>
    <nav class="nav">
        <ul class="nav__ul">
            <li class="nav__li menu" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>menu">Men&uacute;</a></li>
            <?php
            
            require_once("./libs/mostrarOpcionesNav.php");
            
            ?>
        </ul>
    </nav>
    <div class="boton-cerrar-sesion-container">
        <a href="<?php echo(URL_RAIZ) ?>login/cerrarSesion">
            <button class="boton-cerrar-sesion-container__boton boton">
                <div class="sign-out-container">
                    <section class="sign-out-container__img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/sign-out.png" alt="sign out">
                    </section>
                    <section class="sign-out-container__text" >
                        CERRAR SESI&Oacute;N
                    </section>
                </div>
            </button>
        </a>
    </div>
</header>