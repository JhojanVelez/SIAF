export function agregar (formulario,modulo) {

    return new Promise((resolve,reject)=> {
        const xhr = new XMLHttpRequest;

        const formData = new FormData(formulario)
        
        xhr.addEventListener("readystatechange", () => {
            if(xhr.readyState == 4 && xhr.status == 200) {
                // resolve(xhr.response);
                resolve(JSON.parse(xhr.response));
            }
        })
        xhr.open("POST", `http://localhost:8080/SIAF/${modulo}/registrar${modulo}`);
        xhr.send(formData);
    });
}