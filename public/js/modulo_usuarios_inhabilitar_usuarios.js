(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".usuarios__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".usuarios__modal-inhabilitar-usuario"),
    $modal_2 = $transparentBackgroundModal.querySelector(".usuarios__modal-inhabilitacion-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".usuarios__modal-inhabilitacion-fallo");
    
    d.addEventListener("click", e => {
        if(e.target.closest("button.usuarios__lista-usuario-boton-inhabilitar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            scroll(0,280);
        }
        if(e.target.matches(".usuarios__modal-inhabilitar-usuario-btn-confirmar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }

        if(e.target.matches(".usuarios__modal-inhabilitar-usuario-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }

        if(e.target.matches(".usuarios__modal-inhabilitacion-exitosa-btn")) {
            $modal_2.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();