import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {
    const d = document,
        $formulario = d.querySelector(".clientes__filtro-form"),
        $contenedorClientes = d.querySelector(".clientes__lista-contenido"),
        $templateCliente = $contenedorClientes.querySelector(".clientes__lista-cliente-template").content,
        $fragmento = d.createDocumentFragment();

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario,"clientes",URL_RAIZ)
        .then(res=> {
            imprimirDatosEnTabla(res)
            // console.log(res);
        });
    });

    function imprimirDatosEnTabla(res) {
        $contenedorClientes.innerHTML = "";
        res.forEach(el => {
            $templateCliente.querySelectorAll(".clientes__lista-cliente-data")[0].innerHTML = el.CliDocIdentidad;
            $templateCliente.querySelectorAll(".clientes__lista-cliente-data")[1].innerHTML = el.CliTelefono;
            $templateCliente.querySelectorAll(".clientes__lista-cliente-data")[2].innerHTML = el.CliNombre;
            $templateCliente.querySelectorAll(".clientes__lista-cliente-data")[3].innerHTML = el.CliApellido;
            $templateCliente.querySelectorAll(".clientes__lista-cliente-data")[4].innerHTML = el.CliCorreo;
            $templateCliente.querySelectorAll(".clientes__lista-cliente-data")[5].innerHTML = el.CliDireccion;
            
            $templateCliente.querySelectorAll(".clientes__lista-cliente-boton")[0].dataset.docCliente = el.CliDocIdentidad;
            $templateCliente.querySelectorAll(".clientes__lista-cliente-boton")[1].dataset.docCliente = el.CliDocIdentidad;
            
            let clone = d.importNode($templateCliente,true);
            $fragmento.append(clone);
        });
        $contenedorClientes.append($fragmento);
    }
})();