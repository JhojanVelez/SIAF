import {buscarPorId} from "../../ajax/buscarPorId.js";
import { inhabilitar } from "../../ajax/inhabilitar.js";
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".proveedores__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".proveedores__modal-inhabilitar-proveedor"),
    $modal_2 = $transparentBackgroundModal.querySelector(".proveedores__modal-inhabilitacion-exitosa"),
    $modal_3 = $transparentBackgroundModal.querySelector(".proveedores__modal-inhabilitacion-fallo");
    
    let $itemsConfirmacion = Object.values($modal_1.querySelectorAll(".proveedores__modal-inhabilitar-proveedor-info-item")),
        idProveedor;

    d.addEventListener("click", e => {
        if(e.target.closest("button.proveedores__lista-proveedor-boton-inhabilitar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            scroll(0,280);
            idProveedor = e.target.closest("button.proveedores__lista-proveedor-boton-inhabilitar").dataset.nitProveedor;
            buscarPorId(idProveedor,"proveedores",URL_RAIZ)
            .then((res)=> {
                console.log(res)
                for(let key in res) {
                    $itemsConfirmacion.filter(el => {
                        if (Object.keys(el.dataset)[0] == key.toLowerCase()) {
                            el.querySelector("P").innerHTML = res[key];
                        }
                    })
                }
            });
        }
        if(e.target.matches(".proveedores__modal-inhabilitar-proveedor-btn-confirmar")) {
            $modal_1.toggleAttribute("open");

            inhabilitar(idProveedor,"proveedores",URL_RAIZ)
            .then(res => {
                if(res.affectedRows != 0) {
                    $modal_2.toggleAttribute("open");
                    $modal_2.querySelector("P").innerHTML = res.resultMessage;
                    console.log(res);
                } else {
                    $modal_3.toggleAttribute("open");
                    $modal_3.querySelector("H2").innerHTML = "!Por la seguridad de la informacion¡"
                    $modal_3.querySelector("P").innerHTML = res.resultMessage || "Selecciona un proveedor para poder inhabilitar";
                }
            }).catch((err)=> {
                console.log(err);
                $modal_3.toggleAttribute("open");
                $modal_3.querySelector("P").innerHTML = err.errorMessage;
            });
        }

        if(e.target.matches(".proveedores__modal-inhabilitar-proveedor-btn-cancelar")){
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }

        if(e.target.matches(".proveedores__modal-inhabilitacion-exitosa-btn")) {
            location.reload();
        }
        if(e.target.matches(".proveedores__modal-inhabilitacion-fallo-btn")) {
            $modal_3.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })
})();