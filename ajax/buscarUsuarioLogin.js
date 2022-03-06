export function buscarUsuarioLogin (formulario,modulo,URL_RAIZ) {
    return new Promise ((resolve,reyect)=> {
        const xhr = new XMLHttpRequest,
            formData = new FormData(formulario);

        xhr.addEventListener("readystatechange", ()=> {
            if(xhr.readyState == 4 && (xhr.status >= 200 && xhr.status < 300)) {
                // resolve(xhr.response); 
                resolve(JSON.parse(xhr.response));
            }
        }) 
        xhr.open("POST", `${URL_RAIZ}`+`${modulo}/buscarUsuario/`);

        xhr.send(formData);
    })
}