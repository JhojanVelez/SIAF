(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".entradas__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".entradas__modal-agregar-entrada"),
    $modal_2 = $transparentBackgroundModal.querySelector(".entradas__modal-agregar-entrada-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".entradas__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".entradas__modal-agregacion-fallo");
    
    d.addEventListener("click", e => {
        if(e.target.matches(".entradas__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $modal_1.querySelector("#codigoBarrasProducto").focus()
            scroll(0,280);
        }
        if(e.target.matches(".entradas__modal-agregar-entrada-btn-añadir")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".entradas__modal-agregar-entrada-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".entradas__modal-agregar-entrada-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".entradas__modal-agregar-entrada-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".entradas__modal-agregacion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();