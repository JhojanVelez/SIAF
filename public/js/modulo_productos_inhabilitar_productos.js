import {obtenerPorId} from "http://localhost:8080/SIAF/ajax/buscarPorId.js";
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".productos__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".productos__modal-inhabilitar-producto"),
    $modal_2 = $transparentBackgroundModal.querySelector(".productos__modal-inhabilitacion-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".productos__modal-inhabilitacion-fallo");
    

    let $itemsConfirmacion = Object.values($modal_1.querySelectorAll(".productos__modal-inhabilitar-producto-info-item"));

    d.addEventListener("click", e => {
        if(e.target.matches(".productos__boton-inhabilitar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            obtenerPorId(e.target.dataset.idProduct)
            .then((res)=> {
                for(let key in res) {
                    $itemsConfirmacion.filter(el => {
                        if (Object.keys(el.dataset)[0] == key.toLowerCase()) {
                            el.querySelector("P").innerHTML = res[key];
                        }
                    })
                }
            });
        }
        if(e.target.matches(".productos__modal-inhabilitar-producto-btn-confirmar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }

        if(e.target.matches(".productos__modal-inhabilitar-producto-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }

        if(e.target.matches(".productos__modal-inhabilitacion-exitosa-btn")) {
            $modal_2.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();