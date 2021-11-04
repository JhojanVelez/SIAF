(function(){
    const d = document,
        table = d.querySelector(".kardex__table");


    table.addEventListener("mouseover",e=> {
        if(e.target.parentElement.matches(".kardex__table-tboby-tr")){
            let tr = e.target.parentElement,
                td= tr.querySelector(".kardex__table-stock-red")    || 
                    tr.querySelector(".kardex__table-stock-orange") || 
                    tr.querySelector(".kardex__table-stock-green");
            tr.classList.add(td.classList[0]);
        }
    })

    table.addEventListener("mouseout",e=> {
        if(e.target.parentElement.matches(".kardex__table-tboby-tr")){
            let tr = e.target.parentElement,
                td= tr.querySelector(".kardex__table-stock-red")    || 
                    tr.querySelector(".kardex__table-stock-orange") || 
                    tr.querySelector(".kardex__table-stock-green");
            tr.classList.remove(td.classList[0]);
        }
    })
})();