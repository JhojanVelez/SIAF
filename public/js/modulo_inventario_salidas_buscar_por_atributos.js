import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {
    const d = document,
        $formulario = d.querySelector(".salidas__filtro-form"),
        $tabla = d.querySelector(".salidas__table");

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario,"InventarioSalidas")
        .then(res=> {
            console.log(res)
            $tabla.querySelector("tbody").innerHTML = "";
            res.forEach(el => {
                $tabla.querySelector("tbody").innerHTML += `
                <tr>
                    <td>${el.SalCodigo}</td>
                    <td>${el.ProCodBarras}</td>
                    <td>${el.ProDescripcion}</td>
                    <td>${el.ProNombre}</td>
                    <td>${el.SalFecha}</td>
                    <td>${el.SalCantidad}</td>
                    <td>${el.SalTipoSalida}</td>
                    <td>${el.SalComentarios}</td>
                </tr>
                `;
            });
        });
    });
    $formulario.addEventListener("change", e =>{
        buscarPorAtributos($formulario,"InventarioSalidas")
        .then(res=> {
            console.log(res)
            $tabla.querySelector("tbody").innerHTML = "";
            res.forEach(el => {
                $tabla.querySelector("tbody").innerHTML += `
                <tr>
                    <td>${el.SalCodigo}</td>
                    <td>${el.ProCodBarras}</td>
                    <td>${el.ProDescripcion}</td>
                    <td>${el.ProNombre}</td>
                    <td>${el.SalFecha}</td>
                    <td>${el.SalCantidad}</td>
                    <td>${el.SalTipoSalida}</td>
                    <td>${el.SalComentarios}</td>
                </tr>
                `;
            });
        });
    });
})();