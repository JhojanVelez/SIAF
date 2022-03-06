import {buscarPorId} from '../../ajax/buscarPorId.js'

const infoVenta = {
    infoProductos : {},
    docCliente : 0,
    docVendedor : "",
    cantidadTotal : 0,
    precioTotal : 0,
    recibe : 0,
    cambio : 0,
    formaPago : ""
};

(function(){
    const d = document,
        $transparentBackgroundModal = d.querySelector(".registrar-ventas__container-modal"),
        $modal_1 = $transparentBackgroundModal.querySelector(".registrar-ventas__modal-lista-filtro-productos"),
        $formularioAgregar = d.querySelector(".registrar-ventas__registro-form"),
        $templateProducto = d.querySelector(".registrar-ventas__lista-productos-template-producto").content,
        $contenedorListaProductos = d.querySelector(".registrar-ventas__lista-productos-contenido"),
        $contenedorTotales = d.querySelector(".registrar-ventas__lista-productos-totales"),
        $fragmento = d.createDocumentFragment();

    const $botonVender = d.querySelector(".registrar-ventas__boton-vender");

    const $inputsFormularioAgregar = Object.values($formularioAgregar.querySelectorAll("[data-input]"));

    let idProductoSeleccionado;

    let validador;

    d.addEventListener("submit", e => {

        if(e.target == $formularioAgregar) {
            e.preventDefault();

            validador = true;

            $inputsFormularioAgregar.forEach(input => {
                if(input.value == "") {
                    input.classList.add("input-invalido");
                    validador = false; 
                } else {
                    input.classList.remove("input-invalido");
                }
            });

            if($inputsFormularioAgregar[2].value <= 0) {
                $inputsFormularioAgregar[2].classList.add("input-invalido");
                validador = false; 
            } else {
                $inputsFormularioAgregar[2].classList.remove("input-invalido");
            }

            if(validador) {

                $botonVender.removeAttribute("disabled")
                $botonVender.removeAttribute("title")

                idProductoSeleccionado = $formularioAgregar.codigoBarrasProducto.value;

                buscarPorId(idProductoSeleccionado,"ventasRegistrar",URL_RAIZ)
                .then((res)=> {
                    // console.log(res)
                    infoVenta.infoProductos[idProductoSeleccionado] = 
                    {
                        nombre : $formularioAgregar.nombreProducto.value,
                        cantidad : parseInt($formularioAgregar.cantidadProducto.value),
                        precioUnidad : parseInt(res["ProPrecioVenta"]),
                        precioTotal : 0
                    };
                
                    infoVenta.infoProductos[idProductoSeleccionado].precioTotal = infoVenta.infoProductos[idProductoSeleccionado].cantidad * infoVenta.infoProductos[idProductoSeleccionado].precioUnidad
                
                    pintarProductosAVender();
                    
                });
            } else {
                $botonVender.setAttribute("title", "Por favor agrega un producto a la lista de productos para vender, para poder continuar")
                $botonVender.setAttribute("disabled", "")
            }
        }
    })
    
    /* Colocar el codigo de barras y el nombre en el formulario cuando el usuario seleccione un producto
    en la lista de productos de Ver Productos */
    
    d.addEventListener("click", e=> {
        console.log(infoVenta)
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
        /* Eliminar un producto de la lista de productos a vender */
        
        if(e.target.matches(".registrar-ventas__lista-producto-boton img")) {
            let $productoSeleccionado = e.target.closest(".registrar-ventas__lista-producto");
            let codigoProductoSeleccionado = $productoSeleccionado.dataset.codigoProducto;
            delete infoVenta.infoProductos[codigoProductoSeleccionado]

            pintarProductosAVender();

            if (infoVenta.cantidadTotal == 0 || isNaN(infoVenta.cantidadTotal)) {
                $botonVender.setAttribute("disabled","")
                $botonVender.setAttribute("title", "Por favor agrega un producto a la lista de productos para vender, para poder continuar")
            } else {
                $botonVender.removeAttribute("disabled")
                $botonVender.removeAttribute("title")
            }
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

    const pintarProductosAVender = () => {
        $contenedorListaProductos.innerHTML = "";

        infoVenta.precioTotal = 0;
        infoVenta.cantidadTotal = 0;

        for(let key in infoVenta.infoProductos) {
            $templateProducto.firstElementChild.dataset.codigoProducto = key
            $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[0].innerHTML = key
            $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[1].innerHTML = infoVenta.infoProductos[key]["nombre"]
            $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[2].innerHTML = infoVenta.infoProductos[key]["cantidad"]
            $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[3].innerHTML = "$"+infoVenta.infoProductos[key]["precioUnidad"]
            $templateProducto.querySelectorAll(".registrar-ventas__lista-producto-data")[4].innerHTML = "$"+infoVenta.infoProductos[key]["precioTotal"]

            infoVenta.precioTotal += infoVenta.infoProductos[key]["precioTotal"];
            infoVenta.cantidadTotal += infoVenta.infoProductos[key]["cantidad"];
                
            let $cloneTemplateProducto =  d.importNode($templateProducto,true);
                
            $fragmento.append($cloneTemplateProducto);
        }

        $contenedorListaProductos.append($fragmento);
            
        $contenedorTotales.querySelectorAll(".registrar-ventas__lista-productos-totales-data")[0].innerHTML = "$"+infoVenta.cantidadTotal
        $contenedorTotales.querySelectorAll(".registrar-ventas__lista-productos-totales-data")[1].innerHTML = "$"+infoVenta.precioTotal
    }
    
})();

export {infoVenta};