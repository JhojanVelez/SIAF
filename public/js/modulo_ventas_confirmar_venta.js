import {infoVenta} from './modulo_ventas_registrar_agregar_productos.js'
import {agregar} from '../../ajax/agregar.js'
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".registrar-ventas__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-confirmar-venta"),
    $modal_2 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-venta-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-agregar-cliente"),
    $modal_4 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-agregar-cliente-confirmacion"),
    $modal_5 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-agregacion-exitosa"),
    $modal_6 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-agregacion-fallo"),
    $itemsModal_1 = $modal_1.querySelectorAll(".registrar-ventas__modal-confirmar-venta-item");
    
    console.log($itemsModal_1)
    d.addEventListener("click", e => {
        if(e.target.matches(".registrar-ventas__boton-vender")) {
            e.preventDefault();
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
            $itemsModal_1[2].innerHTML = "$"+infoVenta.precioTotal+" Pesos"
        }
        if(e.target.matches(".registrar-ventas__modal-confirmar-venta-btn-confirmar")) {
            $modal_1.toggleAttribute("open")
            $modal_2.toggleAttribute("open")
            infoVenta.docCliente = $itemsModal_1[0].value;
            infoVenta.formaPago = $itemsModal_1[1].value;
            infoVenta.recibe = $itemsModal_1[3].value;

            agregar(undefined,"ventasRegistrar", URL_RAIZ, infoVenta)
            .then(res => {
                console.log(res)
            })

            console.log(infoVenta)
        }
        if(e.target.matches(".registrar-ventas__modal-confirmar-venta-btn-cancelar")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
        if(e.target.matches(".registrar-ventas__modal-venta-exitosa-btn")) {
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_2.toggleAttribute("open")
        }
    })

    d.addEventListener("keyup",e=> {
        if(e.target == $itemsModal_1[3]) {
            infoVenta.cambio = (parseInt($itemsModal_1[3].value) - infoVenta.precioTotal) || 0;
            $itemsModal_1[4].innerHTML = "$"+infoVenta.cambio+" Pesos";
        }
    })
})();