export function buscarPorAtributos (formulario,modulo) {
    return new Promise ((resolve,reyect)=> {
        const xhr = new XMLHttpRequest,
            formData = new FormData(formulario);

        xhr.addEventListener("readystatechange", ()=> {
            if(xhr.readyState == 4 && (xhr.status >= 200 && xhr.status < 300)) {
                // resolve(xhr.response);
                resolve(JSON.parse(xhr.response));
            }
        }) 
        xhr.open("POST", `https://s-i-a-f.000webhostapp.com/${modulo}/buscarPorAtributos/`);

        xhr.send(formData);
    })
}