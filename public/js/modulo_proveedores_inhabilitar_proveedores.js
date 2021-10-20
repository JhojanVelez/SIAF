// import {inhabilitar} from 'http://localhost:8080/SIAF/ajax/inhabilitar.js';
// import {buscarPorId} from 'http://localhost:8080/SIAF/ajax/inhabilitar.js';
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".proveedores__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".proveedores__modal-inhabilitar-proveedor"),
    $modal_2 = $transparentBackgroundModal.querySelector(".proveedores__modal-inhabilitacion-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".proveedores__modal-inhabilitacion-fallo");
    
    d.addEventListener("click", e => {
        if(e.target.closest("button.proveedores__lista-proveedor-boton-inhabilitar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            buscarPorId(e.target.dataset);
            scroll(0,280);
        }
        if(e.target.matches(".proveedores__modal-inhabilitar-proveedor-btn-confirmar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }

        if(e.target.matches(".proveedores__modal-inhabilitar-proveedor-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }

        if(e.target.matches(".proveedores__modal-inhabilitacion-exitosa-btn")) {
            $modal_2.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();