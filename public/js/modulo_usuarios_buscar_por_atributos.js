import { buscarPorAtributos } from "../../ajax/buscarPorAtributos.js";
(function () {

    const d = document,
        $contenedorUsuarios = document.querySelector(".usuarios__lista-contenido"),
        $formulario = d.querySelector(".usuarios__filtro-form"),
        $templateUsuario = $contenedorUsuarios.querySelector(".usuarios__lista-usuario-template").content,
        $fragmento = d.createDocumentFragment();

    $formulario.addEventListener("keyup", e =>{
        buscarPorAtributos($formulario,"usuarios",URL_RAIZ)
        .then(res=> {
            imprimirDatosEnTabla(res)
        });
    });
    
    console.log($templateUsuario.querySelector(".usuarios__lista-usuario-img img"))
    function imprimirDatosEnTabla(res) {
        $contenedorUsuarios.innerHTML = "";
        res.forEach(el => {

            $templateUsuario.querySelector(".usuarios__lista-usuario-img img").src = el.EmpIMG
            $templateUsuario.querySelectorAll(".usuarios__lista-usuario-data")[0].innerHTML = el.EmpDocIdentidad;
            $templateUsuario.querySelectorAll(".usuarios__lista-usuario-data")[1].innerHTML = el.EmpNombre;
            $templateUsuario.querySelectorAll(".usuarios__lista-usuario-data")[2].innerHTML = el.EmpApellido;
            $templateUsuario.querySelectorAll(".usuarios__lista-usuario-data")[3].innerHTML = el.EmpEps;
            $templateUsuario.querySelectorAll(".usuarios__lista-usuario-data")[4].innerHTML = el.EmpTelefono;
            $templateUsuario.querySelectorAll(".usuarios__lista-usuario-data")[5].innerHTML = el.EmpCorreo;
            $templateUsuario.querySelectorAll(".usuarios__lista-usuario-data")[6].innerHTML = el.EmpDireccion;
            $templateUsuario.querySelectorAll(".usuarios__lista-usuario-data")[7].innerHTML = el.EmpRH;
            $templateUsuario.querySelectorAll(".usuarios__lista-usuario-data")[8].innerHTML = el.EmpRol;
            
            $templateUsuario.querySelectorAll(".usuarios__lista-usuario-boton")[0].dataset.docUsuario = el.EmpDocIdentidad;
            $templateUsuario.querySelectorAll(".usuarios__lista-usuario-boton")[1].dataset.docUsuario = el.EmpDocIdentidad;
            
            let clone = d.importNode($templateUsuario,true);
            $fragmento.append(clone);
        });
        $contenedorUsuarios.append($fragmento);
    }
})();