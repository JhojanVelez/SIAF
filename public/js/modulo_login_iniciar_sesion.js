import { buscarUsuarioLogin } from "../../ajax/buscarUsuarioLogin.js";

(function () {
    let d = document,
    $formulario = d.querySelector(".iniciar-sesion__form");

    d.addEventListener("click", e=> {
        if(e.target.matches(".iniciar-sesion__boton-ingresar")) {
            buscarUsuarioLogin($formulario,"login",URL_RAIZ)
            .then(res=> {
                console.log(res)
                if(res.infoUsuario.length != 0) {
                    location.reload();
                } else {
                    console.log("no existe")
                }
            })
        }
    })
})();