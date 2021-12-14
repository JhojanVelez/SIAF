<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo(URL_RAIZ) ?>public/css/menu.css">
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
    <title>Menu Principal</title>
</head>
<body>
    <header class="nav-container">
        <div class="user-icon-container">
            <img class="user-icon-container__img" src="https://cdnb.20m.es/sites/112/2019/04/cara6-620x618.jpg" alt="usuario IMG">
            <p class="user-icon-container__nombre-usu" >Antonia Gomez</p>
        </div>
        <h2 class="menu-nav-title">SIAF</h2>
        <div class="boton-cerrar-sesion-container">
            <a href="login">
                <button class="boton-cerrar-sesion-container__boton boton">
                    <div class="sign-out-container">
                        <section class="sign-out-container__img">
                            <img src="<?php echo(URL_RAIZ) ?>public/imagenes/sign-out.svg" alt="sign out">
                        </section>
                        <section class="sign-out-container__text" >
                            CERRAR SESION
                        </section>
                    </div>
                </button>
            </a>
        </div>
    </header>
    <main>
        <article class="cards-flex-container">
            <section class="card box-shadow">
                <h2 class="card__title">PRODUCTOS</h2>
                <div class="card__img">
                    <img src="<?php echo(URL_RAIZ) ?>public/imagenes/productos-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="productos">Ingresar</a>
                </button>
            </section>
            <section class="card box-shadow">
                <h2 class="card__title">INVENTARIO</h2>
                <div class="card__img">
                    <img src="<?php echo(URL_RAIZ) ?>public/imagenes/inventario-icono.svg" />
                </div>
                <button class="card__button boton">
                    <a href="inventarioMenuCards">Ingresar</a>
                </button>
            </section>
            <section class="card box-shadow">
                <h2 class="card__title">VENTAS</h2>
                <div class="card__img">
                    <img src="<?php echo(URL_RAIZ) ?>public/imagenes/ventas-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="ventasMenuCards">Ingresar</a>
                </button>
            </section>
            <section class="card box-shadow">
                <h2 class="card__title">PROVEEDORES</h2>
                <div class="card__img">
                    <img src="<?php echo(URL_RAIZ) ?>public/imagenes/proveedores-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="proveedores">Ingresar</a>
                </button>
            </section>
            <section class="card box-shadow">
                <h2 class="card__title">CLIENTES</h2>
                <div class="card__img">
                    <img src="<?php echo(URL_RAIZ) ?>public/imagenes/clientes-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="clientes">Ingresar</a>
                </button>
            </section>
            <section class="card box-shadow">
                <h2 class="card__title">USUARIOS</h2>
                <div class="card__img">
                    <img src="<?php echo(URL_RAIZ) ?>public/imagenes/gestion-usuarios-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="usuarios">Ingresar</a>
                </button>
            </section>
            <section class="card box-shadow">
                <h2 class="card__title">CONSULTAR TUS DATOS</h2>
                <div class="card__img">
                    <img src="<?php echo(URL_RAIZ) ?>public/imagenes/consultar-datos-icono.svg" alt="">
                </div>
                <button class="card__button card__button--consultar-info-perfil boton">
                    <a href="#">Ingresar</a>
                </button>
            </section>
        </article>

        <section class="menu-info-usuario-container-modal transparent-container-modal">
            <dialog class="menu-info-usuario-modal">
                <span class="menu-info-usuario-modal__btn-cerrar dialog-btn-cerrar">X</span>
                <h2 class="menu-info-usuario-modal__title dialog-title">Consulta Tus Datos</h2>
                <div class="menu-info-usuario-modal__container-img">
                    <img src="https://i.pinimg.com/736x/9d/0f/c9/9d0fc97fd6a11bb8fdcc9af217a0b38b.jpg" alt="">
                </div>
                <div class="menu-info-usuario-modal__container-info dialog-main-content">
                    <section class="menu-info-usuario-modal__perfil-info-item">
                        <h3>NUMERO DE DOCUMENTO</h3>
                        <p>___________________________________</p>
                    </section>
                    <section class="menu-info-usuario-modal__perfil-info-item">
                        <h3>TELEFONO</h3>
                        <p>___________________________________</p>
                    </section>
                    <section class="menu-info-usuario-modal__perfil-info-item">
                        <h3>EPS</h3>
                        <p>___________________________________</p>
                    </section>
                    <section class="menu-info-usuario-modal__perfil-info-item">
                        <h3>NOMBRES</h3>
                        <p>___________________________________</p>
                    </section>
                    <section class="menu-info-usuario-modal__perfil-info-item">
                        <h3>CORREO</h3>
                        <p>___________________________________</p>
                    </section>
                    <section class="menu-info-usuario-modal__perfil-info-item">
                        <h3>RH</h3>
                        <p>___________________________________</p>
                    </section>
                    <section class="menu-info-usuario-modal__perfil-info-item">
                        <h3>APELLIDOS</h3>
                        <p>___________________________________</p>
                    </section>
                    <section class="menu-info-usuario-modal__perfil-info-item">
                        <h3>DIRECCION</h3>
                        <p>___________________________________</p>
                    </section>
                </div>
            </dialog>
        </section>
    </main>
    
    <script src="<?php echo(URL_RAIZ) ?>public/js/modulo_menu_consultar_info_perfil.js"></script>
</body>
</html>