import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {
    const d = document,
        $formulario = d.querySelector(".salidas__filtro-form"),
        $tabla = d.querySelector(".salidas__table"),
        $templateTabla = $tabla.querySelector(".salidas__table-template").content,
        $fragmento = d.createDocumentFragment();

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario,"inventarioSalidas")
        .then(res=> {
            imprimirDatosEnTabla(res)
        });
    });
    $formulario.addEventListener("change", e =>{
        buscarPorAtributos($formulario,"inventarioSalidas")
        .then(res=> {
            imprimirDatosEnTabla(res)
        });
    });

    function imprimirDatosEnTabla(res) {
        $tabla.querySelector("tbody").innerHTML = "";
        res.forEach(el => {
            $templateTabla.querySelector("tr").children[0].innerHTML = el.SalCodigo;
            $templateTabla.querySelector("tr").children[1].innerHTML = el.ProCodBarras;
            $templateTabla.querySelector("tr").children[2].innerHTML = el.ProDescripcion;
            $templateTabla.querySelector("tr").children[3].innerHTML = el.ProNombre;
            $templateTabla.querySelector("tr").children[4].innerHTML = el.SalFecha;
            $templateTabla.querySelector("tr").children[5].innerHTML = el.SalCantidad;
            $templateTabla.querySelector("tr").children[6].innerHTML = el.SalTipoSalida;
            $templateTabla.querySelector("tr").children[7].innerHTML = el.SalComentarios;
            
            let clone = d.importNode($templateTabla,true);
            $fragmento.append(clone);
        });
        $tabla.querySelector("tbody").append($fragmento);
    }
})();