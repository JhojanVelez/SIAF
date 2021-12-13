<header class="nav-container">
    <div class="user-icon-container">
        <img class="user-icon-container__img" src="https://cdnb.20m.es/sites/112/2019/04/cara6-620x618.jpg" alt="usuario IMG">
        <p class="user-icon-container__nombre-usu" >Antonia Gomez</p>
    </div>
    <nav>
        <ul class="nav__ul">
            <li class="nav__li" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>menu">Menu</a></li>
            <li class="nav__li" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>productos">Productos</a></li>
            <li class="nav__li" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>inventarioMenuCards">Inventario</a></li>
            <li class="nav__li" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>ventasMenuCards">Ventas</a></li>
            <li class="nav__li" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>proveedores">Proveedores</a></li>
            <li class="nav__li" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>clientes">Clientes</a></li>
            <li class="nav__li" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>usuarios">Usuarios</a></li>
        </ul>
    </nav>
    <div class="boton-cerrar-sesion-container">
        <a href="login">
            <button class="boton-cerrar-sesion-container__boton boton">
                <div class="sign-out-container">
                    <section class="sign-out-container__img">
                        <img src="<?php echo(URL_RAIZ); ?>public/imagenes/sign-out.svg" alt="sign out">
                    </section>
                    <section class="sign-out-container__text" >
                        CERRAR SESION
                    </section>
                </div>
            </button>
        </a>
    </div>
</header>