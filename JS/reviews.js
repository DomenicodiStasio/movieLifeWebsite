/*
    Per ogni recensione creo un nuovo div che permette non momento del click
    di eliminare e aggiungere la classe "open" ad ogni recensione in modo tale
    da poter essere visualizzata o nascosta.
*/

document.querySelectorAll(".review-body").forEach(function(current_rec) {
    let recensione = document.createElement("div");
    recensione.className = "recensione";
    current_rec.appendChild(recensione);
    recensione.addEventListener("click", function(e) {
        current_rec.classList.toggle("open");
    });
});