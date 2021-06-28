<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usuarios</title>
    <link rel="stylesheet" href="../css/usuarios.css">
</head>
<body>
    <?php
        require_once("nav.php");
    ?>

<main class="usuarios grid-container-main">
        <section class="usuarios__container-title container-title box-shadow">
            <h1 class="usuarios__titulo">Gestiona Tus Usuarios</h1>
        </section>


        <section class="usuarios__container-filter container-filter box-shadow">
            <div class="usuarios__filtro filtro">
                <h2 class="usuarios__filtro-titulo filtro-title">Filtros de busqueda</h2>
                <form class="usuarios__filtro-form filtro-form" action="">
                    <section class="usuarios__filtro-input-container">
                        <label class="usuarios__filtro-input-label filtro-label" for="usuario-id">Por el documento de identidad</label>
                        <input type="text" class="usuarios__filtro-usuario-id" id="usuario-id" placeholder="Documento">
                    </section>
                    <section class="usuarios__filtro-input-container">
                        <label class="usuarios__filtro-input-label filtro-label" for="usuario-nombre">Por su nombre</label>
                        <input type="text" class="usuarios__filtro-usuario-nombre" id="usuario-nombre" placeholder="Nombre">
                    </section>
                    <section class="usuarios__filtro-input-container">
                        <label class="usuarios__filtro-input-label filtro-label" for="usuario-ciudad">Por su apellido</label>
                        <input type="text" class="usuarios__filtro-usuario-nombre" id="usuario-ciudad" placeholder="Apellido">
                    </section>
                </form>
                <div class="usuarios__filtro-gen-repo filtro-gen-repo">
                    <div class="usuarios__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="../imagenes/informe.svg" alt="">
                    </div>
                    <a class="usuarios__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="usuarios__container-table contenedor-objetos  box-shadow">
            <div class="usuarios__lista-title contenedor-objetos__title">
                <h2>Usuarios Registrados</h2>
            </div>
            <div class="usuarios__lista-contenido contenedor-objetos__contenido box-shadow">
                <figure class="usuarios__lista-usuario contenedor-objetos__objeto box-shadow">
                    <div class="usuarios__lista-usuario-img contenedor-objetos__objeto-img">
                        <img src="https://cdn.forbes.com.mx/2019/04/blackrrock-invertir-1-640x360.jpg" alt="">
                    </div>
                    <div class="usuarios__lista-usuario-info-container">
                        <section class="usuarios__lista-usuario-info documento">
                            <h4 class="usuarios__lista-usuario-info-title">DOCUMENTO DE IDENTIDAD</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info nombres">
                            <h4 class="usuarios__lista-usuario-info-title">NOMBRES</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info apellidos">
                            <h4 class="usuarios__lista-usuario-info-title">APELLIDOS</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info eps">
                            <h4 class="usuarios__lista-usuario-info-title">EPS</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info telefono">
                            <h4 class="usuarios__lista-usuario-info-title">TELEFONO</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info correo">
                            <h4 class="usuarios__lista-usuario-info-title">CORREO</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info direccion">
                            <h4 class="usuarios__lista-usuario-info-title">DIRECCION</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info rh">
                            <h4 class="usuarios__lista-usuario-info-title">RH</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info rol">
                            <h4 class="usuarios__lista-usuario-info-title">ROL</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                        <section class="usuarios__lista-usuario-info password">
                            <h4 class="usuarios__lista-usuario-info-title">CONTRASE&Ntilde;A</h4>
                            <p class="usuarios__lista-usuario-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="usuarios__lista-usuario-botones contenedor-objetos__objeto-botones">
                        <button class="usuarios__lista-usuario-boton contenedor-objetos__objeto-boton boton">
                            <div class="usuarios__lista-usuario-boton-img">
                                <img src="../imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="usuarios__lista-usuario-boton contenedor-objetos__objeto-boton boton">
                            <div class="usuarios__lista-usuario-boton-img">
                                <img src="../imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
            </div>
        </section>


        <section class="usuarios__container-botones container-botones box-shadow">
            <section class="usuarios__container-boton">
                <button class="usuarios__boton-agregar boton">
                    A&ntilde;adir
                </button>
            </section>
            <section class="usuarios__container-boton">
                <button class="usuarios__boton-inhabilitar boton">
                    Ver usuarios inhabilitados
                </button>
            </section>
        </section>
    </main>
</body>
</html>