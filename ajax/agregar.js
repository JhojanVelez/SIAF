export function agregar (formulario) {

    const xhr = new XMLHttpRequest;

    const formData = new FormData(formulario)

    xhr.addEventListener("readystatechange", () => {
        console.log(xhr)
        if(xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText)
        }
    })

    xhr.open("POST", "http://localhost:8080/SIAF/productos/registrar");

    xhr.send(formData);
}