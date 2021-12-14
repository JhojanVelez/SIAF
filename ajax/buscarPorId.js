export function buscarPorId (id,modulo,URL_RAIZ) {
    return new Promise((resolve, reject)=> {
        const xhr = new XMLHttpRequest;

        xhr.addEventListener("readystatechange",()=> {

            if(xhr.status >= 400 && xhr.status <= 499) {
                reject({
                    complete: false,
                    errorMessage: `Lo sentimos, pero no se pudo realizar la inhabilitacion de la informacion a causa de un error interno, por favor vuelve a intentar o comunicate con el proveedor de servicios.<br> (${xhr.status} ${xhr.statusText})`,
                });
            }

            if(xhr.status >= 500 && xhr.status <= 599) {
                reject({
                    complete: false,
                    errorMessage: `Lo sentimos, pero no se pudo realizar la inhabilitacion de la informacion a causa de un error en el servidor, por favor vuelve a intentar o comunicate con el proveedor de servicios.<br> (${xhr.status} ${xhr.statusText})`,
                });
            }

            if(xhr.readyState == 4 && (xhr.status >= 200 && xhr.status < 300)) {
                // resolve(xhr.response);
                resolve(JSON.parse(xhr.response));
            } 
        })

        xhr.open("GET", `${URL_RAIZ}`+`${modulo}/buscarPorId/${id}`);

        xhr.send();

    })
}