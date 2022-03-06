<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/inicio-sesion.css" />
    <title>Inicio Sesion</title>
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
</head>

<body>
    <main>
        <div class="iniciar-sesion">

            <section class="iniciar-sesion__container">
                <div class="iniciar-sesion__logo-container">
                    <div class="iniciar-sesion__logo-letras-container">
                        <div class="iniciar-sesion__logo-letras">
                            <div class="iniciar-sesion__logo-letra">S</div>
                            <div class="iniciar-sesion__logo-letra">I</div>
                            <div class="iniciar-sesion__logo-letra">A</div>
                            <div class="iniciar-sesion__logo-letra">F</div>
                        </div>
                    </div>
                    <div class="iniciar-sesion__logo-titulo-container">
                        <p class="iniciar-sesion__logo-titulo">Sistema de Inventario a Farmacias</p>
                    </div>
                </div>
            </section>

            <section class="iniciar-sesion__container">
                <div class="iniciar-sesion__flex-container box-shadow">
                    <div class="iniciar-sesion__container-form">
                        <h1 class="iniciar-sesion__titulo">Inicia Sesion</h1>
                        <form 
                        class="iniciar-sesion__form"
                        >
                            <input 
                            name="documentoUsuario" 
                            placeholder="Documento de identidad" 
                            class="inicio-sesion__input-nombre-usuario"     
                            type="text"
                            >
                            <br />
                            <input 
                            name="passwordUsuario" 
                            placeholder="Contrase&ntilde;a" 
                            class="inicio-sesion__input-contrasenia-usuario" 
                            type="password"
                            >
                            <br />
                            <select 
                            name="rolUsuario"
                            class="inicio-sesion__select-rol-usuario" 
                            >
                                <option value="">Rol</option>
                                <option value="GERENTE">Gerente</option>
                                <option value="ALMACENISTA">Almacenista</option>
                                <option value="FARMACEUTA">Farmaceuta</option>
                            </select>
                            <br />
                            <input class="iniciar-sesion__boton-ingresar boton" value="Iniciar Sesion" type="button">
                        </form>
                        <a class="inicio-sesion__a-olvidaste-contrasenia" href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </section>
        </div>



        <div class="restablecer-contrasenia transparent-container-modal">
            <dialog class="restablecer-contrasenia__dialog restablecer-contrasenia__dialog--1" open>
                <span class="restablecer-contrasenia__dialog-cerrar dialog-btn-cerrar">X</span>
                <h2 class="restablecer-contrasenia__titulo">Ingresa Tu Correo Electronico</h2>
                <form class="restablecer-contrasenia__form-1">
                    <input placeholder="Correo Electronico" class="restablecer-contrasenia__input-email"
                        name="emailRestablecerContrasenia" type="email">
                    <br>
                </form>
                <button class="restablecer-contrasenia__boton-verificar restablecer-contrasenia__boton-verificar--correo boton">Verificar</button>
                <p class="restablecer-contrasenia__parrafo"><b>NOTA:</b> El correo debe estar registrado en el sistema
                </p>
            </dialog>



            <dialog class="restablecer-contrasenia__dialog restablecer-contrasenia__dialog--2" open>
                <span
                    class="restablecer-contrasenia__dialog-atras restablecer-contrasenia__dialog-atras--dialog--2">&#8617</span>
                <span class="restablecer-contrasenia__dialog-cerrar dialog-btn-cerrar">X</span>
                <h2 class="restablecer-contrasenia__titulo">Codigo de Verificación</h2>
                <form class="restablecer-contrasenia__form-2">
                    <input autocomplete="off" maxlength="1" class="restablecer-contrasenia__input-valor"
                        name="valor1RestablecerContrasenia" type="text" autofocus>
                    <input autocomplete="off" maxlength="1" class="restablecer-contrasenia__input-valor"
                        name="valor2RestablecerContrasenia" type="text">
                    <input autocomplete="off" maxlength="1" class="restablecer-contrasenia__input-valor"
                        name="valor3RestablecerContrasenia" type="text">
                    <input autocomplete="off" maxlength="1" class="restablecer-contrasenia__input-valor"
                        name="valor4RestablecerContrasenia" type="text">
                    <br>
                </form>
                <p class="restablecer-contrasenia__parrafo">Se te ha enviado un código de verificación a
                    tu correo, ingrésalo para poder restablecer tu contraseña de acceso</p>
                <button
                    class="restablecer-contrasenia__boton-verificar restablecer-contrasenia__boton-verificar--codigo boton">Verificar</button>
            </dialog>




            <dialog class="restablecer-contrasenia__dialog restablecer-contrasenia__dialog--3" open>
                <span
                    class="restablecer-contrasenia__dialog-atras restablecer-contrasenia__dialog-atras--dialog--3">&#8617</span>
                <span class="restablecer-contrasenia__dialog-cerrar dialog-btn-cerrar">X</span>
                <h2 class="restablecer-contrasenia__titulo">Ingresa Tu Nueva Contraseña</h2>
                <form class="restablecer-contrasenia__form-3">
                    <input class="restablecer-contrasenia__input-contraseña" name="nuevaContraseña"
                        placeholder="Contraseña" type="password">
                    <br>
                    <input class="restablecer-contrasenia__input-contraseña" name="confirmacionNuevaContraseña"
                        placeholder="Confirmar Contraseña" type="password">
                </form>
                <button
                    class="restablecer-contrasenia__boton-verificar restablecer-contrasenia__boton-verificar--restablecer-contraseña boton">Restablecer</button>
            </dialog>
        </div>
    </main>

    <!-- SCRIPTS JS -->
    <script> 
        /* Se puso var porque queremos que pueda usarse en todos los contextos, 
        independientemente de si esta en una funcion anonima autoejecutable */
        var URL_RAIZ = "<?php echo URL_RAIZ ?>"
    </script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_login_restablecer_password.js" type="module"></script>
    <script src="<?php echo(URL_RAIZ); ?>public/js/modulo_login_iniciar_sesion.js" type="module"></script>


</body>

</html>