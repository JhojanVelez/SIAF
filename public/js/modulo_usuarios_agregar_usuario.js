import {agregar} from '../../ajax/agregar.js'
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".usuarios__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregar-usuario"),
    $modal_2 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregar-usuario-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregacion-fallo");
    
    let $formulario = $modal_1.querySelector("form"),
    $inputs = Object.values($formulario.querySelectorAll("[data-input]")),
    $itemsConfirmacion = Object.values($modal_2.querySelectorAll(".usuarios__modal-agregar-usuario-info-item-confirmacion"));

    d.addEventListener("click", e => {
        if(e.target.matches(".usuarios__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $modal_1.querySelector("#docUsuario").focus()
            scroll(0,280);
        }
        if(e.target.matches(".usuarios__modal-agregar-usuario-btn-añadir")) {
            e.preventDefault()
            agregar($formulario,"usuarios",URL_RAIZ)
            .then(res=>{
                console.log(res);
            }).catch(err => {
                $modal_4.toggleAttribute("open");
                $modal_4.querySelector("P").innerHTML = err.errorMessage;
            });
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

    d.addEventListener("change", e => {
        if(e.target.matches(".usuarios-modal-agregar-usuario-form-img-container__file")) {

            /*  Con fileReader, podremos obtener el contenido de la imagen que se vaya a subir y poner una vista previa
                de esta, atravez del evento loadend
            */

            const reader = new FileReader();

            reader.addEventListener("loadend", e_reader => {
                e.target.previousElementSibling.src = e_reader.target.result;
            })

            reader.readAsDataURL(e.target.files[0])
        }
    })
})();