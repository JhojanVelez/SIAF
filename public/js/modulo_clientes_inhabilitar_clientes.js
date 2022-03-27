import {buscarPorId} from "../../ajax/buscarPorId.js";
import { inhabilitar } from "../../ajax/inhabilitar.js";
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".clientes__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".clientes__modal-inhabilitar-cliente"),
    $modal_2 = $transparentBackgroundModal.querySelector(".clientes__modal-inhabilitacion-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".clientes__modal-inhabilitacion-fallo");

    let $itemsConfirmacion = Object.values($modal_1.querySelectorAll(".clientes__modal-inhabilitar-cliente-info-item-confirmacion")),
        docCliente;
    
    d.addEventListener("click", e => {
        if(e.target.closest("button.clientes__lista-cliente-boton-inhabilitar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            scroll(0,280);
            docCliente = e.target.closest("button.clientes__lista-cliente-boton-inhabilitar").dataset.docCliente;
            buscarPorId(docCliente,"clientes",URL_RAIZ)
            .then((res)=> {
                console.log(res)
                for(let key in res) {
                    $itemsConfirmacion.filter(el => {
                        if (Object.keys(el.dataset)[0] == key.toLowerCase()) {
                            el.querySelector("P").innerHTML = res[key];
                        }
                    })
                }
            });
            $modal_1.toggleAttribute("open");
        }
        if(e.target.matches(".clientes__modal-inhabilitar-cliente-btn-confirmar")) {
            $modal_1.toggleAttribute("open");

            inhabilitar(docCliente,"clientes",URL_RAIZ)
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

        if(e.target.matches(".clientes__modal-inhabilitar-cliente-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }

        if(e.target.matches(".clientes__modal-inhabilitacion-exitosa-btn")) {
            location.reload();
        }

        if(e.target.matches(".clientes__modal-inhabilitacion-fallo-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();