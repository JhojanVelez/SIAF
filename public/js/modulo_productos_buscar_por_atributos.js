import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {
    const d = document,
        $formulario = d.querySelector(".productos__filtro-form"),
        $tabla = d.querySelector(".productos__table"),
        $templateTabla = $tabla.querySelector(".productos__table-template").content,
        $fragmento = d.createDocumentFragment();

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario,"productos")
        .then(res=> {
            imprimirDatosEnTabla(res)
        });
    });
    $formulario.addEventListener("change", e =>{
        buscarPorAtributos($formulario,"productos")
        .then(res=> {
            imprimirDatosEnTabla(res)
        });
    });

    function imprimirDatosEnTabla(res) {
        $tabla.querySelector("tbody").innerHTML = "";
        res.forEach(el => {
            $templateTabla.querySelector("tr").children[0].textContent = el.ProCodBarras;
            $templateTabla.querySelector("tr").children[1].textContent = el.ProDescripcion;
            $templateTabla.querySelector("tr").children[2].textContent = el.ProUbicacionFisica;
            $templateTabla.querySelector("tr").children[3].textContent = el.ProPresentacion;
            $templateTabla.querySelector("tr").children[4].textContent = el.ProUnidadMedida;
            $templateTabla.querySelector("tr").children[5].textContent = el.ProPrecioVenta;
            $templateTabla.querySelector("tr").children[6].textContent = el.ProLaboratorio;
            $templateTabla.querySelector("tr").children[7].textContent = el.ProRegSanInvima;
            $templateTabla.querySelector("tr").children[8].textContent = el.tbl_proveedores_ProNIT;
            $templateTabla.querySelector("tr").children[9].textContent = el.ProNombre;
            
            let clone = d.importNode($templateTabla,true);
            $fragmento.append(clone);
        });
        $tabla.querySelector("tbody").append($fragmento);
    }
})();