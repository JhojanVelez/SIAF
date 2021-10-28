const d = document,
  $modal = d.querySelector(".restablecer-contrasenia"),
  $ventana_email = d.querySelector(".restablecer-contrasenia__dialog--1"),
  $ventana_codigo = d.querySelector(".restablecer-contrasenia__dialog--2"),
  $ventana_nueva_contrasenia = d.querySelector(".restablecer-contrasenia__dialog--3"),
  $form_ini = d.querySelector(".iniciar-sesion__container-form"),
  $form_1 = d.querySelector(".restablecer-contrasenia__form-1"),
  $form_2 = d.querySelector(".restablecer-contrasenia__form-2"),
  $form_3 = d.querySelector(".restablecer-contrasenia__form-3");

d.addEventListener("click", (e) => {
  if (e.target.matches(".inicio-sesion__a-olvidaste-contrasenia")) {
    $modal.classList.toggle("dialog-visible");
    $ventana_email.classList.toggle("dialog-visible");
  }

  if (e.target.matches(".restablecer-contrasenia__boton-verificar--correo")) {
    $ventana_email.classList.toggle("dialog-visible");
    $ventana_codigo.classList.toggle("dialog-visible");
  }

  if (e.target.matches(".restablecer-contrasenia__boton-verificar--codigo")) {
    $ventana_codigo.classList.toggle("dialog-visible");
    $ventana_nueva_contrasenia.classList.toggle("dialog-visible");
  }

  if (e.target.matches(".restablecer-contrasenia__boton-verificar--restablecer-contraseña")) {
    $modal.classList.remove("dialog-visible");
    $ventana_email.classList.remove("dialog-visible");
    $ventana_codigo.classList.remove("dialog-visible");
    $ventana_nueva_contrasenia.classList.remove("dialog-visible");
    $form_1.reset();
    $form_2.reset();
    $form_3.reset();
  }

  if (e.target.matches(".restablecer-contrasenia__dialog-atras--dialog--2")) {
    $ventana_email.classList.toggle("dialog-visible");
    $ventana_codigo.classList.toggle("dialog-visible");
    $form_2.reset();
  }

  if (e.target.matches(".restablecer-contrasenia__dialog-atras--dialog--3")) {
    $ventana_nueva_contrasenia.classList.toggle("dialog-visible");
    $ventana_codigo.classList.toggle("dialog-visible");
    $form_3.reset();
  }

  if (e.target.matches(".restablecer-contrasenia__dialog-cerrar")) {
    $modal.classList.remove("dialog-visible");
    $ventana_email.classList.remove("dialog-visible");
    $ventana_codigo.classList.remove("dialog-visible");
    $ventana_nueva_contrasenia.classList.remove("dialog-visible");
    $form_1.reset();
    $form_2.reset();
    $form_3.reset();
  }
});

$form_2.addEventListener("keyup", (e) => {
  e.target.nextElementSibling.focus();
});
