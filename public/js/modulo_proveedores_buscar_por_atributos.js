import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {
    const d = document,
        $formulario = d.querySelector(".proveedores__filtro-form"),
        $contenedorProveedores = d.querySelector(".proveedores__lista-contenido"),
        $templateTabla = $contenedorProveedores.querySelector(".proveedores__lista-proveedor-template").content,
        $fragmento = d.createDocumentFragment();

        console.log()

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario,"proveedores")
        .then(res=> {
            console.log(res)
            imprimirDatosEnTabla(res)
        });
    });

    function imprimirDatosEnTabla(res) {
        $contenedorProveedores.innerHTML = "";
        res.forEach(el => {
            $templateTabla.querySelectorAll(".proveedores__lista-proveedor-data")[0].innerHTML = el.ProNIT;
            $templateTabla.querySelectorAll(".proveedores__lista-proveedor-data")[1].innerHTML = el.ProNombre;
            $templateTabla.querySelectorAll(".proveedores__lista-proveedor-data")[2].innerHTML = el.ProTelefono;
            $templateTabla.querySelectorAll(".proveedores__lista-proveedor-data")[3].innerHTML = el.ProCorreo;
            $templateTabla.querySelectorAll(".proveedores__lista-proveedor-data")[4].innerHTML = el.ProDireccion;
            $templateTabla.querySelectorAll(".proveedores__lista-proveedor-data")[5].innerHTML = el.ProCiudad;
            
            $templateTabla.querySelectorAll(".proveedores__lista-proveedor-boton")[0].dataset.nitProveedor = el.ProNIT;
            $templateTabla.querySelectorAll(".proveedores__lista-proveedor-boton")[1].dataset.nitProveedor = el.ProNIT;
            
            let clone = d.importNode($templateTabla,true);
            $fragmento.append(clone);
        });
        $contenedorProveedores.append($fragmento);
    }
})();