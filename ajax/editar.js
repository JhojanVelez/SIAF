export function editar (formulario,idProductoSeleccionado,modulo) {
    return new Promise((resolve, reject)=> {
        const xhr = new XMLHttpRequest,
            formData = new FormData(formulario);

        xhr.addEventListener("readystatechange", ()=> {
            if(xhr.status >= 400 && xhr.status <= 499) {
                reject({
                    complete: false,
                    errorMessage: `Lo sentimos, pero no se pudo realizar la modificacion de la informacion a causa de un error interno, por favor vuelve a intentar o comunicate con el proveedor de servicios.<br> (${xhr.status} ${xhr.statusText})`,
                });
            }

            if(xhr.status >= 500 && xhr.status <= 599) {
                reject({
                    complete: false,
                    errorMessage: `Lo sentimos, pero no se pudo realizar la modificacion de la informacion a causa de un error en el servidor, por favor vuelve a intentar o comunicate con el proveedor de servicios.<br> (${xhr.status} ${xhr.statusText})`,
                });
            }
            
            if(xhr.readyState == 4 && (xhr.status >= 200 && xhr.status < 300)) {
                // resolve(xhr.response);
                resolve(JSON.parse(xhr.response));
            }
        }) 
        xhr.open("POST", `https://s-i-a-f.000webhostapp.com/${modulo.toLowerCase()}/editar${modulo}/${idProductoSeleccionado}`);

        xhr.send(formData);
    })
}
