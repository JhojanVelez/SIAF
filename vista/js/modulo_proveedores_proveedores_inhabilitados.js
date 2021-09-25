(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".proveedores__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".proveedores__modal-proveedores-inhabilitados")

    d.addEventListener("click", e => {
        if(e.target.matches(".proveedores__boton-inhabilitar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
            scroll(0,250);
        }
        if(e.target.matches(".proveedores__modal-proveedores-inhabilitados-btn-cerrar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
    })
})();