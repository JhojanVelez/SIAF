import {buscarPorId} from "../../ajax/buscarPorId.js";
import { inhabilitar } from "../../ajax/inhabilitar.js";
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".usuarios__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".usuarios__modal-inhabilitar-usuario"),
    $modal_2 = $transparentBackgroundModal.querySelector(".usuarios__modal-inhabilitacion-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".usuarios__modal-inhabilitacion-fallo");
    
    let $itemsConfirmacion = Object.values($modal_1.querySelectorAll(".usuarios__modal-inhabilitar-usuario-info-item")),
    idUsuario;

    d.addEventListener("click", e => {
        if(e.target.closest("button.usuarios__lista-usuario-boton-inhabilitar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            scroll(0,280);
            idUsuario = e.target.closest("button.usuarios__lista-usuario-boton-inhabilitar").dataset.docUsuario;
            buscarPorId(idUsuario,"usuarios",URL_RAIZ)
            .then((res)=> {
                for(let key in res) {
                    $itemsConfirmacion.filter(el => {
                        if (Object.keys(el.dataset)[0] == key.toLowerCase()) {
                            (Object.keys(el.dataset)[0] == "empimg")
                            ? el.querySelector("img").src = res[key]+"?="+Math.random()*1000
                            : el.querySelector("P").innerHTML = res[key];
                        }
                    })
                }
                $modal_1.toggleAttribute("open");
            });
        }
        if(e.target.matches(".usuarios__modal-inhabilitar-usuario-btn-confirmar")) {
            $modal_1.toggleAttribute("open");

            inhabilitar(idUsuario,"usuarios",URL_RAIZ)
            .then(res => {
                console.log(res);
                if(res.complete) {
                    $modal_2.toggleAttribute("open");
                    $modal_2.querySelector("P").innerHTML = res.resultMessage;
                } else {
                    $modal_3.toggleAttribute("open");
                    $modal_3.querySelector("P").innerHTML = res.errorMessage;
                }
            }).catch((err)=> {
                console.log(err);
                $modal_3.toggleAttribute("open");
                $modal_3.querySelector("P").innerHTML = err.errorMessage;
            });
        }

        if(e.target.matches(".usuarios__modal-inhabilitar-usuario-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }

        if(e.target.matches(".usuarios__modal-inhabilitacion-exitosa-btn")) {
            location.reload();
        }

        if(e.target.matches(".usuarios__modal-inhabilitacion-fallo-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();