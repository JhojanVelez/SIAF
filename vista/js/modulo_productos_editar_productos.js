(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".productos__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".productos__modal-editar-producto"),
    $modal_2 = $transparentBackgroundModal.querySelector(".productos__modal-editar-producto-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".productos__modal-edicion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".productos__modal-edicion-fallo");
    
    d.addEventListener("click", e => {
        if(e.target.matches(".productos__boton-editar")) {
            $transparentBackgroundModal.style.visibility = "visible";
            $transparentBackgroundModal.style.opacity = "1";
            $modal_1.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-editar-producto-btn-editar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }

        if(e.target.matches(".productos__modal-editar-producto-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.style.visibility = "hidden";
            $transparentBackgroundModal.style.opacity = "0";
        }

        if(e.target.matches(".productos__modal-editar-producto-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-editar-producto-confirmacion-btn-cancelar")) {
            $modal_2.toggleAttribute("open");
            $transparentBackgroundModal.style.visibility = "hidden";
            $transparentBackgroundModal.style.opacity = "0";
        }
        if(e.target.matches(".productos__modal-edicion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.style.visibility = "hidden";
            $transparentBackgroundModal.style.opacity = "0";
        }
    })
})();