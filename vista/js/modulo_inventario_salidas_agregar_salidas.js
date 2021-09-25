(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".salidas__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".salidas__modal-agregar-salida"),
    $modal_2 = $transparentBackgroundModal.querySelector(".salidas__modal-agregar-salida-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".salidas__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".salidas__modal-agregacion-fallo");
    
    d.addEventListener("click", e => {
        if(e.target.matches(".salidas__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $modal_1.querySelector("#codigoBarrasProducto").focus()
            scroll(0,280);
        }
        if(e.target.matches(".salidas__modal-agregar-salida-btn-añadir")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".salidas__modal-agregar-salida-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".salidas__modal-agregar-salida-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".salidas__modal-agregar-salida-confirmacion-btn-cancelar")) {
            $modal_2.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".salidas__modal-agregacion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();