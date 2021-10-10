(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".registrar-ventas__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-cancelar-venta");
    
    d.addEventListener("click", e => {
        if(e.target.matches(".registrar-ventas__boton-cancelar-venta")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
        }
        if(e.target.matches(".registrar-ventas__modal-cancelar-venta-btn-confirmar")) {
            location.reload();
        }

        if(e.target.matches(".registrar-ventas__modal-cancelar-venta-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }

        if(e.target.matches(".productos__modal-inhabilitacion-exitosa-btn")) {
            $modal_2.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();