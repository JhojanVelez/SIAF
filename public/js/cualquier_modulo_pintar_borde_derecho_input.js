(function() {
    const d = document,
        $formModal = d.querySelectorAll("form.dialog-main-content");
        
        $formModal.forEach(el=> {
            let inputs = el.querySelectorAll(".dialog-main-content__input-container [data-input]");
            inputs.forEach(input => {
                input.addEventListener("focus",pintarBorde);
                input.addEventListener("blur",quitarBorde);
            })
        })

        function pintarBorde() {
            this.parentElement.classList.add("dialog-main-content__input-container--focus")
        }

        function quitarBorde() {
            this.parentElement.classList.remove("dialog-main-content__input-container--focus")
        }
    
})();