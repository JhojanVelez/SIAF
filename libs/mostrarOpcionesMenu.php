<?php ob_start(); ?>
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
    <button class="card__button card__button--consultar-info-perfil boton">Ver</button>
</section>
<?php 
$menuGerente = ob_get_clean();
?>



<?php ob_start(); ?>
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
    <h2 class="card__title">CONSULTAR TUS DATOS</h2>
    <div class="card__img">
        <img src="<?php echo(URL_RAIZ) ?>public/imagenes/consultar-datos-icono.svg" alt="">
    </div>
    <button class="card__button card__button--consultar-info-perfil boton">Ver</button>
</section>
<?php 
$menuFarmaceuta = ob_get_clean();
?>



<?php ob_start(); ?>
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
    <h2 class="card__title">PROVEEDORES</h2>
    <div class="card__img">
        <img src="<?php echo(URL_RAIZ) ?>public/imagenes/proveedores-icono.svg" alt="">
    </div>
    <button class="card__button boton">
        <a href="proveedores">Ingresar</a>
    </button>
</section>
<section class="card box-shadow">
    <h2 class="card__title">CONSULTAR TUS DATOS</h2>
    <div class="card__img">
        <img src="<?php echo(URL_RAIZ) ?>public/imagenes/consultar-datos-icono.svg" alt="">
    </div>
    <button class="card__button card__button--consultar-info-perfil boton">Ver</button>
</section>
<?php 
$menuAlmacenista = ob_get_clean();
?>


<?php 
if($_SESSION["usuario"]["rol"] == "GERENTE") {
    echo($menuGerente);
} else if ($_SESSION["usuario"]["rol"] == "FARMACEUTA") {
    echo($menuFarmaceuta);
} else if ($_SESSION["usuario"]["rol"] == "ALMACENISTA") {
    echo($menuAlmacenista);
}
?>














