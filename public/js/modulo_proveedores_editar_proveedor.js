import { buscarPorId } from "../../ajax/buscarPorId.js"
import { editar } from "../../ajax/editar.js";
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".proveedores__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".proveedores__modal-editar-proveedor"),
    $modal_2 = $transparentBackgroundModal.querySelector(".proveedores__modal-editar-proveedor-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".proveedores__modal-modificacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".proveedores__modal-modificacion-fallo");
    
    let $formulario = $modal_1.querySelector("form"),
        $inputs = Object.values($modal_1.querySelectorAll("[data-input]")),
        $itemsConfirmacion = Object.values($modal_2.querySelectorAll(".proveedores__modal-editar-proveedor-info-item-confirmacion")),
        idProveedor;

    let validador;

    /* Patrones para validacion de Email */
    let patronEstandardOfficial = "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$";
    let patronPersonal = "^([a-z]|[A-Z]|[0-9]|[!#$%&'*+\-\/=?^_`{|}~;])+@([a-z]|[A-Z]|[0-9])+\\.([a-z]|[A-Z]|[0-9])+(\\.|[[a-z]|[A-Z]|[0-9])*$";

    d.addEventListener("click", e => {

        if(e.target.closest("button.proveedores__lista-proveedor-boton-editar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $formulario.nit.focus();
            scroll(0,280);
            idProveedor = e.target.closest("button.proveedores__lista-proveedor-boton-editar").dataset.nitProveedor;
            buscarPorId(idProveedor,"Proveedores")
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
        if(e.target.matches(".proveedores__modal-editar-proveedor-btn-editar")) {
            validador = true;

            validarCorreo();

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
                    $itemsConfirmacion.forEach(item => {
                        if(Object.keys(input.dataset)[1] == Object.keys(item.dataset)[0]) {
                            item.querySelector("P").innerText = input.value;
                        }
                    })
                })
            }
        }
        if(e.target.matches(".proveedores__modal-editar-proveedor-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".proveedores__modal-editar-proveedor-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            editar($formulario,idProveedor,"proveedores")
            .then(res=>{
                if(res.complete) {
                    $modal_3.toggleAttribute("open");
                    $modal_3.querySelector("P").innerHTML = res.resultMessage; 
                } else {
                    $modal_4.toggleAttribute("open");
                    $modal_4.querySelector("H2").innerHTML = "¡Uppss!";
                    $modal_4.querySelector("P").innerHTML = res.errorMessage;
                }
            }).catch(err => {
                $modal_4.toggleAttribute("open");
                $modal_4.querySelector("P").innerHTML = err.errorMessage;
            });
        }
        if(e.target.matches(".proveedores__modal-editar-proveedor-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".proveedores__modal-modificacion-exitosa-btn")) {
            location.reload();
        }
        if(e.target.matches(".proveedores__modal-modificacion-fallo-btn")) {
            $modal_4.toggleAttribute("open");
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