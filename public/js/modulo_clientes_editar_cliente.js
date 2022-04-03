import { buscarPorId } from "../../ajax/buscarPorId.js"
import { editar } from "../../ajax/editar.js";
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".clientes__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".clientes__modal-editar-cliente"),
    $modal_2 = $transparentBackgroundModal.querySelector(".clientes__modal-editar-cliente-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".clientes__modal-modificacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".clientes__modal-modificacion-fallo");
    
    let $formulario = $modal_1.querySelector("form"),
        $inputs = Object.values($modal_1.querySelectorAll("[data-input]")),
        $itemsConfirmacion = Object.values($modal_2.querySelectorAll(".clientes__modal-editar-cliente-info-item-confirmacion")),
        docCliente;

    let validador;

    /* Patrones para validacion de Email */
    let patronEstandardOfficial = "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$";
    let patronPersonal = "^([a-z]|[A-Z]|[0-9]|[!#$%&'*+\-\/=?^_`{|}~;])+@([a-z]|[A-Z]|[0-9])+\\.([a-z]|[A-Z]|[0-9])+(\\.|[[a-z]|[A-Z]|[0-9])*$";

    d.addEventListener("click", e => {

        if(e.target.closest("button.clientes__lista-cliente-boton-editar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $formulario.documento.focus();
            scroll(0,280);
            docCliente = e.target.closest("button.clientes__lista-cliente-boton-editar").dataset.docCliente;
            buscarPorId(docCliente,"clientes",URL_RAIZ)
            .then((res)=> {
                console.log(res)
                for(let key in res) {
                    $inputs.filter(el => {
                        if (Object.keys(el.dataset)[1] == key.toLowerCase()) {
                            el.value = res[key];
                        }
                    })
                }
            });
        }
        if(e.target.matches(".clientes__modal-editar-cliente-btn-editar")) {
            validador = true;
            
            $inputs.forEach(el => el.value = el.value.toUpperCase().trim());

            $inputs.forEach(input => {
                if(input.value == "") {
                    input.classList.add("input-invalido");
                    validador = false;
                } else {
                    input.classList.remove("input-invalido");
                }
            });

            if(isNaN($inputs[0].value)){
                $inputs[0].classList.add("input-invalido");
                validador = false;
            }
            
            if(isNaN($inputs[5].value)){
                $inputs[5].classList.add("input-invalido");
                validador = false;
            }

            if(validarCorreo() && validador) {
                $modal_1.toggleAttribute("open");
                $modal_2.toggleAttribute("open");

                $inputs.forEach(input => {
                    $itemsConfirmacion.forEach(item => {
                        if(Object.keys(input.dataset)[1] == Object.keys(item.dataset)[0]) {
                            item.querySelector("P").innerHTML = input.value;
                        }
                    })
                })
            }
        }
        if(e.target.matches(".clientes__modal-editar-cliente-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }

        if(e.target.matches(".clientes__modal-editar-cliente-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            editar($formulario,docCliente,"clientes",URL_RAIZ)
            .then(res=>{
                console.log(res)
                if(res.complete) {
                    $modal_3.toggleAttribute("open");
                } else {
                    $modal_4.toggleAttribute("open");
                    $modal_4.querySelector("P").innerHTML = res.errorMessage;
                }
            }).catch(err => {
                $modal_4.toggleAttribute("open");
                $modal_4.querySelector("P").innerHTML = err.errorMessage;
            });
        }
        if(e.target.matches(".clientes__modal-editar-cliente-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".clientes__modal-modificacion-exitosa-btn")) {
            location.reload();
        }
        if(e.target.matches(".clientes__modal-modificacion-fallo-btn")) {
            $modal_4.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })

    $formulario.addEventListener("keyup",e => {
        if(e.target == $inputs[1]) {
            validarCorreo();
        }
    })

    function validarCorreo () {
        let regex = new RegExp(patronPersonal,"g");

        if(regex.test($inputs[1].value)) {
            $inputs[1].classList.remove("input-invalido");
            return true;
        } else {
            $inputs[1].classList.add("input-invalido");
            return false;
        }
    }
})();