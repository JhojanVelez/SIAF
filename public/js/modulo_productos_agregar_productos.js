// import {agregar} from '../../ajax/agregar.js';
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".productos__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".productos__modal-agregar-producto"),
    $modal_2 = $transparentBackgroundModal.querySelector(".productos__modal-agregar-producto-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".productos__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".productos__modal-agregacion-fallo");
    
    d.addEventListener("click", e => {
        if(e.target.matches(".productos__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $modal_1.querySelector("#codigoBarrasProducto").focus()
        
        }
        if(e.target.matches(".productos__modal-agregar-producto-btn-añadir")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-agregar-producto-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".productos__modal-agregar-producto-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
            // agregar($modal_1);
        }
        if(e.target.matches(".productos__modal-agregar-producto-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-agregacion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();