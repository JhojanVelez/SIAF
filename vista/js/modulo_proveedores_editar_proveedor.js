(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".proveedores__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".proveedores__modal-editar-proveedor"),
    $modal_2 = $transparentBackgroundModal.querySelector(".proveedores__modal-editar-proveedor-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".proveedores__modal-modificacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".proveedores__modal-modificacion-fallo");
    
    d.addEventListener("click", e => {

        if(e.target.closest("button.proveedores__lista-proveedor-boton-editar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            scroll(0,280);
        }
        if(e.target.matches(".proveedores__modal-editar-proveedor-btn-añadir")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".proveedores__modal-editar-proveedor-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".proveedores__modal-editar-proveedor-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".proveedores__modal-editar-proveedor-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".proveedores__modal-modificacion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();