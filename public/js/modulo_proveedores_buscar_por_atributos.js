import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {
    const d = document,
        $formulario = d.querySelector(".proveedores__filtro-form"),
        $contenedorProveedores = d.querySelector(".proveedores__lista-contenido"),
        $templateProveedor = $contenedorProveedores.querySelector(".proveedores__lista-proveedor-template").content,
        $fragmento = d.createDocumentFragment();

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario,"proveedores",URL_RAIZ)
        .then(res=> {
            imprimirDatosEnTabla(res)
        });
    });

    function imprimirDatosEnTabla(res) {
        $contenedorProveedores.innerHTML = "";
        res.forEach(el => {
            $templateProveedor.querySelectorAll(".proveedores__lista-proveedor-data")[0].innerHTML = el.ProNIT;
            $templateProveedor.querySelectorAll(".proveedores__lista-proveedor-data")[1].innerHTML = el.ProNombre;
            $templateProveedor.querySelectorAll(".proveedores__lista-proveedor-data")[2].innerHTML = el.ProTelefono;
            $templateProveedor.querySelectorAll(".proveedores__lista-proveedor-data")[3].innerHTML = el.ProCorreo;
            $templateProveedor.querySelectorAll(".proveedores__lista-proveedor-data")[4].innerHTML = el.ProDireccion;
            $templateProveedor.querySelectorAll(".proveedores__lista-proveedor-data")[5].innerHTML = el.ProCiudad;
            
            $templateProveedor.querySelectorAll(".proveedores__lista-proveedor-boton")[0].dataset.nitProveedor = el.ProNIT;
            $templateProveedor.querySelectorAll(".proveedores__lista-proveedor-boton")[1].dataset.nitProveedor = el.ProNIT;
            
            let clone = d.importNode($templateProveedor,true);
            $fragmento.append(clone);
        });
        $contenedorProveedores.append($fragmento);
    }
})();