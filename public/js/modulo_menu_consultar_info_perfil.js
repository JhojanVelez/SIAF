import {buscarUsuarioEnSession} from '../../ajax/buscarUsuarioEnSession.js';
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".menu-info-usuario-container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".menu-info-usuario-modal"),
    $modal_1_items = $modal_1.querySelectorAll(".menu-info-usuario-modal__perfil-info-item p");
    
    d.addEventListener("click", e => {
        if(e.target.matches(".card__button--consultar-info-perfil")) {
            $transparentBackgroundModal.classList.toggle("visible")
            buscarUsuarioEnSession(URL_RAIZ)
            .then(res=> {
                console.log(res);
                console.log($modal_1_items[0]);
                $modal_1_items[0].innerHTML = res.EmpDocIdentidad;
                $modal_1_items[1].innerHTML = res.EmpNombre;
                $modal_1_items[2].innerHTML = res.EmpApellido;
                $modal_1_items[3].innerHTML = res.EmpEps;
                $modal_1_items[4].innerHTML = res.EmpRH;
                $modal_1_items[5].innerHTML = res.EmpDireccion;
                $modal_1_items[6].innerHTML = res.EmpTelefono;
                $modal_1_items[7].innerHTML = res.EmpCorreo;
                $modal_1_items[8].innerHTML = res.EmpRol;
                $modal_1.toggleAttribute("open")
            })
        }
        if(e.target.matches(".menu-info-usuario-modal__btn-cerrar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
    })
})();