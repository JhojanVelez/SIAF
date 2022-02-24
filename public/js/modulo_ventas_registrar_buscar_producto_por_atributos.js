import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {
    const d = document,
        $formulario = d.querySelector(".registrar-ventas__filtro-form"),
        $tabla = d.querySelector(".registrar-ventas__modal-lista-filtro-productos__table"),
        $templateTabla = $tabla.querySelector(".registrar-ventas__table-template").content,
        $fragmento = d.createDocumentFragment();

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario,"ventasRegistrar",URL_RAIZ)
        .then(res=> {
            console.log(res)
            imprimirDatosEnTabla(res)
        });
    });
    $formulario.addEventListener("change", e =>{
        buscarPorAtributos($formulario,"ventasRegistrar",URL_RAIZ)
        .then(res=> {
            imprimirDatosEnTabla(res)
        });
    });

    function imprimirDatosEnTabla(res) {
        $tabla.querySelector("tbody").innerHTML = "";
        res.forEach(el => {
            $templateTabla.querySelector("tr").dataset.proCodBarras = el.ProCodBarras;
            $templateTabla.querySelector("tr").children[0].innerHTML = el.ProCodBarras;
            $templateTabla.querySelector("tr").children[1].innerHTML = el.ProDescripcion;
            $templateTabla.querySelector("tr").children[2].innerHTML = el.ProUbicacionFisica;
            $templateTabla.querySelector("tr").children[3].innerHTML = el.InvStock;
            if(el.InvStock <= 0) {
                $templateTabla.querySelector("tr").children[3].classList.add("registrar-ventas__table-stock-red");
            } else if (el.InvStock > 0 && el.InvStock < 10) {
                $templateTabla.querySelector("tr").children[3].classList.add("registrar-ventas__table-stock-orange");
            } else {
                $templateTabla.querySelector("tr").children[3].classList.add("registrar-ventas__table-stock-green");
            }
            $templateTabla.querySelector("tr").children[4].innerHTML = el.ProPresentacion;
            $templateTabla.querySelector("tr").children[5].innerHTML = el.ProUnidadMedida;
            $templateTabla.querySelector("tr").children[6].innerHTML = el.ProPrecioVenta;
            $templateTabla.querySelector("tr").children[7].innerHTML = el.ProLaboratorio;
            $templateTabla.querySelector("tr").children[8].innerHTML = el.ProNombre;
            
            let clone = d.importNode($templateTabla,true);
            $fragmento.append(clone);

            $templateTabla.querySelector("tr").children[3].classList.remove("registrar-ventas__table-stock-red");
            $templateTabla.querySelector("tr").children[3].classList.remove("registrar-ventas__table-stock-orange");
            $templateTabla.querySelector("tr").children[3].classList.remove("registrar-ventas__table-stock-green");
        });
        $tabla.querySelector("tbody").append($fragmento);
    }
})();