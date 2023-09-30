
/*
    Quando un utente non loggato esegue un click sul pulsante dei preferiti 
    viene redirizzato alla pagina di login
*/
var add_rec = document.getElementById("go-to-rate");

add_rec.addEventListener("click",function(e){
    e.preventDefault();
    window.location.assign("login_registration.php");
});

/*
    Quando un utente non loggato esegue un click sul pulsante per inserire 
    una recensione viene redirizzato alla pagina di login
*/
var pref_btn = document.getElementById("add-fav");
pref_btn.addEventListener("click",function(e){
    e.preventDefault();
    window.location.assign("login_registration.php");
})

