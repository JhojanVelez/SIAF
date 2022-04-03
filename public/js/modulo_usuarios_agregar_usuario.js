import {agregar} from '../../ajax/agregar.js'
(function(){
    const d = document,
    $transparentBackgroundModal = d.querySelector(".usuarios__container-modal"),
    $modal_1 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregar-usuario"),
    $modal_2 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregar-usuario-confirmacion"),
    $modal_3 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregacion-exitosa"),
    $modal_4 = $transparentBackgroundModal.querySelector(".usuarios__modal-agregacion-fallo");
    
    let $formulario = $modal_1.querySelector("form"),
    $inputs = Object.values($formulario.querySelectorAll("[data-input]")),
    $itemsConfirmacion = Object.values($modal_2.querySelectorAll(".usuarios__modal-agregar-usuario-info-item-confirmacion"));

    let validador;

    /* Patrones para validacion de Email */
    let patronEstandardOfficial = "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$";
    let patronPersonal = "^([a-z]|[A-Z]|[0-9]|[!#$%&'*+\-\/=?^_`{|}~;])+@([a-z]|[A-Z]|[0-9])+\\.([a-z]|[A-Z]|[0-9])+(\\.|[[a-z]|[A-Z]|[0-9])*$";

    /* Patron para validacion de Password */

    let patronValidarPassword = "^(?=.*[0-9]+)(?=.*[A-Z]+)(?=.*[a-z]+)(?=.*[\!\"\#\$\%\&\'\(\)\*\+\,\-\.\/\:\;\<\=\>\?\@\\[\\]\^\_\`\{\|\}\~]+).{8,}$"

    d.addEventListener("click", e => {
        if(e.target.matches(".usuarios__boton-agregar")) {
            $transparentBackgroundModal.classList.toggle("visible");
            $modal_1.toggleAttribute("open");
            $modal_1.querySelector("#docUsuario").focus()
            scroll(0,280);
        }
        if(e.target.matches(".usuarios__modal-agregar-usuario-btn-añadir")) {
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
            
            if(isNaN($inputs[5].value)){
                $inputs[5].classList.add("input-invalido");
                validador = false;
            }

            if(validarCorreo() && validarPassword() && validarRH () && validador) {
                console.log("nel")
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
        if(e.target.matches(".usuarios__modal-agregar-usuario-btn-cancelar")) {
            e.preventDefault()
            $modal_1.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
        if(e.target.matches(".usuarios__modal-agregar-usuario-confirmacion-btn-confirmar")) {
            $modal_2.toggleAttribute("open");
            agregar($formulario, "usuarios",URL_RAIZ)
            .then(res=>{
                console.log(res);
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
        if(e.target.matches(".usuarios__modal-agregar-usuario-confirmacion-btn-cancelar")) {
            $modal_1.toggleAttribute("open");
            $modal_2.toggleAttribute("open");
        }
        if(e.target.matches(".usuarios__modal-agregacion-exitosa-btn")) {
            location.reload();
        }
        if(e.target.matches(".usuarios__modal-agregacion-fallo-btn")) {
            $modal_4.toggleAttribute("open");
            $transparentBackgroundModal.classList.toggle("visible");
        }
    })

    /* codigo para poder dar una vista previa de la imagen a subir */

    d.addEventListener("change", e => {
        if(e.target.matches(".usuarios-modal-agregar-usuario-form-img-container__file")) {

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
        if(e.target == $inputs[9]) {
            validarPassword();
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

    function validarPassword () {
        let regex = new RegExp(patronValidarPassword,"g");
        console.log($inputs[9].value);
        if(regex.test($inputs[9].value)) {
            $inputs[9].classList.remove("input-invalido");
            $inputs[9].classList.add("input-valido");
            $formulario.querySelector(".pass-correcto").classList.add("visible");
            $formulario.querySelector(".pass-incorrecto").classList.remove("visible");
            return true;
        } else {
            $inputs[9].classList.remove("input-valido");
            $inputs[9].classList.add("input-invalido");
            $formulario.querySelector(".pass-correcto").classList.remove("visible");
            $formulario.querySelector(".pass-incorrecto").classList.add("visible");
            return false;
        }
    }

    /* eventos que aparecen y desaparecen el aviso de la contraseña */

    $inputs[9].addEventListener("focus", e => {
        e.target.nextElementSibling.classList.add("visible");
    })
    $inputs[9].addEventListener("blur", e => {
        e.target.nextElementSibling.classList.remove("visible");
    })
})();