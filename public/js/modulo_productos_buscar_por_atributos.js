import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {
    const d = document,
        $formulario = d.querySelector(".productos__filtro-form"),
        $tabla = d.querySelector(".productos__table");

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario)
        .then(res=> {
            $tabla.querySelector("tbody").innerHTML = "";
            res.forEach(el => {
                $tabla.querySelector("tbody").innerHTML += `
                <tr>
                    <td>${el.ProCodBarras}</td>
                    <td>${el.ProDescripcion}</td>
                    <td>${el.ProUbicacionFisica}</td>
                    <td>${el.ProPresentacion}</td>
                    <td>${el.ProUnidadMedida}</td>
                    <td>${el.ProPrecioVenta}</td>
                    <td>${el.ProLaboratorio}</td>
                    <td>${el.ProRegSanInvima}</td>
                    <td>${el.tbl_proveedores_ProNIT}</td>
                    <td>${el.ProNombre}</td>
                </tr>
                `;
            });
        });
    });
    $formulario.addEventListener("change", e =>{
        buscarPorAtributos($formulario)
        .then(res=> {
            $tabla.querySelector("tbody").innerHTML = "";
            res.forEach(el => {
                $tabla.querySelector("tbody").innerHTML += `
                <tr>
                    <td>${el.ProCodBarras}</td>
                    <td>${el.ProDescripcion}</td>
                    <td>${el.ProUbicacionFisica}</td>
                    <td>${el.ProPresentacion}</td>
                    <td>${el.ProUnidadMedida}</td>
                    <td>${el.ProPrecioVenta}</td>
                    <td>${el.ProLaboratorio}</td>
                    <td>${el.ProRegSanInvima}</td>
                    <td>${el.tbl_proveedores_ProNIT}</td>
                    <td>${el.ProNombre}</td>
                </tr>
                `;
            });
        });
    });
})();