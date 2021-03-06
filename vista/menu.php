<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ) ?>public/css/menu.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Men&uacute; Principal</title>
</head>
<body>
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
                                ? URL_RAIZ."fotosEmpleados/empleado_{$_SESSION["usuario"]["documento"]}.jpeg?=".random_int(1,50) 
                                : URL_RAIZ."fotosEmpleados/default_1.jpeg?=".random_int(1,50);
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
        <h2 class="menu-nav-title">SIAF</h2>
        <div class="boton-cerrar-sesion-container">
            <a href="<?php echo(URL_RAIZ) ?>login/cerrarSesion">
                <button class="boton-cerrar-sesion-container__boton boton">
                    <div class="sign-out-container">
                        <section class="sign-out-container__img">
                            <img src="<?php echo(URL_RAIZ) ?>public/imagenes/sign-out.png" alt="sign out">
                        </section>
                        <section class="sign-out-container__text" >
                            CERRAR SESI&Oacute;N
                        </section>
                    </div>
                </button>
            </a>
        </div>
    </header>
    <main>
        <article class="cards-flex-container">
            
            <?php
            
            require_once("./libs/mostrarOpcionesMenu.php");
            
            ?>
            
        </article>

        <section class="menu-info-usuario-container-modal transparent-container-modal">
            <dialog class="menu-info-usuario-modal">
                <span class="menu-info-usuario-modal__btn-cerrar dialog-btn-cerrar">X</span>
                <h2 class="menu-info-usuario-modal__title dialog-title">Consulta Tus Datos</h2>
                <div class="menu-info-usuario-modal__container-img">
                    <img src="
                        <?php 
                            echo (file_exists("fotosEmpleados/empleado_{$_SESSION["usuario"]["documento"]}.jpeg"))
                                ? URL_RAIZ."fotosEmpleados/empleado_{$_SESSION["usuario"]["documento"]}.jpeg?=".random_int(1,1000) 
                                : URL_RAIZ."fotosEmpleados/default_1.jpeg?=".random_int(1,1000);
                        ?>
                        "
                    >
                </div>
                <div class="menu-info-usuario-modal__container-info dialog-main-content">
                    <div class="menu-info-usuario-modal__flex-item">
                        <section class="menu-info-usuario-modal__perfil-info-item">
                            <h4>DOCUMENTO DE IDENTIDAD</h4>
                            <p></p>
                        </section>
                        <section class="menu-info-usuario-modal__perfil-info-item">
                            <h4>NOMBRES</h4>
                            <p></p>
                        </section>
                        <section class="menu-info-usuario-modal__perfil-info-item">
                            <h4>APELLIDOS</h4>
                            <p></p>
                        </section>
                    </div>
                    <div class="menu-info-usuario-modal__flex-item">
                        <section class="menu-info-usuario-modal__perfil-info-item">
                            <h4>EPS</h4>
                            <p></p>
                        </section>
                        <section class="menu-info-usuario-modal__perfil-info-item">
                            <h4>TEL&Eacute;FONO</h4>
                            <p></p>
                        </section>
                        <section class="menu-info-usuario-modal__perfil-info-item">
                            <h4>CORREO</h4>
                            <p></p>
                        </section>
                    </div>
                    <div class="menu-info-usuario-modal__flex-item">
                        <section class="menu-info-usuario-modal__perfil-info-item">
                            <h4>DIRECCI&Oacute;N</h4>
                            <p></p>
                        </section>
                        <section class="menu-info-usuario-modal__perfil-info-item">
                            <h4>RH</h4>
                            <p></p>
                        </section>
                        <section class="menu-info-usuario-modal__perfil-info-item">
                            <h4>ROL</h4>
                            <p></p>
                        </section>
                    </div>
                </div>
            </dialog>
        </section>
    </main>
    <figure class="manual-usuario-figure">
        <div class="manual-usuario-figure__container">
            <a class="manual-usuario-figure__link" href="<?php echo URL_RAIZ ?>manualUsuario" title="Manual de Usuario" target="BLANK">?</a>

        </div>
    </figure>
    <script> 
        /* Se puso var porque queremos que pueda usarse en todos los contextos, 
        independientemente de si esta en una funcion anonima autoejecutable */
        var URL_RAIZ = "<?php echo URL_RAIZ ?>"
    </script>
    <script src="<?php echo(URL_RAIZ) ?>public/js/modulo_menu_consultar_info_perfil.js" type="module"></script>
</body>
</html>