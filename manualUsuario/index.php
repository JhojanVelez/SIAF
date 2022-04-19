<?php require_once("../libs/config.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Manual de Usuario</title>
</head>
<body>
    <header class="manual-header manual-header__flex-container">
        <div class="manual-header__flex-item">
            <div class="manual-header__logo-container">
                <div class="manual-header__logo-letras-container">
                    <div class="manual-header__logo-letras">
                        <div class="manual-header__logo-container-letra">
                            <p class="manual-header__logo-letra">S</p>
                        </div>
                        <div class="manual-header__logo-container-letra">
                            <p class="manual-header__logo-letra">I</p>
                        </div>
                        <div class="manual-header__logo-container-letra">
                            <p class="manual-header__logo-letra">A</p>
                        </div>
                        <div class="manual-header__logo-container-letra">
                            <p class="manual-header__logo-letra">F</p>
                        </div>
                    </div>
                </div>
                <div class="manual-header__logo-titulo-container">
                    <p class="manual-header__logo-titulo">Sistema de Inventario a Farmacias</p>
                </div>
            </div>
        </div>
        <div class="manual-header__flex-item">
            <div class="manual-header__title-container">
                <h1 class="manual-header__title">Manual de Usuario</h1>
            </div>
        </div>
    </header>
    <main class="manual-main grid-container-main">
        <div class="manual-main__container-content">
            <h2 class="manual-main__title">Bienvenido</h2>
            <section class="manual-main-content">
                <details class="manual-main-content-gerente-detail manual-main-content__detail">
                    <summary class="manual-main-content__detail-summary">Contenido</summary>
                    <div class="manual-main-content-detail-content">
                        <h3 class="manual-main-content-detail-content__title">Hola,</h3>
                        <p class="manual-main-content-detail-content__text">Espero que te encuentres bien, para poder resolver tu duda por favor selecciona un modulo, tiendo en cuenta que, dependiendo de tu rol y tu necesidad obtendras tu respuesta.</p>
                        <details class="manual-main-content-detail-content__detail">
                            <summary class="manual-main-content-detail-content__summary">Elige un Modulo</summary>
                            <details class="manual-main-content-detail-content__detail">
                                <summary class="manual-main-content-detail-content__summary">Modulo Inicio de Sesi&oacute;n</summary>
                                <p class="manual-main-content-detail-content__summary-text">
                                Para poder entrar al módulo de Inicio de Sesión por favor Ingresar el siguiente link <a target="_black" href="<?php echo(URL_RAIZ);?>login"><?php echo(URL_RAIZ);?>login</a> en la barra de búsquedas de tu navegador.
                                </p>
                                <?php require_once("html/inicioSesion.php") ?>
                            </details>
                            <details class="manual-main-content-detail-content__detail">
                                <summary class="manual-main-content-detail-content__summary">Modulo Productos</summary>
                                <p class="manual-main-content-detail-content__summary-text">
                                    Para poder entrar al módulo de Productos por favor Ingresar el siguiente link <a target="_black" href="<?php echo(URL_RAIZ);?>productos"><?php echo(URL_RAIZ);?>productos</a> en la barra de búsquedas de tu navegador o directamente en el menú principal en la opción de Productos.
                                </p>
                                <?php require_once("html/productos.php") ?>
                            </details>
                            <details class="manual-main-content-detail-content__detail">
                                <summary class="manual-main-content-detail-content__summary">Modulo Inventario</summary>
                                <p class="manual-main-content-detail-content__summary-text">
                                    Para poder entrar al módulo de Inventario por favor Ingresar el siguiente link <a target="_black" href="<?php echo(URL_RAIZ);?>inventarioMenuCards"><?php echo(URL_RAIZ);?>inventarioMenuCards</a> en la barra de búsquedas de tu navegador o directamente en el menú principal en la opción de Inventario.
                                </p>
                                <?php require_once("html/inventario.php") ?>
                            </details>
                            <details class="manual-main-content-detail-content__detail">
                                <summary class="manual-main-content-detail-content__summary">Modulo Ventas</summary>
                                <p class="manual-main-content-detail-content__summary-text">
                                    Para poder entrar al módulo de Ventas por favor Ingresar el siguiente link <a target="_black" href="<?php echo(URL_RAIZ);?>ventasMenuCards"><?php echo(URL_RAIZ);?>ventasMenuCards</a> en la barra de búsquedas de tu navegador o directamente en el menú principal en la opción de Ventas.
                                </p>
                                <?php require_once("html/ventas.php") ?>
                            </details>
                            <details class="manual-main-content-detail-content__detail">
                                <summary class="manual-main-content-detail-content__summary">Modulo Proveedores</summary>
                                <p class="manual-main-content-detail-content__summary-text">
                                    Para poder entrar al módulo de Proveedores por favor Ingresar el siguiente link <a target="_black" href="<?php echo(URL_RAIZ);?>proveedores"><?php echo(URL_RAIZ);?>proveedores</a> en la barra de búsquedas de tu navegador o directamente desde el menú principal en la opción de Proveedores
                                </p>
                                <?php require_once("html/proveedores.php") ?>
                            </details>
                            <details class="manual-main-content-detail-content__detail">
                                <summary class="manual-main-content-detail-content__summary">Modulo Clientes</summary>
                                <p class="manual-main-content-detail-content__summary-text">
                                    Para poder entrar al módulo de clientes por favor Ingresar el siguiente link <a target="_black" href="<?php echo(URL_RAIZ);?>clientes"><?php echo(URL_RAIZ);?>clientes</a> en la barra de búsquedas de tu navegador o directamente desde el menú principal en la opción de Clientes.
                                </p>
                                <?php require_once("html/clientes.php") ?>
                            </details>
                            <details class="manual-main-content-detail-content__detail">
                                <summary class="manual-main-content-detail-content__summary">Modulo Usuarios</summary>
                                <p class="manual-main-content-detail-content__summary-text">
                                    Para poder entrar al módulo de usuarios por favor Ingresar el siguiente link <a target="_black" href="<?php echo(URL_RAIZ);?>usuarios"><?php echo(URL_RAIZ);?>usuarios</a> en la barra de búsquedas de tu navegador o directamente desde el menú principal en la opción de Usuarios (Solo si posees el rol de Gerente)
                                </p>
                                <?php require_once("html/usuarios.php") ?>
                            </details>
                        </details>
                    </div>
                </details>
            </section>
        </div>
    </main>
</body>
</html>