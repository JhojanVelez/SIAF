(function(){
    const d = document,
    btnInhabilitar = d.querySelector(".productos__boton-inhabilitar"),
    btnEditar = d.querySelector(".productos__boton-editar");
let product = btnInhabilitar; /* Le asigno el btn, solo por usar un elemento HTML, es decir para que no nos de error en la linea 9*/
    d.addEventListener("click", e => {

        if(e.target.matches(".productos__table td")) {
            product.classList.remove("product-selected")
            e.target.parentElement.classList.toggle("product-selected")
            let idProducto = e.target.parentElement.firstElementChild.textContent
            btnEditar.setAttribute("data-id-product", `${idProducto}`)
            btnEditar.disabled = false;
            btnInhabilitar.setAttribute("data-id-product", `${idProducto}`)
            btnInhabilitar.disabled = false;
            product = e.target.parentElement
        }
    })
})();