(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".clientes__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".clientes__modal-editar-cliente"),
    $modal_2 = $transparentBackgroundModal.querySelector(".clientes__modal-editar-cliente-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".clientes__modal-modificacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".clientes__modal-modificacion-fallo");
    
    d.addEventListener("click", e => {

        if(e.target.closest("button.clientes__lista-cliente-boton-editar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            scroll(0,280);
        }
        if(e.target.matches(".clientes__modal-editar-cliente-btn-añadir")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".clientes__modal-editar-cliente-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".clientes__modal-editar-cliente-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".clientes__modal-editar-cliente-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".clientes__modal-modificacion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();