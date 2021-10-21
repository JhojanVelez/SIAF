import { buscarPorId } from "../../ajax/buscarPorId.js"

(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".productos__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".productos__modal-editar-producto"),
    $modal_2 = $transparentBackgroundModal.querySelector(".productos__modal-editar-producto-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".productos__modal-edicion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".productos__modal-edicion-fallo");
    
    let $inputs = Object.values($modal_1.querySelectorAll("[data-input]")),
        idProductoSeleccionado;

    d.addEventListener("click", e => {
        if(e.target.matches(".productos__boton-editar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            idProductoSeleccionado = e.target.dataset.idProduct
            buscarPorId(idProductoSeleccionado)
            .then((res)=> {
                for(let key in res) {
                    $inputs.filter(el => {
                        if (Object.keys(el.dataset)[1] == key.toLowerCase()) {
                            el.value = res[key];
                        }
                    })
                }
            });
        }
        if(e.target.matches(".productos__modal-editar-producto-btn-editar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }

        if(e.target.matches(".productos__modal-editar-producto-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        
        if(e.target.matches(".productos__modal-editar-producto-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-editar-producto-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-edicion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();