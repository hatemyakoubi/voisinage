window.onload = () => {
    // On va chercher la région
    let category = document.querySelector("#offre_categorie");
    category.addEventListener("change", function () {
        let form = this.closest("form");
        let data = this.name + "=" + this.value;

        fetch(form.action, {
            method: form.getAttribute("method"),
            body: data,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset:UTF-8"
            }
        })
            .then(response => response.text())
            .then(html => {
                let content = document.createElement("html");
                content.innerHTML = html;
                let nouveauSelect = content.querySelector("#offre_souscategorie");
                document.querySelector("#offre_souscategorie").replaceWith(nouveauSelect);
            })
            .catch(error => {
                console.log(error);
            })
    });
}

