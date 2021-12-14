import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {
    const d = document,
        $formulario = d.querySelector(".entradas__filtro-form"),
        $tabla = d.querySelector(".entradas__table"),
        $templateTabla = $tabla.querySelector(".entradas__table-template").content,
        $fragmento = d.createDocumentFragment();

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario,"inventarioEntradas",URL_RAIZ)
        .then(res=> {
            imprimirDatosEnTabla(res);
        });
    });
    $formulario.addEventListener("change", e =>{
        buscarPorAtributos($formulario,"inventarioEntradas",URL_RAIZ)
        .then(res=> {
            imprimirDatosEnTabla(res);
        });
    });

    function imprimirDatosEnTabla(res) {
        $tabla.querySelector("tbody").innerHTML = "";
        res.forEach(el => {
            $templateTabla.querySelector("tr").children[0].innerHTML = el.EntCodigo;
            $templateTabla.querySelector("tr").children[1].innerHTML = el.tbl_productos_ProCodBarras;
            $templateTabla.querySelector("tr").children[2].innerHTML = el.ProDescripcion;
            $templateTabla.querySelector("tr").children[3].innerHTML = el.tbl_proveedores_ProNIT;
            $templateTabla.querySelector("tr").children[4].innerHTML = el.ProNombre;
            $templateTabla.querySelector("tr").children[5].innerHTML = el.EntFecha;
            $templateTabla.querySelector("tr").children[6].innerHTML = el.EntCantidad;
            $templateTabla.querySelector("tr").children[7].innerHTML = el.EntCostoProducto;
            $templateTabla.querySelector("tr").children[8].innerHTML = el.EntComentarios;
            
            let clone = d.importNode($templateTabla,true);
            $fragmento.append(clone);
        });
        $tabla.querySelector("tbody").append($fragmento);
    }
})();