<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrar-ventas</title>
    <link rel="stylesheet" href="../css/ventas-registrar.css">
</head>
<body>
    <?php
    require("nav.php");
    ?>
    <main class="registrar-ventas grid-container-main">
        <section class="registrar-ventas__container-title container-title box-shadow">
            <h1 class="registrar-ventas__titulo">Registra tus Ventas</h1>
        </section>

        <section class="registrar-ventas__container-lista-productos  box-shadow">
            <div class="registrar-ventas__lista-productos-title">
                <h2>Productos Para Vender</h2>
            </div>
            <div class="registrar-ventas__lista-productos-contenido box-shadow">
                <figure class="registrar-ventas__lista-producto box-shadow">
                    <div class="registrar-ventas__lista-producto-img">
                        <img src="../imagenes/corazon-icono.svg" alt="">
                    </div>
                    <div class="registrar-ventas__lista-producto-info">
                        <h4 class="registrar-ventas__lista-producto-info-title">CODIGO</h4>
                        <p class="registrar-ventas__lista-producto-data">5236548548</p>
                        <h4 class="registrar-ventas__lista-producto-info-title">NOMBRE DE PRODUCTO</h4>
                        <p class="registrar-ventas__lista-producto-data">Acetaminofen del carmen</p>
                        <h4 class="registrar-ventas__lista-producto-info-title">CANTIDAD</h4>
                        <p class="registrar-ventas__lista-producto-data">56</p>
                    </div>
                    <div class="registrar-ventas__lista-producto-precios">
                        <section class="registrar-ventas__lista-producto-precio">
                            <h4>PRECIO UNIDAD</h4>
                            <p> <strong>$0000</strong></p>
                        </section>
                        <section class="registrar-ventas__lista-producto-precio">
                            <h4>PRECIO TOTAL</h4>
                            <p><strong>$0000</strong></p>
                        </section>
                    </div>
                    <div class="registrar-ventas__lista-producto-botones">
                        <section class="registrar-ventas__lista-producto-boton">
                            <img src="../imagenes/editar-icono.svg" alt="">
                        </section>
                        <section class="registrar-ventas__lista-producto-boton">
                            <img src="../imagenes/delete-icono.svg" alt="">
                        </section>
                    </div>
                </figure>
            </div>
            <div class="registrar-ventas__lista-productos-totales">
                <section class="registrar-ventas__total">
                    <h3>Cantidad Total</h3>
                    <p>58</p>
                </section>
                <section class="registrar-ventas__total">
                    <h3>Precio Total</h3>
                    <p>$ 56000</p>
                </section>
            </div>
        </section>


        <section class="registrar-ventas__container-registro container-filter  box-shadow">
            <div class="registrar-ventas__registro">
                <form class="registrar-ventas__registro-form" action="">
                    <label class="registrar-ventas__registro-label" for="producto-id">Codigo de barras del producto</label>
                    <input type="text" class="registrar-ventas_registro-id" id="producto-id">
                    <label class="registrar-ventas__registro-label" for="producto-nombre">Nombre del producto</label>
                    <select class="registrar-ventas_registro-nombre" id="producto-nombre">
                        <option>Producto</option>
                    </select>
                    <div class="registrar-ventas__container-cant">
                        <label class="registrar-ventas__registro-label" for="product-cantidad">Cantidad</label>
                    <input type="number" class="registrar-ventas_registro-cantidad" id="product-cantidad">
                    </div>
                    <button class="registrar-ventas__registro-boton-buscar-producto boton">Ver Productos</button>
                    <button class="registrar-ventas__registro-boton-agregar boton">
                    </button>
                </form>
            </div>
        </section>


        <section class="registrar-ventas__container-botones container-botones box-shadow">
            <section class="registrar-ventas__container-boton">
                <button class="registrar-ventas__boton-ver-inhabilitados boton" >
                    Cancelar Venta
                </button>
            </section>
            <section class="registrar-ventas__container-boton">
                <button type="button" class="registrar-ventas__boton-inhabilitar boton" value="Vender">
                    Vender
                </button>
            </section>
        </section>
    </main>
</body>
</html>