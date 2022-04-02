<?php ob_start(); ?>
<li class="nav__li productos" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>productos">Productos</a></li>
<li class="nav__li inventarioMenuCards" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>inventarioMenuCards">Inventario</a></li>
<li class="nav__li ventasMenuCards" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>ventasMenuCards">Ventas</a></li>
<li class="nav__li proveedores" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>proveedores">Proveedores</a></li>
<li class="nav__li clientes" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>clientes">Clientes</a></li>
<li class="nav__li usuarios" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>usuarios">Usuarios</a></li>
<?php 
$navGerente = ob_get_clean();
?>



<?php ob_start(); ?>
<li class="nav__li productos" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>productos">Productos</a></li>
<li class="nav__li inventarioMenuCards" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>inventarioMenuCards">Inventario</a></li>
<li class="nav__li ventasMenuCards" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>ventasMenuCards">Ventas</a></li>
<li class="nav__li proveedores" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>proveedores">Proveedores</a></li>
<li class="nav__li usuarios" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>usuarios">Usuarios</a></li>
<?php 
$navFarmaceuta = ob_get_clean();
?>



<?php ob_start(); ?>
<li class="nav__li productos" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>productos">Productos</a></li>
<li class="nav__li inventarioMenuCards" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>inventarioMenuCards">Inventario</a></li>
<li class="nav__li proveedores" ><a class="nav__a" href="<?php echo(URL_RAIZ); ?>proveedores">Proveedores</a></li>
<?php 
$navAlmacenista = ob_get_clean();
?>


<?php 
if($_SESSION["usuario"]["rol"] == "GERENTE") {
    echo($navGerente);
} else if ($_SESSION["usuario"]["rol"] == "FARMACEUTA") {
    echo($navFarmaceuta);
} else if ($_SESSION["usuario"]["rol"] == "ALMACENISTA") {
    echo($navAlmacenista);
}
?>














