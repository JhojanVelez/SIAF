import {infoVenta} from './modulo_ventas_registrar_agregar_productos.js'
import {buscarPorId} from '../../ajax/buscarPorId.js';
import {agregar} from '../../ajax/agregar.js'
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".registrar-ventas__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-confirmar-venta"),
    $modal_1_contenedor_btns_registrar_anonimo = $modal_1.querySelector(".modal-confirmar-venta-form-container-nombre-cliente"),
    $modal_2 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-venta-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-venta-fallo"),
    $modal_4 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-venta-fallo-por-cliente"),
    $itemsModal_1 = $modal_1.querySelectorAll(".registrar-ventas__modal-confirmar-venta-item");
    
    console.log($itemsModal_1)
    /* Vamos a crear la funcionalidad de buscar por id el cliente e ir mostrando o ocultando la ventana morada */
    d.addEventListener("click", e => {
        if(e.target.matches(".registrar-ventas__boton-vender")) {
            e.preventDefault();
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
            $itemsModal_1[0].focus();
            $itemsModal_1[1].innerHTML = "$"+infoVenta.precioTotal+" Pesos"
        }
        if(e.target.matches(".registrar-ventas__modal-confirmar-venta-btn-confirmar")) {

            $modal_1.toggleAttribute("open");

            infoVenta.docCliente = $itemsModal_1[0].value;
            infoVenta.formaPago = $itemsModal_1[2].value;
            infoVenta.recibe = $itemsModal_1[3].value;


            agregar(undefined,"ventasRegistrar", URL_RAIZ, infoVenta)
            .then(res=>{
                console.log(res);
                if(res.complete) {
                    $modal_2.toggleAttribute("open");
                } else {
                    if(res.errorPDOMessageCode == 1452) {
                        $modal_4.toggleAttribute("open");
                    } else {
                        $modal_3.toggleAttribute("open");
                    }
                }
            }).catch(err => {
                $modal_3.toggleAttribute("open");
                $modal_3.querySelector("P").innerHTML = err.errorMessage;
            });
        }
        if(e.target.matches(".registrar-ventas__modal-confirmar-venta-btn-cancelar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
        
        if(e.target.matches(".registrar-ventas__modal-venta-exitosa-btn")) {
            location.reload();
        }

        if(e.target.matches(".registrar-ventas__modal-agregacion-fallo-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }

        if(e.target.matches(".registrar-ventas__modal-venta-fallo-por-cliente-btn-anonimo")){
            $modal_4.toggleAttribute("open");

            $modal_1.querySelector("form").docCliente.value = "ANONIMO"
            $modal_1.toggleAttribute("open");

            $itemsModal_1[0].focus();
        }
    })

    const buscarCliente = () => {
        buscarPorId($itemsModal_1[0].value,"clientes",URL_RAIZ)
            .then(res => {
                if(res.records == 0) {
                    $modal_1_contenedor_btns_registrar_anonimo.querySelector(".modal-confirmar-venta-form-container-nombre-cliente__no-disponible").classList.add("open");
                    $modal_1_contenedor_btns_registrar_anonimo.querySelector(".modal-confirmar-venta-form-container-nombre-cliente__disponible").classList.remove("open");
                } else {
                    $modal_1_contenedor_btns_registrar_anonimo.querySelector(".modal-confirmar-venta-form-container-nombre-cliente__no-disponible").classList.remove("open");
                    let $cajaNombreCliente = $modal_1_contenedor_btns_registrar_anonimo.querySelector(".modal-confirmar-venta-form-container-nombre-cliente__disponible");
                    $cajaNombreCliente.classList.add("open");
                    $cajaNombreCliente.innerHTML = res.CliNombre+" "+res.CliApellido;
                }
            });
    }

    $itemsModal_1[0].addEventListener("focus",e=> {
        if(e.target == $itemsModal_1[0]) {
            buscarCliente();
        }
    })

    d.addEventListener("keyup",e=> {
        if(e.target == $itemsModal_1[3]) {
            infoVenta.cambio = (parseInt($itemsModal_1[3].value) - infoVenta.precioTotal) || 0;
            $itemsModal_1[4].innerHTML = "$"+infoVenta.cambio+" Pesos";
        }

        if(e.target == $itemsModal_1[0]) {
            buscarCliente();
        }
    })
})();