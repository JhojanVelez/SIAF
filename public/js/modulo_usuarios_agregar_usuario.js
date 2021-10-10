(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".usuarios__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregar-usuario"),
    $modal_2 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregar-usuario-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregacion-fallo");
    
    d.addEventListener("click", e => {
        if(e.target.matches(".usuarios__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            scroll(0,280);
        }
        if(e.target.matches(".usuarios__modal-agregar-usuario-btn-añadir")) {
            e.preventDefault()
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".usuarios__modal-agregar-usuario-btn-cancelar")) {
            e.preventDefault()
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".usuarios__modal-agregar-usuario-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".usuarios__modal-agregar-usuario-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".usuarios__modal-agregacion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();