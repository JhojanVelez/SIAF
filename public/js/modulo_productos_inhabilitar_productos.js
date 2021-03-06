import {buscarPorId} from "../../ajax/buscarPorId.js";
import { inhabilitar } from "../../ajax/inhabilitar.js";
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".productos__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".productos__modal-inhabilitar-producto"),
    $modal_2 = $transparentBackgroundModal.querySelector(".productos__modal-inhabilitacion-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".productos__modal-inhabilitacion-fallo");
    

    let $itemsConfirmacion = Object.values($modal_1.querySelectorAll(".productos__modal-inhabilitar-producto-info-item")),
        idProductoSeleccionado;

    d.addEventListener("click", e => {
        if(e.target.matches(".productos__boton-inhabilitar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            scroll(0,150);
            idProductoSeleccionado = e.target.dataset.idProduct;
            buscarPorId(idProductoSeleccionado,"productos",URL_RAIZ)
            .then((res)=> {
                for(let key in res) {
                    $itemsConfirmacion.filter(el => {
                        if (Object.keys(el.dataset)[0] == key.toLowerCase()) {
                            el.querySelector("P").innerHTML = res[key];
                        }
                    })
                }
                $modal_1.toggleAttribute("open");
            });
        }
        if(e.target.matches(".productos__modal-inhabilitar-producto-btn-confirmar")) {
            $modal_1.toggleAttribute("open");

            inhabilitar(idProductoSeleccionado,"productos",URL_RAIZ)
            .then(res => {
                console.log(res)
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

        if(e.target.matches(".productos__modal-inhabilitar-producto-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }

        if(e.target.matches(".productos__modal-inhabilitacion-exitosa-btn")) {
            location.reload();
        }
        if(e.target.matches(".productos__modal-inhabilitacion-fallo-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();