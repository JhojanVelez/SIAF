(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".registrar-ventas__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-lista-filtro-productos")

    d.addEventListener("click", e => {
        if(e.target.matches(".registrar-ventas__registro-boton-buscar-producto")) {
            e.preventDefault();
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
        if(e.target.matches(".registrar-ventas__modal-lista-filtro-productos-btn-cerrar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
    })
})();