import {buscarPorAtributos} from '../../ajax/buscarPorAtributos.js'
import {consultarCodigoVerificacion} from '../../ajax/consultarCodigoVerificacion.js'
import {restablecerPassword} from '../../ajax/restablecerPassword.js'
(function () {
  const d = document,
  $transparentBackgroundModal = d.querySelector(".restablecer-contrasenia"),
  $modal_1 = d.querySelector(".restablecer-contrasenia__dialog--1"),
  $modal_1_error = d.querySelector(".restablecer-contrasenia-dialog-1-result-fallo"),
  $modal_2 = d.querySelector(".restablecer-contrasenia__dialog--2"),
  $modal_3 = d.querySelector(".restablecer-contrasenia__dialog--3"),
  $modal_3_exito = d.querySelector(".restablecer-contrasenia-dialog-3-result-exito"),
  $modal_3_error = d.querySelector(".restablecer-contrasenia-dialog-3-result-fallo"),
  $form_1 = d.querySelector(".restablecer-contrasenia__form-1"),
  $form_2 = d.querySelector(".restablecer-contrasenia__form-2"),
  $form_3 = d.querySelector(".restablecer-contrasenia__form-3");

  let infoUsuario;

  let infoCodigoAleatorio;
  
  let validadorFormulario;

  let validadorPasos = 0;

  d.addEventListener("click", (e) => {
    if (e.target.matches(".inicio-sesion__a-olvidaste-contrasenia")) {
      $transparentBackgroundModal.classList.toggle("visible");
      $modal_1.toggleAttribute("open");
    }

    if (e.target.matches(".restablecer-contrasenia__boton-verificar--info")) {

      $modal_1.toggleAttribute("open");
      buscarPorAtributos($form_1,'login',URL_RAIZ)
      .then(res => {
        console.log(res)
        if(res.infoUsuario.length != 0) {
          infoUsuario = res.infoUsuario;
          consultarCodigoVerificacion($form_1,"login",URL_RAIZ)
          .then(res=> {
            infoCodigoAleatorio = res;
            $modal_2.toggleAttribute("open");
            $form_2.valor1RestablecerContrasenia.focus();
            validadorPasos = 1;
          });
        } else {
          $modal_1_error.toggleAttribute("open");
        }
      })
    }

    if(e.target.matches(".restablecer-contrasenia-dialog-1-result-fallo__boton")) {
      $modal_1.toggleAttribute("open");
      $modal_1_error.toggleAttribute("open");
    }

    if (e.target.matches(".restablecer-contrasenia__boton-verificar--codigo")) {

      validadorFormulario = true;
      
      if($form_2.valor1RestablecerContrasenia.value != infoCodigoAleatorio.codigo.dividido[0]) {
        validadorFormulario = false;
      }
      if($form_2.valor2RestablecerContrasenia.value != infoCodigoAleatorio.codigo.dividido[1]) {
        validadorFormulario = false;
      }
      if($form_2.valor3RestablecerContrasenia.value != infoCodigoAleatorio.codigo.dividido[2]) {
        validadorFormulario = false;
      }
      if($form_2.valor4RestablecerContrasenia.value != infoCodigoAleatorio.codigo.dividido[3]) {
        validadorFormulario = false;
      }
      
      if(validadorFormulario) {
        $modal_2.toggleAttribute("open");
        $modal_3.toggleAttribute("open");
        $form_2.querySelectorAll("input").forEach(el => {
          el.style.borderBottom = "3px solid rgb(146, 208, 80)";
          el.classList.add("input-valido");
        })
        validadorPasos = 2;
      } else {
        $form_2.querySelectorAll("input").forEach(el => {
          el.style.borderBottom = "3px solid red";
          el.classList.add("input-invalido");
        })
      }
    }

    if (e.target.matches(".restablecer-contrasenia__boton-verificar--restablecer-contraseña")) {
      restablecerPassword($form_3,infoUsuario[0].EmpDocIdentidad,"login",URL_RAIZ)
      .then(res=> {
        console.log(res);
        if(res.complete) {
          $modal_3.toggleAttribute("open");
          $modal_3_exito.toggleAttribute("open");
        } else {
          $modal_3.toggleAttribute("open");
          $modal_3_error.querySelector("p").innerHTML = res.PDOError;
          $modal_3_error.toggleAttribute("open");
        }
      });
    }

    if(e.target.matches(".restablecer-contrasenia-dialog-3-result-exito__boton")) {
      location.reload();
    }

    if(e.target.matches(".restablecer-contrasenia-dialog-3-result-fallo__boton")) {
      $modal_3_error.toggleAttribute("open");
      $form_3.reset();
      $modal_3.toggleAttribute("open");
    }

    if (e.target.matches(".restablecer-contrasenia__dialog-cerrar")) {
      $transparentBackgroundModal.classList.remove("visible");
      $modal_1.removeAttribute("open");
      $modal_2.removeAttribute("open");
      $modal_3.removeAttribute("open");
      $form_1.reset();
      $form_2.reset();
      $form_3.reset();
      $form_2.querySelectorAll("input").forEach(el => {
        el.style.borderBottom = "3px solid black";
        el.classList.remove("input-invalido");
        el.classList.remove("input-valido");
      });
    }
  });

  $form_2.addEventListener("keyup", (e) => {
    if(e.target.nextElementSibling == null) {
      $form_2.valor1RestablecerContrasenia.focus();
    } else {
      e.target.nextElementSibling.focus()
    }
  });
})();
