(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".clientes__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".clientes__modal-agregar-cliente"),
    $modal_2 = $transparentBackgroundModal.querySelector(".clientes__modal-agregar-cliente-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".clientes__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".clientes__modal-agregacion-fallo");
    
    d.addEventListener("click", e => {
        if(e.target.matches(".clientes__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            scroll(0,280);
        }
        if(e.target.matches(".clientes__modal-agregar-cliente-btn-añadir")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".clientes__modal-agregar-cliente-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".clientes__modal-agregar-cliente-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".clientes__modal-agregar-cliente-confirmacion-btn-cancelar")) {
            $modal_2.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".clientes__modal-agregacion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();