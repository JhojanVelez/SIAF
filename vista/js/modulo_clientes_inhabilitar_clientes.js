(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".clientes__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".clientes__modal-inhabilitar-cliente"),
    $modal_2 = $transparentBackgroundModal.querySelector(".clientes__modal-inhabilitacion-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".clientes__modal-inhabilitacion-fallo");
    
    d.addEventListener("click", e => {
        if(e.target.closest("button.clientes__lista-cliente-boton-inhabilitar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            scroll(0,280);
        }
        if(e.target.matches(".clientes__modal-inhabilitar-cliente-btn-confirmar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }

        if(e.target.matches(".clientes__modal-inhabilitar-cliente-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }

        if(e.target.matches(".clientes__modal-inhabilitacion-exitosa-btn")) {
            $modal_2.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();