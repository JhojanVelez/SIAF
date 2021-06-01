<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Menu Pricipal</title>
</head>
<body>
    <header class="nav-container">
        <div class="user-icon-container">
            <img class="user-icon-container__img" src="https://cdnb.20m.es/sites/112/2019/04/cara6-620x618.jpg" alt="usuario IMG">
            <p class="user-icon-container__nombre-usu" >Antonia Gomez</p>
        </div>
        <div class="menu-nav-title">
            <h2>SIAF</h2>
        </div>
        <div class="boton-cerrar-sesion-container">
            <button class="boton-cerrar-sesion-container__boton boton">
                <div class="sign-out-container">
                    <section class="sign-out-container__img">
                        <img src="../imagenes/sign-out.png" alt="sign out">
                    </section>
                    <section class="sign-out-container__text" >
                        CERRAR SESION
                    </section>
                </div>
            </button>
        </div>
    </header>
    <main>
        <article class="cards-grid">
            <section class="card">
                <h2 class="card__title">GESTION DE PRODUCTOS</h2>
                <div class="card__img">
                    <img src="../imagenes/productos-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="productos.php">Ingresar</a>
                </button>
            </section>
            <section class="card">
                <h2 class="card__title">INVENTARIO</h2>
                <div class="card__img">
                    <img src="../imagenes/inventario-icono.svg" />
                </div>
                <button class="card__button boton">
                    <a href="inventario.php">Ingresar</a>
                </button>
            </section>
            <section class="card">
                <h2 class="card__title">GESTION DE VENTAS</h2>
                <div class="card__img">
                    <img src="../imagenes/ventas-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="ventas.php">Ingresar</a>
                </button>
            </section>
            <section class="card">
                <h2 class="card__title">NUESTROS PROVEEDORES</h2>
                <div class="card__img">
                    <img src="../imagenes/proveedores-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="proveedores.php">Ingresar</a>
                </button>
            </section>
            <section class="card">
                <h2 class="card__title">NUESTROS CLIENTES</h2>
                <div class="card__img">
                    <img src="../imagenes/clientes-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="clientes.php">Ingresar</a>
                </button>
            </section>
            <section class="card">
                <h2 class="card__title">GESTION DE USUARIOS</h2>
                <div class="card__img">
                    <img src="../imagenes/gestion-usuarios-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="usuarios.php">Ingresar</a>
                </button>
            </section>
            <section class="card">
                <h2 class="card__title">CONSULTAR TUS DATOS</h2>
                <div class="card__img">
                    <img src="../imagenes/consultar-datos-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="">Ingresar</a>
                </button>
            </section>
            <section class="card">
                <h2 class="card__title">REPORTES</h2>
                <div class="card__img">
                    <img src="../imagenes/reportes-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="reportes.php">Ingresar</a>
                </button>
            </section>
        </article>
    </main>
</body>
</html>