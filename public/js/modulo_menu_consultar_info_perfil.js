(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".menu-info-usuario-container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".menu-info-usuario-modal")

    
    d.addEventListener("click", e => {
        if(e.target.matches(".card__button--consultar-info-perfil a")) {
            e.preventDefault();
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
        if(e.target.matches(".menu-info-usuario-modal__btn-cerrar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
    })
})();