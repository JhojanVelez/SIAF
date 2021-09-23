(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".productos__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".productos__modal-productos-inhabilitados")

    d.addEventListener("click", e => {
        if(e.target.matches(".productos__boton-ver-inhabilitados")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
            scroll(0,125);
        }
        if(e.target.matches(".productos__modal-productos-inhabilitados-btn-cerrar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
    })
})();