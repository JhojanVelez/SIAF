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

    const producto = {
        codigoBarras: "",
        nitProveedor: "",
        descripcion: "",
        proveedor: "",
        ubicacionFisica: "",
        laboratorio: "",
        unidadMedida: "",
        presentacion: "",
        precioVenta: "",
        invima: ""
    }

    d.addEventListener("click", e => {
        
        if(e.target.matches(".productos__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $modal_1.querySelector("#codigoBarrasProducto").focus()
            $inputs[1].disabled = true;
        }
        if(e.target.matches(".productos__modal-agregar-producto-btn-añadir")) {

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
                for(let key in producto){
                    producto[key] = ($inputs.filter(input => input.getAttribute("name") == key))[0].value;
                }
                
                for(let key in producto){
                    $itemsConfirmacion.forEach((item)=> {
                        if(Object.keys(item.dataset)[0] == key.toLowerCase()){
                            item.querySelector("P").innerHTML = producto[key];
                        }
                    })
                }
            }

        }
        if(e.target.matches(".productos__modal-agregar-producto-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".productos__modal-agregar-producto-confirmacion-btn-confirmar")) {
            $inputs[1].disabled = false;
            $modal_2.toggleAttribute("open");
            agregar($formulario,"productos")
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

    d.addEventListener("change", e => {
        if(e.target.matches("#productos__modal-agregar-producto-select-proveedor")) {
            $formulario.nitProveedor.value = e.target.options[e.target.options.selectedIndex].dataset.proveedorId
        }
    });
})();