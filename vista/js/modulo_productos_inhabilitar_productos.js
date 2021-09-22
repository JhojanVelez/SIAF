(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".productos__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".productos__modal-inhabilitar-producto"),
    $modal_2 = $transparentBackgroundModal.querySelector(".productos__modal-inhabilitacion-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".productos__modal-inhabilitacion-fallo");
    
    d.addEventListener("click", e => {
        if(e.target.matches(".productos__boton-inhabilitar")) {
            $transparentBackgroundModal.style.visibility = "visible";
            $transparentBackgroundModal.style.opacity = "1";
            $modal_1.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-inhabilitar-producto-btn-confirmar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }

        if(e.target.matches(".productos__modal-inhabilitar-producto-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.style.visibility = "hidden";
            $transparentBackgroundModal.style.opacity = "0";
        }

        if(e.target.matches(".productos__modal-inhabilitacion-exitosa-btn")) {
            $modal_2.toggleAttribute("open");
            $transparentBackgroundModal.style.visibility = "hidden";
            $transparentBackgroundModal.style.opacity = "0";
        }
    })
})();