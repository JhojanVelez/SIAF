import {agregar} from '../../ajax/agregar.js'
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".clientes__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".clientes__modal-agregar-cliente"),
    $modal_2 = $transparentBackgroundModal.querySelector(".clientes__modal-agregar-cliente-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".clientes__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".clientes__modal-agregacion-fallo");

    let $formulario = $modal_1.querySelector("form"),
    $inputs = Object.values($formulario.querySelectorAll("[data-input]")),
    $itemsConfirmacion = Object.values($modal_2.querySelectorAll(".clientes__modal-agregar-cliente-info-item-confirmacion"));

    let validador;

    /* Patrones para validacion de Email */
    let patronEstandardOfficial = "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$";
    let patronPersonal = "^([a-z]|[A-Z]|[0-9]|[!#$%&'*+\-\/=?^_`{|}~;])+@([a-z]|[A-Z]|[0-9])+\\.([a-z]|[A-Z]|[0-9])+(\\.|[[a-z]|[A-Z]|[0-9])*$";
    
    d.addEventListener("click", e => {
        if(e.target.matches(".clientes__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $modal_1.querySelector("#docCliente").focus()
            scroll(0,280);
        }
        if(e.target.matches(".clientes__modal-agregar-cliente-btn-añadir")) {
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
                
                $inputs.forEach(input => {
                    $itemsConfirmacion.forEach(item => {
                        if(Object.keys(input.dataset)[1] == Object.keys(item.dataset)[0]) {
                            item.querySelector("P").innerText = input.value;
                        }
                    })
                })

                $modal_2.toggleAttribute("open");
            }
        }
        if(e.target.matches(".clientes__modal-agregar-cliente-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".clientes__modal-agregar-cliente-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            agregar($formulario, "clientes",URL_RAIZ)
            .then(res=>{
                console.log(res);
                if(res.complete) {
                    $modal_3.toggleAttribute("open");
                } else {
                    $modal_4.toggleAttribute("open");
                    $modal_4.querySelector("P").innerHTML = res.errorMessage;
                }
            }).catch(err => {
                console.log(err);
                $modal_4.toggleAttribute("open");
                $modal_4.querySelector("P").innerHTML = err.errorMessage;
            });
        }
        if(e.target.matches(".clientes__modal-agregar-cliente-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".clientes__modal-agregacion-exitosa-btn")) {
            location.reload();
        }

        if(e.target.matches(".clientes__modal-agregacion-fallo-btn")) {
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
        console.log($inputs)
        if(regex.test($inputs[1].value)) {
            $inputs[1].classList.remove("input-invalido");
            return true;
        } else {
            $inputs[1].classList.add("input-invalido");
            return false;
        }
    }
})();