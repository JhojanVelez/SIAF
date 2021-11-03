import {agregar} from 'http://localhost:8080/SIAF/ajax/agregar.js';
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".entradas__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".entradas__modal-agregar-entrada"),
    $modal_2 = $transparentBackgroundModal.querySelector(".entradas__modal-agregar-entrada-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".entradas__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".entradas__modal-agregacion-fallo");
    
    let $formulario = $modal_1.querySelector("form"),
    $inputs = Object.values($formulario.querySelectorAll("[data-input]")),
    $itemsConfirmacion = Object.values($modal_2.querySelectorAll(".entradas__modal-agregar-entrada-info-item-confirmacion"));

    d.addEventListener("click", e => {
        if(e.target.matches(".entradas__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $modal_1.querySelector("#codigoBarrasProducto").focus()
            scroll(0,280);
        }
        if(e.target.matches(".entradas__modal-agregar-entrada-btn-añadir")) {
            let validador = true;

            $inputs.forEach(el => el.value = el.value.toUpperCase().trim());

            $inputs.forEach(input => {
                if(input.value == "") {
                    if(Object.keys(input.dataset)[1] == "entcomentarios") {
                        input.value = "SIN COMENTARIOS";
                    }else {
                        input.classList.add("input-invalido");
                        validador = false;
                    }
                } else {
                    input.classList.remove("input-invalido");
                }
            });

            let productoSeleccionado = $inputs[1].options[$inputs[1].options.selectedIndex]

            if(productoSeleccionado.dataset.proCodBarras !== $inputs[0].value) {
                $inputs[1].classList.add("input-invalido");
                validador = false;
            }

            if(isNaN($inputs[2].value)){
                $inputs[2].classList.add("input-invalido");
                validador = false;
            }

            if(isNaN($inputs[3].value)){
                $inputs[3].classList.add("input-invalido");
                validador = false;
            }

            if($inputs[3].value.length > 10){
                $inputs[3].classList.add("input-invalido");
                validador = false;
            }

            if($inputs[3].value[0] == 0){
                $inputs[3].classList.add("input-invalido");
                validador = false;
            }

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
        if(e.target.matches(".entradas__modal-agregar-entrada-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".entradas__modal-agregar-entrada-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            agregar($formulario,"InventarioEntradas")
            .then(res=>{
                console.log(res);
                if(res.complete) {
                    $modal_3.toggleAttribute("open");
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
        if(e.target.matches(".entradas__modal-agregar-entrada-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".entradas__modal-agregacion-exitosa-btn")) {
            location.reload();
        }
    })
    
    /*
    Colocar el codigo de barras en el campo, cuando el usuario seleccione un producto
    */

    d.addEventListener("change", e => {
        if(e.target.matches("#productos__modal-agregar-entrada-select-proveedor")) {
            $formulario.codigoBarrasProducto.value = e.target.options[e.target.options.selectedIndex].dataset.proCodBarras
        }
    });

    /*
    Seleccionar automaticamente el producto, cuando el usuario ingrese todo el codigo de barras
    */

    $formulario.addEventListener("keyup", e=> {
        if(e.target == $inputs[0]) {
            Array.from($inputs[1].options).forEach(el => {
                if(el.dataset.proCodBarras == e.target.value){
                    el.selected = true;
                } else {
                    el.selected = false;
                }
            });
        }
    })
})();