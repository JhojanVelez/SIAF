(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".registrar-ventas__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-confirmar-venta"),
    $modal_2 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-venta-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-agregar-cliente"),
    $modal_4 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-agregar-cliente-confirmacion"),
    $modal_5 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-agregacion-exitosa"),
    $modal_6 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-agregacion-fallo");

    d.addEventListener("click", e => {
        if(e.target.matches(".registrar-ventas__boton-vender")) {
            e.preventDefault();
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
        if(e.target.matches(".registrar-ventas__modal-confirmar-venta-btn-confirmar")) {
            $modal_1.toggleAttribute("open")
            $modal_2.toggleAttribute("open")
        }
        if(e.target.matches(".registrar-ventas__modal-confirmar-venta-btn-cancelar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
        if(e.target.matches(".registrar-ventas__modal-venta-exitosa-btn")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_2.toggleAttribute("open")
        }
    })
})();