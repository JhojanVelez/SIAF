<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link rel="stylesheet" href="../css/proveedores.css">
</head>
<body>
    <?php
        require_once("nav.php");
    ?>

<main class="proveedores grid-container-main">
        <section class="proveedores__container-title container-title box-shadow">
            <h1 class="proveedores__titulo">Gestiona Tus Proveedores</h1>
        </section>


        <section class="proveedores__container-filter container-filter box-shadow">
            <div class="proveedores__filtro filtro">
                <h2 class="proveedores__filtro-titulo filtro-title">Filtros de busqueda</h2>
                <form class="proveedores__filtro-form filtro-form" action="">
                    <section class="proveedores__filtro-input-container">
                        <label class="proveedores__filtro-input-label filtro-label" for="proveedor-id">Por el NIT</label>
                        <input type="text" class="proveedores__filtro-proveedor-id" id="proveedor-id" placeholder="NIT">
                    </section>
                    <section class="proveedores__filtro-input-container">
                        <label class="proveedores__filtro-input-label filtro-label" for="proveedor-nombre">Por su nombre</label>
                        <input type="text" class="proveedores__filtro-proveedor-nombre" id="proveedor-nombre" placeholder="Nombre">
                    </section>
                        <section class="proveedores__filtro-input-container">
                        <label class="proveedores__filtro-input-label filtro-label" for="proveedor-ciudad">Por ciudad</label>
                        <input type="text" class="proveedores__filtro-proveedor-nombre" id="proveedor-ciudad" placeholder="Ciudad">
                    </section>
                </form>
                <div class="proveedores__filtro-gen-repo filtro-gen-repo">
                    <div class="proveedores__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="../imagenes/informe.svg" alt="">
                    </div>
                    <a class="proveedores__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="proveedores__container-table contenedor-objetos  box-shadow">
            <div class="proveedores__lista-title contenedor-objetos__title">
                <h2>Proveedores Registrados</h2>
            </div>
            <div class="proveedores__lista-contenido contenedor-objetos__contenido box-shadow">
                <figure class="proveedores__lista-proveedor contenedor-objetos__objeto box-shadow">
                    <div class="proveedores__lista-proveedor-img contenedor-objetos__objeto-img">
                        <img src="../imagenes/proveedor-icono.svg" alt="">
                    </div>
                    <div class="proveedores__lista-proveedor-info-container">
                        <section class="proveedores__lista-proveedor-info nit">
                            <h4 class="proveedores__lista-proveedor-info-title">NIT</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                        <section class="proveedores__lista-proveedor-info nombre">
                            <h4 class="proveedores__lista-proveedor-info-title">NOMBRE</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                        <section class="proveedores__lista-proveedor-info telefono">
                            <h4 class="proveedores__lista-proveedor-info-title">TELEFONO</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                        <section class="proveedores__lista-proveedor-info correo">
                            <h4 class="proveedores__lista-proveedor-info-title">CORREO</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                        <section class="proveedores__lista-proveedor-info direccion">
                            <h4 class="proveedores__lista-proveedor-info-title">DIRECCION</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                        <section class="proveedores__lista-proveedor-info ciudad">
                            <h4 class="proveedores__lista-proveedor-info-title">CIUDAD</h4>
                            <p class="proveedores__lista-proveedor-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="proveedores__lista-proveedor-botones contenedor-objetos__objeto-botones">
                        <button class="proveedores__lista-proveedor-boton boton contenedor-objetos__objeto-boton">
                            <div class="proveedores__lista-proveedor-boton-img">
                                <img src="../imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="proveedores__lista-proveedor-boton boton contenedor-objetos__objeto-boton">
                            <div class="proveedores__lista-proveedor-boton-img">
                                <img src="../imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
            </div>
        </section>


        <section class="proveedores__container-botones container-botones box-shadow">
            <section class="proveedores__container-boton contenedor-objetos__objeto-boton">
                <button class="proveedores__boton-agregar boton">
                    A&ntilde;adir
                </button>
            </section>
            <section class="proveedores__container-boton contenedor-objetos__objeto-boton">
                <button class="proveedores__boton-inhabilitar boton">
                    Ver proveedores inhabilitados
                </button>
            </section>
        </section>
    </main>
</body>
</html>