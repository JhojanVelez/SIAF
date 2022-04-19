<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo(URL_RAIZ); ?>public/css/inicio-sesion.css" />
    <title>Inicio Sesi&oacute;n</title>
    <link rel="shortcut icon" href="<?php echo(URL_FAVICON); ?>" type="image/x-icon">
</head>

<body>
    <main>
        <div class="iniciar-sesion">
            
            <div class="iniciar-sesion-modal-bienvenido">
                <div class="iniciar-sesion-modal-bienvenido__blanco"></div>
                <div class="iniciar-sesion-modal-bienvenido__morado">
                    <figure class="iniciar-sesion-modal-bienvenido__text-container">
                        <h2 class="iniciar-sesion-modal-bienvenido__text" >Bienvenido</h2>
                    </figure>
                </div>
            </div>

            <section class="iniciar-sesion__container">
                <div class="iniciar-sesion__logo-container">
                    <div class="iniciar-sesion__logo-letras-container">
                        <div class="iniciar-sesion__logo-letras">
                            <div class="iniciar-sesion__logo-container-letra">
                                <p class="iniciar-sesion__logo-letra">S</p>
                            </div>
                            <div class="iniciar-sesion__logo-container-letra">
                                <p class="iniciar-sesion__logo-letra">I</p>
                            </div>
                            <div class="iniciar-sesion__logo-container-letra">
                                <p class="iniciar-sesion__logo-letra">A</p>
                            </div>
                            <div class="iniciar-sesion__logo-container-letra">
                                <p class="iniciar-sesion__logo-letra">F</p>
                            </div>
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
                        <h1 class="iniciar-sesion__titulo">Inicia Sesi&oacute;n</h1>
                        <form 
                        class="iniciar-sesion__form"
                        >
                            <input 
                            name="documentoUsuario" 
                            placeholder="Documento de identidad" 
                            class="inicio-sesion__input-nombre-usuario"     
                            type="text"
                            data-input
                            >
                            <br />
                            <input 
                            name="passwordUsuario" 
                            placeholder="Contrase&ntilde;a" 
                            class="inicio-sesion__input-contrasenia-usuario" 
                            type="password"
                            data-input
                            >
                            <br />
                            <select 
                            name="rolUsuario"
                            class="inicio-sesion__select-rol-usuario" 
                            data-input
                            >
                                <option value="">Rol</option>
                                <option value="GERENTE">Gerente</option>
                                <option value="ALMACENISTA">Almacenista</option>
                                <option value="FARMACEUTA">Farmaceuta</option>
                            </select>
                            <br />
                            <input class="iniciar-sesion__boton-ingresar boton" value="Iniciar Sesi&oacute;n" type="button">
                        </form>
                        <a class="inicio-sesion__a-olvidaste-contrasenia">¿Olvidaste tu contraseña?</a>
                    </div>

                    <div class="iniciar-sesion-error-container">
                        <div class="iniciar-sesion-error-container__text-container box-shadow">
                            <h2>Upps ...</h2>
                            <p>No fue posible encontrarte en el sistema, por favor int&eacute;ntalo de nuevo</p>
                        </div>
                        <br>
                        <figure class="iniciar-sesion-error-container__img">
                            <img src="<?php echo(URL_RAIZ.'public/imagenes/doctor.png') ?>" alt="">
                        </figure>
                    </div>
                </div>
            </section>
        </div>



        <div class="restablecer-contrasenia transparent-container-modal">
            <dialog class="restablecer-contrasenia__dialog restablecer-contrasenia__dialog--1">
                <span class="restablecer-contrasenia__dialog-cerrar dialog-btn-cerrar">X</span>
                <h2 class="restablecer-contrasenia__titulo dialog-title">Ingresa Algunos Datos ...</h2>
                <form class="restablecer-contrasenia__form-1 restablecer-contrasenia__form">
                    <input
                    name="documentoUsuario"
                    type="text" 
                    placeholder="Numero de Documento"
                    data-input
                    >
                    <input 
                    name="correoUsuario"
                    placeholder="Correo Electronico" 
                    class="restablecer-contrasenia__input-email" 
                    type="email"
                    data-input
                    >
                    <br>
                </form>
                <br>
                <div class="dialog-container-bts">
                    <button class="restablecer-contrasenia__boton-verificar restablecer-contrasenia__boton-verificar--info boton">Verificar</button>
                </div>
                <br>
                <p class="restablecer-contrasenia__parrafo"><b>NOTA:</b> La informaci&oacute;n ingresada debe estar registrada en el sistema.</p>
            </dialog>

            <dialog class="restablecer-contrasenia-dialog-1-result-fallo dialog-process-result">
                <h2>Lo sentimos ...</h2>
                <p>Los datos ingresados no existen</p>
                <button class="restablecer-contrasenia-dialog-1-result-fallo__boton dialog-process-result__btn boton" >Volver</button>
            </dialog>


            <dialog class="restablecer-contrasenia__dialog restablecer-contrasenia__dialog--2">
                <span class="restablecer-contrasenia__dialog-cerrar dialog-btn-cerrar">X</span>
                <h2 class="restablecer-contrasenia__titulo dialog-title">Codigo de Verificaci&oacute;n</h2>
                <form class="restablecer-contrasenia__form-2 restablecer-contrasenia__form">
                    <input 
                    name="valor1RestablecerContrasenia" 
                    autocomplete="off" 
                    maxlength="1" 
                    class="restablecer-contrasenia__input-valor"
                    type="text" 
                    autofocus
                    >
                    <input 
                    name="valor2RestablecerContrasenia" 
                    autocomplete="off" 
                    maxlength="1" 
                    class="restablecer-contrasenia__input-valor" 
                    type="text"
                    >
                    <input 
                    name="valor3RestablecerContrasenia" 
                    autocomplete="off" 
                    maxlength="1" 
                    class="restablecer-contrasenia__input-valor"
                    type="text"
                    >
                    <input 
                    name="valor4RestablecerContrasenia" 
                    autocomplete="off" 
                    maxlength="1" 
                    class="restablecer-contrasenia__input-valor"
                    type="text"
                    >
                </form>
                <br>
                <br>
                <p class="restablecer-contrasenia__parrafo">Se te ha enviado un c&oacute;digo de verificaci&oacute;n a tu correo, ingr&eacute;salo para poder restablecer tu contraseña de acceso</p>
                <br>
                <br>
                <div class="dialog-container-bts">
                    <button class="restablecer-contrasenia__boton-verificar restablecer-contrasenia__boton-verificar--codigo boton">Verificar</button>
                </div>
            </dialog>




            <dialog class="restablecer-contrasenia__dialog restablecer-contrasenia__dialog--3">
                <span class="restablecer-contrasenia__dialog-cerrar dialog-btn-cerrar">X</span>
                <h2 class="restablecer-contrasenia__titulo dialog-title">Ingresa Tu Nueva Contraseña</h2>
                <form class="restablecer-contrasenia__form-3">
                    <section class="restablecer-contrasenia-form-3__input-1-container">
                        <input 
                        class="restablecer-contrasenia__input-contraseña" 
                        name="passwordUsuario"
                        placeholder="Contraseña" 
                        type="password"
                        >
                        <figure class="restablecer-contrasenia-dialog-3-alert-password">
                            <div class="restablecer-contrasenia-dialog-3-alert-password__alert box-shadow">
                                <h4 class="restablecer-contrasenia-dialog-3-alert-password__alert-title">Recuerda...</h4>
                                <p class="restablecer-contrasenia-dialog-3-alert-password__alert-text">Una contraseña segura debe cumplir como m&iacute;nimo los siguientes par&aacute;metros:</p>
                                <ul class="restablecer-contrasenia-dialog-3-alert-password__alert-list-ul">
                                    <li>Debe contener como m&iacute;nimo 8 caracteres.</li>
                                    <li>Debe contener por lo menos 1 letra min&uacute;scula.</li>
                                    <li>Debe contener por lo menos 1 letra MAY&Uacute;SCULA.</li>
                                    <li>Debe contener por lo menos 1 d&iacute;gito del 0 al 9.</li>
                                    <li>Debe contener por lo menos un car&aacute;cter especial como por ejemplo(! " # $ % & ' ( ) * + , - . / : ; < = > ? @ [ \ ] ^ _` { | } ~ ).</li>
                                </ul>
                            </div>
                        </figure>
                        <span class="pass-correcto"></span>
                        <span class="pass-incorrecto"></span>
                    </section>
                    <br>
                    <input 
                    class="restablecer-contrasenia__input-contraseña" 
                    name="confirmacionPasswordUsuario"
                    placeholder="Confirmar Contraseña" 
                    type="password"
                    >
                </form>
                <p class="restablecer-contrasenia-dialog-3_text-no-coincide">Las contrase&ntilde;as no coinciden</p>
                <br>
                <div class="dialog-container-bts">
                    <button class="restablecer-contrasenia__boton-verificar restablecer-contrasenia__boton-verificar--restablecer-contraseña boton">Restablecer</button>
                </div>
            </dialog>
            <dialog class="restablecer-contrasenia-dialog-3-result-exito dialog-process-result">
                <h2>¡Excelente!</h2>
                <p>Has restablecido tu contrase&ntilde;a correctamente</p>
                <button class="restablecer-contrasenia-dialog-3-result-exito__boton dialog-process-result__btn boton" >Ok</button>
            </dialog>
            <dialog class="restablecer-contrasenia-dialog-3-result-fallo dialog-process-result">
                <h2>Intentalo de nuevo ...</h2>
                <p>No se pudo realizar correctamente el restablecimiento de tu contrase&ntilde;a de acceso</p>
                <button class="restablecer-contrasenia-dialog-3-result-fallo__boton dialog-process-result__btn boton" >Volver</button>
            </dialog>
        </div>
    </main>
    <figure class="manual-usuario-figure">
        <div class="manual-usuario-figure__container">
            <a class="manual-usuario-figure__link" href="<?php echo URL_RAIZ ?>manualUsuario" title="Manual de Usuario" target="BLANK">?</a>

        </div>
    </figure>
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