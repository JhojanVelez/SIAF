(function(){
    const d = document,
        table = d.querySelector(".registrar-ventas__table");


    table.addEventListener("mouseover",e=> {
        if(e.target.parentElement.matches(".registrar-ventas__table-tboby-tr")){
            let tr = e.target.parentElement,
                td= tr.querySelector(".registrar-ventas__table-stock-red")    || 
                    tr.querySelector(".registrar-ventas__table-stock-orange") || 
                    tr.querySelector(".registrar-ventas__table-stock-green");
            tr.classList.add(td.classList[0]);
        }
    })

    table.addEventListener("mouseout",e=> {
        if(e.target.parentElement.matches(".registrar-ventas__table-tboby-tr")){
            let tr = e.target.parentElement,
                td= tr.querySelector(".registrar-ventas__table-stock-red")    || 
                    tr.querySelector(".registrar-ventas__table-stock-orange") || 
                    tr.querySelector(".registrar-ventas__table-stock-green");
            tr.classList.remove(td.classList[0]);
        }
    })
})();