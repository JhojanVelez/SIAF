import {agregar} from 'http://localhost:8080/SIAF/ajax/agregar.js';
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".productos__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".productos__modal-agregar-producto"),
    $modal_2 = $transparentBackgroundModal.querySelector(".productos__modal-agregar-producto-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".productos__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".productos__modal-agregacion-fallo");


    let $formulario = $modal_1.querySelector("form"),
        $inputs = Object.values($formulario.querySelectorAll("[data-input]")),
        $itemsConfirmacion = Object.values($modal_2.querySelectorAll(".productos__modal-agregar-producto-info-item-confirmacion"));


    d.addEventListener("click", e => {
        
        if(e.target.matches(".productos__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $modal_1.querySelector("#codigoBarrasProducto").focus()
            $inputs[1].disabled = true;
        }
        if(e.target.matches(".productos__modal-agregar-producto-btn-añadir")) {

            let validador = true;

            $inputs.forEach(el => el.value = el.value.toUpperCase().trim());

            $inputs.forEach(input => {
                if(input.value == "") {
                    input.classList.add("input-invalido");
                    validador = false;
                } else {
                    input.classList.remove("input-invalido");
                }
            });

            let proveedorSeleccionado = $inputs[3].options[$inputs[3].options.selectedIndex]
            if(proveedorSeleccionado.dataset.proveedorId !== $inputs[1].value) {
                $inputs[1].classList.add("input-invalido");
                $inputs[3].classList.add("input-invalido");
                validador = false;
            }

            if(isNaN($inputs[8].value)){
                $inputs[8].classList.add("input-invalido");
                validador = false;
            }

            if($inputs[8].value.length > 10){
                $inputs[8].classList.add("input-invalido");
                validador = false;
            }

            if($inputs[8].value[0] == 0){
                $inputs[8].classList.add("input-invalido");
                validador = false;
            }

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

                $itemsConfirmacion.forEach(item => {
                    console.log(Object.keys(item.dataset)[0]);
                })
            }

        }
        if(e.target.matches(".productos__modal-agregar-producto-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".productos__modal-agregar-producto-confirmacion-btn-confirmar")) {
            $inputs[1].disabled = false;
            $modal_2.toggleAttribute("open");
            agregar($formulario,"inventarioSalidas")
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
        if(e.target.matches(".productos__modal-agregar-producto-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-agregacion-exitosa-btn")) {
            location.reload();
        }
        if(e.target.matches(".productos__modal-agregacion-fallo-btn")) {
            $modal_4.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })

    /*
    Colocar el nit del proveedor en el campo, cuando el usuario seleccione un proveedor
    */

    d.addEventListener("change", e => {
        if(e.target.matches("#productos__modal-agregar-producto-select-proveedor")) {
            $formulario.nitProveedor.value = e.target.options[e.target.options.selectedIndex].dataset.proveedorId
        }
    });
})();