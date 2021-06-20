<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="../css/main.css">
    <style>
        .cards-flex-container {
            width: 70%;
        }
    </style>
</head>
<body>
    <?php
    require_once("nav.php");
    ?>
    <main>
        <article class="cards-flex-container">
                <section class="card box-shadow">
                    <h2 class="card__title">REGISTRAR VENTAS</h2>
                    <div class="card__img">
                        <img src="../imagenes/ventas-registrar-ventas.svg" alt="">
                    </div>
                    <button class="card__button boton">
                        <a href="inventario-salidas.php">Ingresar</a>
                    </button>
                </section>
                <section class="card box-shadow">
                    <h2 class="card__title">CONSULTAR VENTAS</h2>
                    <div class="card__img">
                        <img src="../imagenes/ventas-consultar-ventas.svg" />
                    </div>
                    <button class="card__button boton">
                        <a href="ventas-consultar-ventas.php">Ingresar</a>
                    </button>
                </section>
        </article>
    </main>
    
</body>
</html>