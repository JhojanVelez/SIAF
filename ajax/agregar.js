export function agregar (formulario = "",modulo,URL_RAIZ,infoAdicional = "") {
    
    
    return new Promise((resolve,reject)=> {
        const xhr = new XMLHttpRequest;
        let formData;

        if(infoAdicional == "") {
            formData = new FormData(formulario);
        } else {
            formData = new FormData();
            formData.append("infoAdicional", JSON.stringify(infoAdicional));
        }

        xhr.addEventListener("readystatechange", () => {
            
            if(xhr.status >= 400 && xhr.status <= 499) {
                reject({
                    complete: false,
                    errorMessage: `Lo sentimos, pero no se pudo realizar el registro de la informacion a causa de un error interno, por favor vuelve a intentar o comunicate con el proveedor de servicios.<br> (${xhr.status} ${xhr.statusText})`,
                });
            }

            if(xhr.status >= 500 && xhr.status <= 599) {
                reject({
                    complete: false,
                    errorMessage: `Lo sentimos, pero no se pudo realizar el registro de la informacion a causa de un error en el servidor, por favor vuelve a intentar o comunicate con el proveedor de servicios.<br> (${xhr.status} ${xhr.statusText})`,
                });
            }
            
            if(xhr.readyState == 4 && (xhr.status >= 200 && xhr.status < 300)) {
                // resolve(xhr.response);
                resolve(JSON.parse(xhr.response));
            } 
        })
        xhr.open("POST", `${URL_RAIZ}`+`${modulo}/registrar`);
        xhr.send(formData);
    });
}