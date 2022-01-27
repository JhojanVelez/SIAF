<header class="nav-container">
    <div class="user-icon-container">
        <figure class="user-icon-container__img-usu-container" >
            <img class="user-icon-container__img" src="fotosEmpleados/default_1.jpeg" alt="usuario IMG">
        </figure>
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