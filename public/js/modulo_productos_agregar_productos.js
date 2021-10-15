import {agregar} from 'http://localhost:8080/SIAF/ajax/agregar.js';
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".productos__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".productos__modal-agregar-producto"),
    $modal_2 = $transparentBackgroundModal.querySelector(".productos__modal-agregar-producto-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".productos__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".productos__modal-agregacion-fallo");


    let $formulario = "",
        $inputs = "",
        $itemsConfirmacion = "";

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
        }
        if(e.target.matches(".productos__modal-agregar-producto-btn-añadir")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
            
            

            $formulario = $modal_1.querySelector("form");
            $inputs = Object.values($formulario.querySelectorAll("[data-input]"));
            for(let key in producto){
                producto[key] = ($inputs.filter(input => input.getAttribute("name") == key))[0].value.toUpperCase();
            }

            $itemsConfirmacion = Object.values($modal_2.querySelectorAll(".productos__modal-agregar-producto-info-item-confirmacion"))
            
            for(let key in producto){
                $itemsConfirmacion.forEach((item)=> {
                    if(Object.keys(item.dataset)[0] == key.toLowerCase()){
                        item.querySelector("P").innerHTML = producto[key];
                    }
                })
            }
        }
        if(e.target.matches(".productos__modal-agregar-producto-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".productos__modal-agregar-producto-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            agregar($formulario);
            $modal_3.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-agregar-producto-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".productos__modal-agregacion-exitosa-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();