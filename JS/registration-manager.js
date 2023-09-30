/*
    Quando c'è un errore nella registrazione viene visualizzato il form di 
    registrazione e non quello di login
*/

var signup_form1 = document.getElementById("signup_form");
var login_form1 = document.getElementById("login_form");
login_form1.style.display = "none";
signup_form1.style.display = "block";