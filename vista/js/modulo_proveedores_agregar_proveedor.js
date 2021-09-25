(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".proveedores__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".proveedores__modal-agregar-proveedor"),
    $modal_2 = $transparentBackgroundModal.querySelector(".proveedores__modal-agregar-proveedor-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".proveedores__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".proveedores__modal-agregacion-fallo");
    
    d.addEventListener("click", e => {
        if(e.target.matches(".proveedores__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            scroll(0,280);
        }
        if(e.target.matches(".proveedores__modal-agregar-proveedor-btn-añadir")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".proveedores__modal-agregar-proveedor-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".proveedores__modal-agregar-proveedor-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".proveedores__modal-agregar-proveedor-confirmacion-btn-cancelar")) {
            $modal_2.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".proveedores__modal-agregacion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();