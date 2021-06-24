<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="../css/clientes.css">
</head>
<body>
    <?php
        require_once("nav.php");
    ?>

<main class="clientes grid-container-main">
        <section class="clientes__container-title container-title box-shadow">
            <h1 class="clientes__titulo">Gestiona Tus Clientes</h1>
        </section>


        <section class="clientes__container-filter container-filter box-shadow">
            <div class="clientes__filtro">
                <h2 class="clientes__filtro-titulo">Filtros de busqueda</h2>
                <form class="clientes__filtro-form" action="">
                    <section class="clientes__filtro-input-container">
                        <label class="clientes__filtro-input-label" for="cliente-id">Por el documento de identidad</label>
                        <input type="text" class="clientes__filtro-cliente-id" id="cliente-id" placeholder="Documento">
                    </section>
                    <section class="clientes__filtro-input-container">
                        <label class="clientes__filtro-input-label" for="cliente-nombre">Por su nombre</label>
                        <input type="text" class="clientes__filtro-cliente-nombre" id="cliente-nombre" placeholder="Nombre">
                    </section>
                        <section class="clientes__filtro-input-container">
                        <label class="clientes__filtro-input-label" for="cliente-ciudad">Por su apellido</label>
                        <input type="text" class="clientes__filtro-cliente-nombre" id="cliente-ciudad" placeholder="Apellido">
                    </section>
                </form>
                <div class="clientes__filtro-gen-repo filtro-gen-repo">
                    <div class="clientes__filtro-gen-repo-img filtro-gen-repo-img">
                        <img src="../imagenes/informe.svg" alt="">
                    </div>
                    <a class="clientes__filtro-subtitulo-reporte filtro-subtitulo-reporte" href="">Generar reporte</a>
                </div>
            </div>
        </section>


        <section class="clientes__container-table  box-shadow">
            <div class="clientes__lista-title">
                <h2>Clientes Registrados</h2>
            </div>
            <div class="clientes__lista-contenido box-shadow">
                <figure class="clientes__lista-cliente box-shadow">
                    <div class="clientes__lista-cliente-img">
                        <img src="../imagenes/cliente-icono.svg" alt="">
                    </div>
                    <div class="clientes__lista-cliente-info-container">
                        <section class="clientes__lista-cliente-info documento">
                            <h4 class="clientes__lista-cliente-info-title">DOCUMENTO DE IDENTIDAD</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info telefono">
                            <h4 class="clientes__lista-cliente-info-title">TELEFONO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info nombres">
                            <h4 class="clientes__lista-cliente-info-title">NOMBRES</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info apellidos">
                            <h4 class="clientes__lista-cliente-info-title">APELLIDOS</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info correo">
                            <h4 class="clientes__lista-cliente-info-title">CORREO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info direccion">
                            <h4 class="clientes__lista-cliente-info-title">DIRECCION</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="clientes__lista-cliente-botones">
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
                <figure class="clientes__lista-cliente box-shadow">
                    <div class="clientes__lista-cliente-img">
                        <img src="../imagenes/cliente-icono.svg" alt="">
                    </div>
                    <div class="clientes__lista-cliente-info-container">
                        <section class="clientes__lista-cliente-info documento">
                            <h4 class="clientes__lista-cliente-info-title">DOCUMENTO DE IDENTIDAD</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info telefono">
                            <h4 class="clientes__lista-cliente-info-title">TELEFONO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info nombres">
                            <h4 class="clientes__lista-cliente-info-title">NOMBRES</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info apellidos">
                            <h4 class="clientes__lista-cliente-info-title">APELLIDOS</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info correo">
                            <h4 class="clientes__lista-cliente-info-title">CORREO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info direccion">
                            <h4 class="clientes__lista-cliente-info-title">DIRECCION</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="clientes__lista-cliente-botones">
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
                <figure class="clientes__lista-cliente box-shadow">
                    <div class="clientes__lista-cliente-img">
                        <img src="../imagenes/cliente-icono.svg" alt="">
                    </div>
                    <div class="clientes__lista-cliente-info-container">
                        <section class="clientes__lista-cliente-info documento">
                            <h4 class="clientes__lista-cliente-info-title">DOCUMENTO DE IDENTIDAD</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info telefono">
                            <h4 class="clientes__lista-cliente-info-title">TELEFONO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info nombres">
                            <h4 class="clientes__lista-cliente-info-title">NOMBRES</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info apellidos">
                            <h4 class="clientes__lista-cliente-info-title">APELLIDOS</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info correo">
                            <h4 class="clientes__lista-cliente-info-title">CORREO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info direccion">
                            <h4 class="clientes__lista-cliente-info-title">DIRECCION</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="clientes__lista-cliente-botones">
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
                <figure class="clientes__lista-cliente box-shadow">
                    <div class="clientes__lista-cliente-img">
                        <img src="../imagenes/cliente-icono.svg" alt="">
                    </div>
                    <div class="clientes__lista-cliente-info-container">
                        <section class="clientes__lista-cliente-info documento">
                            <h4 class="clientes__lista-cliente-info-title">DOCUMENTO DE IDENTIDAD</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info telefono">
                            <h4 class="clientes__lista-cliente-info-title">TELEFONO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info nombres">
                            <h4 class="clientes__lista-cliente-info-title">NOMBRES</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info apellidos">
                            <h4 class="clientes__lista-cliente-info-title">APELLIDOS</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info correo">
                            <h4 class="clientes__lista-cliente-info-title">CORREO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info direccion">
                            <h4 class="clientes__lista-cliente-info-title">DIRECCION</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="clientes__lista-cliente-botones">
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
                <figure class="clientes__lista-cliente box-shadow">
                    <div class="clientes__lista-cliente-img">
                        <img src="../imagenes/cliente-icono.svg" alt="">
                    </div>
                    <div class="clientes__lista-cliente-info-container">
                        <section class="clientes__lista-cliente-info documento">
                            <h4 class="clientes__lista-cliente-info-title">DOCUMENTO DE IDENTIDAD</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info telefono">
                            <h4 class="clientes__lista-cliente-info-title">TELEFONO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info nombres">
                            <h4 class="clientes__lista-cliente-info-title">NOMBRES</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info apellidos">
                            <h4 class="clientes__lista-cliente-info-title">APELLIDOS</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info correo">
                            <h4 class="clientes__lista-cliente-info-title">CORREO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info direccion">
                            <h4 class="clientes__lista-cliente-info-title">DIRECCION</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="clientes__lista-cliente-botones">
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
                <figure class="clientes__lista-cliente box-shadow">
                    <div class="clientes__lista-cliente-img">
                        <img src="../imagenes/cliente-icono.svg" alt="">
                    </div>
                    <div class="clientes__lista-cliente-info-container">
                        <section class="clientes__lista-cliente-info documento">
                            <h4 class="clientes__lista-cliente-info-title">DOCUMENTO DE IDENTIDAD</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info telefono">
                            <h4 class="clientes__lista-cliente-info-title">TELEFONO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info nombres">
                            <h4 class="clientes__lista-cliente-info-title">NOMBRES</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info apellidos">
                            <h4 class="clientes__lista-cliente-info-title">APELLIDOS</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info correo">
                            <h4 class="clientes__lista-cliente-info-title">CORREO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info direccion">
                            <h4 class="clientes__lista-cliente-info-title">DIRECCION</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="clientes__lista-cliente-botones">
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
                <figure class="clientes__lista-cliente box-shadow">
                    <div class="clientes__lista-cliente-img">
                        <img src="../imagenes/cliente-icono.svg" alt="">
                    </div>
                    <div class="clientes__lista-cliente-info-container">
                        <section class="clientes__lista-cliente-info documento">
                            <h4 class="clientes__lista-cliente-info-title">DOCUMENTO DE IDENTIDAD</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info telefono">
                            <h4 class="clientes__lista-cliente-info-title">TELEFONO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info nombres">
                            <h4 class="clientes__lista-cliente-info-title">NOMBRES</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info apellidos">
                            <h4 class="clientes__lista-cliente-info-title">APELLIDOS</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info correo">
                            <h4 class="clientes__lista-cliente-info-title">CORREO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info direccion">
                            <h4 class="clientes__lista-cliente-info-title">DIRECCION</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="clientes__lista-cliente-botones">
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
                <figure class="clientes__lista-cliente box-shadow">
                    <div class="clientes__lista-cliente-img">
                        <img src="../imagenes/cliente-icono.svg" alt="">
                    </div>
                    <div class="clientes__lista-cliente-info-container">
                        <section class="clientes__lista-cliente-info documento">
                            <h4 class="clientes__lista-cliente-info-title">DOCUMENTO DE IDENTIDAD</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info telefono">
                            <h4 class="clientes__lista-cliente-info-title">TELEFONO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info nombres">
                            <h4 class="clientes__lista-cliente-info-title">NOMBRES</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info apellidos">
                            <h4 class="clientes__lista-cliente-info-title">APELLIDOS</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info correo">
                            <h4 class="clientes__lista-cliente-info-title">CORREO</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                        <section class="clientes__lista-cliente-info direccion">
                            <h4 class="clientes__lista-cliente-info-title">DIRECCION</h4>
                            <p class="clientes__lista-cliente-data">____________________________________</p>
                        </section>
                    </div>
                    <div class="clientes__lista-cliente-botones">
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/editar-icono.svg" alt="">
                            </div>
                            <span>Editar</span>
                        </button>
                        <button class="clientes__lista-cliente-boton boton">
                            <div class="clientes__lista-cliente-boton-img">
                                <img src="../imagenes/delete-icono.svg" alt="">
                            </div>
                            <span>Inhabilitar</span>
                        </button>
                    </div>
                </figure>
            </div>
        </section>


        <section class="clientes__container-botones container-botones box-shadow">
            <section class="clientes__container-boton">
                <button class="clientes__boton-agregar boton">
                    A&ntilde;adir
                </button>
            </section>
            <section class="clientes__container-boton">
                <button class="clientes__boton-agregar boton">
                    Ver clientes inhabilitados
                </button>
            </section>
        </section>
    </main>
</body>
</html>