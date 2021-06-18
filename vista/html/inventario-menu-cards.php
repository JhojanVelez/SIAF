<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/inventario-options.css">
</head>
<body>
    <?php
    require("nav.php");
    ?>
    <article class="cards-flex-container">
            <section class="card box-shadow">
                <h2 class="card__title">PRODUCTOS</h2>
                <div class="card__img">
                    <img src="../imagenes/productos-icono.svg" alt="">
                </div>
                <button class="card__button boton">
                    <a href="productos.php">Ingresar</a>
                </button>
            </section>
            <section class="card box-shadow">
                <h2 class="card__title">INVENTARIO</h2>
                <div class="card__img">
                    <img src="../imagenes/inventario-icono.svg" />
                </div>
                <button class="card__button boton">
                    <a href="inventario.php">Ingresar</a>
                </button>
            </section>
        </article>
</body>
</html>