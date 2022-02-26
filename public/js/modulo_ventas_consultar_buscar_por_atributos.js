import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {
    const d = document,
        $formulario = d.querySelector(".ventas__filtro-form"),
        $tabla = d.querySelector(".ventas__table"),
        $templateTabla = $tabla.querySelector(".ventas__table-template").content,
        $fragmento = d.createDocumentFragment();

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario,"ventasConsultarVentas",URL_RAIZ)
        .then(res=> {
            console.log(res)
            imprimirDatosEnTabla(res)
        });
    });
    $formulario.addEventListener("change", e =>{
        buscarPorAtributos($formulario,"ventasConsultarVentas",URL_RAIZ)
        .then(res=> {
            imprimirDatosEnTabla(res)
        });
    });

    function imprimirDatosEnTabla(res) {
        $tabla.querySelector("tbody").innerHTML = "";
        res.forEach(el => {
            $templateTabla.querySelector("tr").children[0].innerHTML = el.FacCodigo;
            $templateTabla.querySelector("tr").children[1].innerHTML = el.FacFecha;
            $templateTabla.querySelector("tr").children[2].innerHTML = `${el.EmpNombre} ${el.EmpApellido}`;
            $templateTabla.querySelector("tr").children[3].innerHTML = `${el.CliNombre} ${el.CliApellido}`;
            $templateTabla.querySelector("tr").children[4].innerHTML = el.CliDocIdentidad;
            $templateTabla.querySelector("tr").children[5].innerHTML = el.FacCantidadTotal;
            $templateTabla.querySelector("tr").children[6].innerHTML = el.FacTotal;
            $templateTabla.querySelector("tr").children[7].querySelector("a").href = `ventasConsultarVentas/generarFactura/${el.FacCodigo}`
            $templateTabla.querySelector("tr").children[7].querySelector("img").src = `${URL_RAIZ}public/imagenes/informe.svg`
            
            let clone = d.importNode($templateTabla,true);
            $fragmento.append(clone);
        });
        $tabla.querySelector("tbody").append($fragmento);
    }
})();