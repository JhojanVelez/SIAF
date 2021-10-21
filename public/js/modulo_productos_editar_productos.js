import { buscarPorId } from "../../ajax/buscarPorId.js"

(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".productos__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".productos__modal-editar-producto"),
    $modal_2 = $transparentBackgroundModal.querySelector(".productos__modal-editar-producto-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".productos__modal-edicion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".productos__modal-edicion-fallo");
    
    let $formulario = $modal_1.querySelector("form"),
        $inputs = Object.values($modal_1.querySelectorAll("[data-input]")),
        $itemsConfirmacion = Object.values($modal_2.querySelectorAll(".productos__modal-editar-producto-info-item-confirmacion")),
        idProductoSeleccionado;

    d.addEventListener("click", e => {
        if(e.target.matches(".productos__boton-editar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $modal_1.querySelector("#codigoBarrasProducto").focus()
            $inputs[1].disabled = true;
            idProductoSeleccionado = e.target.dataset.idProduct
            buscarPorId(idProductoSeleccionado)
            .then((res)=> {
                for(let key in res) {
                    $inputs.filter(el => {
                        if (Object.keys(el.dataset)[1] == key.toLowerCase()) {
                            el.value = res[key];
                        }
                    })
                }
            });
        }
        if(e.target.matches(".productos__modal-editar-producto-btn-editar")) {
            // $modal_1.toggleAttribute("open");
            // $modal_2.toggleAttribute("open");
            let validador = true;

            $inputs.forEach(el => el.value = el.value.toUpperCase());

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

        if(e.target.matches(".productos__modal-editar-producto-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        
        if(e.target.matches(".productos__modal-editar-producto-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-editar-producto-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-edicion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })

    d.addEventListener("change", e => {
        if(e.target.matches("#productos__modal-editar-producto-select-proveedor")) {
            $formulario.nitProveedor.value = e.target.options[e.target.options.selectedIndex].dataset.proveedorId
        }
    });
})();