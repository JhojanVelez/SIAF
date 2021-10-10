(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".clientes__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".clientes__modal-clientes-inhabilitados")

    d.addEventListener("click", e => {
        if(e.target.matches(".clientes__boton-inhabilitar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
            scroll(0,250);
        }
        if(e.target.matches(".clientes__modal-clientes-inhabilitados-btn-cerrar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
    })
})();