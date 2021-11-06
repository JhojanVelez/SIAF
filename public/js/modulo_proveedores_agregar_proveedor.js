import {agregar} from 'http://localhost:8080/SIAF/ajax/agregar.js';
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".proveedores__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".proveedores__modal-agregar-proveedor"),
    $modal_2 = $transparentBackgroundModal.querySelector(".proveedores__modal-agregar-proveedor-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".proveedores__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".proveedores__modal-agregacion-fallo");
    
    let $formulario = $modal_1.querySelector("form"),
    $inputs = Object.values($formulario.querySelectorAll("[data-input]")),
    $itemsConfirmacion = Object.values($modal_2.querySelectorAll(".proveedores__modal-agregar-proveedor-info-item-confirmacion"));

    let validador;

    /* Patrones para validacion de Email */
    let patronEstandardOfficial = "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$";
            let patronPersonal = "^([a-z]|[A-Z]|[0-9]|[!#$%&'*+\-\/=?^_`{|}~;])+@([a-z]|[A-Z]|[0-9])+\\.([a-z]|[A-Z]|[0-9])+(\.|[[a-z]|[A-Z]|[0-9])*$"

    d.addEventListener("click", e => {
        if(e.target.matches(".proveedores__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $modal_1.querySelector("#nitProveedor").focus()
            scroll(0,280);
        }
        if(e.target.matches(".proveedores__modal-agregar-proveedor-btn-añadir")) {
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

            validarCorreo();

            if(validador) {
                $modal_1.toggleAttribute("open");
                $modal_2.toggleAttribute("open");
    
                $inputs.forEach(input => {
                    console.log(Object.keys(input.dataset)[1]);
                    $itemsConfirmacion.forEach(item => {
                        if(Object.keys(input.dataset)[1] == Object.keys(item.dataset)[0]) {
                            item.querySelector("P").innerText = input.value;
                        }
                    })
                })
            }
        }
        if(e.target.matches(".proveedores__modal-agregar-proveedor-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".proveedores__modal-agregar-proveedor-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".proveedores__modal-agregar-proveedor-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".proveedores__modal-agregacion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })

    $formulario.addEventListener("keyup",e => {
        if(e.target == $inputs[4]) {
            validarCorreo();
        }
    })

    function validarCorreo () {
        let regex = new RegExp(patronPersonal,"g");

        if(regex.test($inputs[4].value)) {
            $inputs[4].classList.remove("input-invalido");
            validador = true;
        } else {
            $inputs[4].classList.add("input-invalido");
            validador = false;
        }
    }
})();