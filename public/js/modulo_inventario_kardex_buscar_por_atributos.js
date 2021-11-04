import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {
    const d = document,
        $formulario = d.querySelector(".kardex__filtro-form"),
        $tabla = d.querySelector(".kardex__table"),
        $templateTabla = $tabla.querySelector(".kardex__table-template").content,
        $fragmento = d.createDocumentFragment();

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario,"InventarioKardex")
        .then(res=> {
            imprimirDatosEnTabla(res);
        });
    });
    $formulario.addEventListener("change", e =>{
        buscarPorAtributos($formulario,"InventarioKardex")
        .then(res=> {
            imprimirDatosEnTabla(res);
        });
    });

    function imprimirDatosEnTabla(res) {
        $tabla.querySelector("tbody").innerHTML = "";
        res.forEach(el => {
            $templateTabla.querySelector("tr").children[0].innerHTML = el.InvCodigo;
            $templateTabla.querySelector("tr").children[1].innerHTML = el.ProCodBarras;
            $templateTabla.querySelector("tr").children[2].innerHTML = el.ProDescripcion;
            $templateTabla.querySelector("tr").children[3].innerHTML = el.InvTotalEntradas;
            $templateTabla.querySelector("tr").children[4].innerHTML = el.InvTotalSalidas;
            $templateTabla.querySelector("tr").children[5].innerHTML = el.InvStock;
            if(el.InvStock <= 0) {
                $templateTabla.querySelector("tr").children[5].classList.add("kardex__table-stock-red");
            } else if (el.InvStock > 0 && el.InvStock < 10) {
                $templateTabla.querySelector("tr").children[5].classList.add("kardex__table-stock-orange");
            } else {
                $templateTabla.querySelector("tr").children[5].classList.add("kardex__table-stock-green");
            }
            $templateTabla.querySelector("tr").children[6].innerHTML = el.ProUbicacionFisica;
            $templateTabla.querySelector("tr").children[7].innerHTML = el.CostoProducto;
            $templateTabla.querySelector("tr").children[8].innerHTML = el.ProPrecioVenta;
            $templateTabla.querySelector("tr").children[9].innerHTML = el.ProPresentacion;
            $templateTabla.querySelector("tr").children[10].innerHTML = el.ProLaboratorio;
            $templateTabla.querySelector("tr").children[11].innerHTML = el.ProNIT;
            $templateTabla.querySelector("tr").children[12].innerHTML = el.ProNombre;
            
            let clone = d.importNode($templateTabla,true);
            $fragmento.append(clone);

            $templateTabla.querySelector("tr").children[5].classList.remove("kardex__table-stock-red");
            $templateTabla.querySelector("tr").children[5].classList.remove("kardex__table-stock-orange");
            $templateTabla.querySelector("tr").children[5].classList.remove("kardex__table-stock-green");
        });
        $tabla.querySelector("tbody").append($fragmento);
    }
})();