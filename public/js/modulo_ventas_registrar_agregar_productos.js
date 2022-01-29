(function(){
    const d = document,
        $transparentBackgroundModal = d.querySelector(".registrar-ventas__container-modal"),
        $modal_1 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-lista-filtro-productos"),
        $formularioAgregar = d.querySelector(".registrar-ventas__registro-form"),
        $templateProducto = d.querySelector(".registrar-ventas__lista-productos-template-producto").content,
        $contenedorListaProductos = d.querySelector(".registrar-ventas__lista-productos-contenido"),
        $fragmento = d.createDocumentFragment(),
        infoProductos = {};

    d.addEventListener("submit", e => {
        $contenedorListaProductos.innerHTML = "";
        if(e.target == $formularioAgregar) {
            e.preventDefault();

            infoProductos[$formularioAgregar.codigoBarrasProducto.value] = 
            {
                nombre : $formularioAgregar.nombreProducto.value,
                cantidad : $formularioAgregar.cantidadProducto.value
            };

            for(let key in infoProductos) {
                $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[0].innerHTML = key
                $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[1].innerHTML = infoProductos[key]["nombre"]
                $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[2].innerHTML = infoProductos[key]["cantidad"]
            
                $cloneTemplateProducto =  d.importNode($templateProducto,true);

                $fragmento.append($cloneTemplateProducto);
            }
            
            $contenedorListaProductos.append($fragmento);

        }
    })

    /* Colocar el codigo de barras y el nombre en el formulario cuando el usuario seleccione un producto
    en la lista de productos de Ver Productos */

    d.addEventListener("click", e=> {
        if(e.target.matches(".registrar-ventas__modal-lista-filtro-productos__table tbody td")) {
            $formularioAgregar.codigoBarrasProducto.value = e.target.parentElement.dataset.proCodBarras;
            Array.from($formularioAgregar.nombreProducto.options).forEach(el => {
                if(el.dataset.proCodBarras == $formularioAgregar.codigoBarrasProducto.value){
                    el.selected = true;
                } else {
                    el.selected = false;
                }
            });
            $transparentBackgroundModal.classList.toggle("visible")
            $modal_1.toggleAttribute("open")
        }
    })

    /*
    Colocar el codigo de barras en el campo, cuando el usuario seleccione un producto
    */

    d.addEventListener("change", e => {
        if(e.target.matches(".registrar-ventas_registro-nombre")) {
            $formularioAgregar.codigoBarrasProducto.value = e.target.options[e.target.options.selectedIndex].dataset.proCodBarras
        }
    });

    /*
    Seleccionar automaticamente el producto, cuando el usuario ingrese todo el codigo de barras
    */

    $formularioAgregar.addEventListener("keyup", e=> {
        if(e.target.matches(".registrar-ventas_registro-id")) {
            Array.from($formularioAgregar.nombreProducto.options).forEach(el => {
                if(el.dataset.proCodBarras == e.target.value){
                    el.selected = true;
                } else {
                    el.selected = false;
                }
            });
        }
    })
})();