(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".usuarios__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".usuarios__modal-usuarios-inhabilitados")

    d.addEventListener("click", e => {
        if(e.target.matches(".usuarios__boton-inhabilitar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
            scroll(0,250);
        }
        if(e.target.matches(".usuarios__modal-usuarios-inhabilitados-btn-cerrar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
    })
})();