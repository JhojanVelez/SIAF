import { buscarPorId } from "../../ajax/buscarPorId.js"
import { editar } from "../../ajax/editar.js";
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".usuarios__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".usuarios__modal-editar-usuario"),
    $modal_2 = $transparentBackgroundModal.querySelector(".usuarios__modal-editar-usuario-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".usuarios__modal-modificacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".usuarios__modal-modificacion-fallo");
    
    let $formulario = $modal_1.querySelector("form"),
        $inputs = Object.values($modal_1.querySelectorAll("[data-input]")),
        $itemsConfirmacion = Object.values($modal_2.querySelectorAll(".usuarios__modal-editar-usuario-info-item-confirmacion")),
        docUsuario;

    let validador;

    console.log($inputs)

    /* Patrones para validacion de Email */
    let patronEstandardOfficial = "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$";
    let patronPersonal = "^([a-z]|[A-Z]|[0-9]|[!#$%&'*+\-\/=?^_`{|}~;])+@([a-z]|[A-Z]|[0-9])+\\.([a-z]|[A-Z]|[0-9])+(\\.|[[a-z]|[A-Z]|[0-9])*$";

    d.addEventListener("click", e => {

        if(e.target.closest("button.usuarios__lista-usuario-boton-editar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            scroll(0,280);
            docUsuario = e.target.closest("button.usuarios__lista-usuario-boton-editar").dataset.docUsuario;
            buscarPorId(docUsuario,"usuarios",URL_RAIZ)
            .then((res)=> {
                for(let key in res) {
                    $inputs.filter(el => {
                        if (Object.keys(el.dataset)[1] == key.toLowerCase()) {
                            (Object.keys(el.dataset)[1] == "empimg")
                            ? el.previousElementSibling.src = res[key]+"?="+parseInt(Math.random()*50)
                            : el.value = res[key];
                        }
                    })
                }
                $modal_1.toggleAttribute("open");
                $formulario.documento.focus();
            });
        }
        if(e.target.matches(".usuarios__modal-editar-usuario-btn-editar")) {
            e.preventDefault();
            
            validador = true;

            $inputs.forEach(el => {
                if(Object.keys(el.dataset)[1] != "empimg" && Object.keys(el.dataset)[1] != "emppassword") el.value = el.value.toUpperCase().trim();
            });

            $inputs.forEach(input => {
                if(Object.keys(input.dataset)[1] != "empimg") {
                    if(input.value == "") {
                        input.classList.add("input-invalido");
                        validador = false;
                    } else {
                        input.classList.remove("input-invalido");
                    }
                }
            });

            if(isNaN($inputs[0].value)){
                $inputs[0].classList.add("input-invalido");
                validador = false;
            }

            //Validando el campo nombre y apellido
            
            const regex = /^[a-zA-Z\s]+$/
            
            if(!regex.test($inputs[2].value)) {
                $inputs[2].classList.add("input-invalido");
                validador = false;
            }

            if(!regex.test($inputs[4].value)) {
                $inputs[4].classList.add("input-invalido");
                validador = false;
            }
            
            if(isNaN($inputs[5].value)){
                $inputs[5].classList.add("input-invalido");
                validador = false;
            }

            if($inputs[9].value != "GERENTE" && $inputs[9].value != "FARMACEUTA" && $inputs[9].value != "ALMACENISTA"){
                $inputs[9].classList.add("input-invalido");
                validador = false;
            }

            if(validarCorreo() && validarRH() && validador) {
                $modal_1.toggleAttribute("open");
                
                $inputs.forEach(input => {
                    $itemsConfirmacion.forEach(item => {
                        if(Object.keys(input.dataset)[1] == Object.keys(item.dataset)[0]) {
                            (Object.keys(input.dataset)[1] == "empimg") 
                                ? item.querySelector("img").src = input.previousElementSibling.src
                                : item.querySelector("P").innerText = input.value;
                        }
                    })
                })

                $modal_2.toggleAttribute("open");
            }
        }
        if(e.target.matches(".usuarios__modal-editar-usuario-btn-cancelar")) {
            e.preventDefault();
            $inputs[8].previousElementSibling.src = "";
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".usuarios__modal-editar-usuario-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            editar($formulario,docUsuario,"usuarios",URL_RAIZ)
            .then(res=>{
                console.log(res)
                if(res.complete) {
                    $modal_3.toggleAttribute("open");
                } else {
                    $modal_4.toggleAttribute("open");
                    $modal_4.querySelector("P").innerHTML = res.errorMessage;
                }
            }).catch(err => {
                $modal_4.toggleAttribute("open");
                $modal_4.querySelector("P").innerHTML = err.errorMessage;
            });
        }
        if(e.target.matches(".usuarios__modal-editar-usuario-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".usuarios__modal-modificacion-exitosa-btn")) {
            location.reload();
        }
        if(e.target.matches(".usuarios__modal-modificacion-fallo-btn")) {
            $modal_4.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })

    /* codigo para poder dar una vista previa de la imagen a subir */

    d.addEventListener("change", e => {
        console.log(e.target)
        if(e.target.matches(".usuarios-modal-editar-usuario-form-img-container__file")) {

            /*  Con fileReader, podremos obtener el contenido de la imagen que se vaya a subir y poner una vista previa
                de esta, atravez del evento loadend
            */

            const reader = new FileReader();

            reader.addEventListener("loadend", e_reader => {
                e.target.previousElementSibling.src = e_reader.target.result;
            })

            reader.readAsDataURL(e.target.files[0])
        }
    })

    /* codigo para poder validar el correo */

    $formulario.addEventListener("keyup",e => {
        if(e.target == $inputs[1]) {
            validarCorreo();
        }

        if(e.target == $inputs[7]) {
            validarRH();
        }
    })

    function validarCorreo () {
        let regex = new RegExp(patronPersonal,"g");
        if(regex.test($inputs[1].value)) {
            $inputs[1].classList.remove("input-invalido");
            return true;
        } else {
            $inputs[1].classList.add("input-invalido");
            return false;
        }
    }

    function validarRH () {
        const tiposSangre = ["A+","B+","O+","A-","B-","O-","AB-","AB+"];

        $inputs[7].value = $inputs[7].value.toUpperCase()
        
        let validadorAuxiliar = 0;

        for(let i = 0; i < tiposSangre.length; i++) {
            if($inputs[7].value == tiposSangre[i]) {
                validadorAuxiliar = 1;
                break;
            }
        }

        if(validadorAuxiliar != 1 || $inputs[7].value.length > 3) {
            $inputs[7].classList.add("input-invalido");
            return false;
        } else {
            $inputs[7].classList.remove("input-invalido");
            return true;
        }
    }
})();