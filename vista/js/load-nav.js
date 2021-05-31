document.addEventListener("DOMContentLoaded", ()=> {

    const asyncNav = async (elemento, url) => {
        try {
            let query = await fetch(url);
            let navHTML = await query.text();
            if(!query.ok) throw query ;
            elemento.outerHTML = navHTML;
        } catch (err) {
            console.log(err)
            elemento.outerHTML = `Se ha presentado un error ${err.status} recuerda correr tu pagina en http o https o verifica la ruta de tu archivo`
        }
    } 
    document.querySelectorAll("[data-src]")
    .forEach(el => {
        asyncNav(el,el.getAttribute("data-src"))
    });
})