import { buscarUsuarioLogin } from "../../ajax/buscarUsuarioLogin.js";

(function () {
    const d = document,
        $formulario = d.querySelector(".iniciar-sesion__form"),
        $inputs = $formulario.querySelectorAll("[data-input]"),
        $botonIniciarSesion = $formulario.querySelector(".iniciar-sesion__boton-ingresar"),
        $containerDoctorError = d.querySelector(".iniciar-sesion-error-container");

    let validador;

    d.addEventListener("click", e=> {
        if(e.target.matches(".iniciar-sesion__boton-ingresar")) {

            validador = true;
            $containerDoctorError.style.animation = "";
            
            $inputs.forEach(input => {
                if(input.value == "") {
                    validador = false;
                    input.classList.remove("input-valido")
                    input.classList.add("input-invalido");
                } else {
                    input.classList.remove("input-valido")
                    input.classList.remove("input-invalido");
                }
            });

            if(validador) {
                $botonIniciarSesion.disabled = true;
                buscarUsuarioLogin($formulario,"login",URL_RAIZ)
                .then(res=> {
                    $botonIniciarSesion.disabled = false;
                    console.log(res)
                    if(res.infoUsuario.length != 0) {
                        $inputs.forEach(input => {
                            input.classList.add("input-valido");
                        })
                        //simplemente recargo la pagina porque si en la url esta con el login, lo 
                        //redireccionara a el menu puesto que ya hay una sesion iniciada
                        location.href = URL_RAIZ;
                    } else {
                        $containerDoctorError.style.animation = "animacionErrorLogin 1s forwards"
                    }
                })
            }
        }
    })
})();