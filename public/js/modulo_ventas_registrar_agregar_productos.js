import {buscarPorId} from '../../ajax/buscarPorId.js'

const infoProductos = {};

let precioTotal = 0,
    cantidadTotal = 0;

(function(){
    const d = document,
        $transparentBackgroundModal = d.querySelector(".registrar-ventas__container-modal"),
        $modal_1 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-lista-filtro-productos"),
        $formularioAgregar = d.querySelector(".registrar-ventas__registro-form"),
        $templateProducto = d.querySelector(".registrar-ventas__lista-productos-template-producto").content,
        $contenedorListaProductos = d.querySelector(".registrar-ventas__lista-productos-contenido"),
        $contenedorTotales = d.querySelector(".registrar-ventas__lista-productos-totales"),
        $fragmento = d.createDocumentFragment();

        let idProductoSeleccionado;

    d.addEventListener("submit", e => {
        $contenedorListaProductos.innerHTML = "";
        if(e.target == $formularioAgregar) {
            e.preventDefault();

            idProductoSeleccionado = $formularioAgregar.codigoBarrasProducto.value;
            precioTotal = 0;
            cantidadTotal = 0;

            buscarPorId(idProductoSeleccionado,"ventasRegistrar",URL_RAIZ)
            .then((res)=> {
                // console.log(res)
                infoProductos[idProductoSeleccionado] = 
                {
                    nombre : $formularioAgregar.nombreProducto.value,
                    cantidad : parseInt($formularioAgregar.cantidadProducto.value),
                    precioUnidad : parseInt(res["ProPrecioVenta"]),
                    precioTotal : 0
                };

                infoProductos[idProductoSeleccionado].precioTotal = infoProductos[idProductoSeleccionado].cantidad * infoProductos[idProductoSeleccionado].precioUnidad

                
                for(let key in infoProductos) {
                    $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[0].innerHTML = key
                    $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[1].innerHTML = infoProductos[key]["nombre"]
                    $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[2].innerHTML = infoProductos[key]["cantidad"]
                    $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[3].innerHTML = "$"+infoProductos[key]["precioUnidad"]
                    $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[4].innerHTML = "$"+infoProductos[key]["precioTotal"]

                    precioTotal += infoProductos[key]["precioTotal"];
                    cantidadTotal += infoProductos[key]["cantidad"];
                    
                    let $cloneTemplateProducto =  d.importNode($templateProducto,true);
                    
                    $fragmento.append($cloneTemplateProducto);
                }

                $contenedorListaProductos.append($fragmento);
                
                $contenedorTotales.querySelectorAll(".registrar-ventas__lista-productos-totales-data")[0].innerHTML = "$"+cantidadTotal
                $contenedorTotales.querySelectorAll(".registrar-ventas__lista-productos-totales-data")[1].innerHTML = "$"+precioTotal
                
            });
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

export {infoProductos,precioTotal,cantidadTotal};