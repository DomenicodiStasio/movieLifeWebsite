

/*
    Quando l'utente seleziona un certo avatar esso viene visualizzato con il bordo 
    bianco e leggermente opaco
*/

var lista_immagini = document.getElementsByClassName("avatar_image");


/* 
    Cerco di fare il for each
*/
lista_immagini[0].addEventListener("click",function(e){
    lista_immagini[0].style.border = "1px solid white";
    lista_immagini[0].style.opacity = "0.8";
    lista_immagini[1].style.border = "none";
    lista_immagini[1].style.opacity = "1";
    lista_immagini[2].style.border = "none";
    lista_immagini[2].style.opacity = "1";
    lista_immagini[3].style.border = "none";
    lista_immagini[3].style.opacity = "1";
    lista_immagini[4].style.border = "none";
    lista_immagini[4].style.opacity = "1";
})

lista_immagini[1].addEventListener("click",function(e){
    lista_immagini[1].style.border = "1px solid white";
    lista_immagini[1].style.opacity = "0.8";
    lista_immagini[0].style.border = "none";
    lista_immagini[0].style.opacity = "1";
    lista_immagini[2].style.border = "none";
    lista_immagini[2].style.opacity = "1";
    lista_immagini[3].style.border = "none";
    lista_immagini[3].style.opacity = "1";
    lista_immagini[4].style.border = "none";
    lista_immagini[4].style.opacity = "1";
})

lista_immagini[2].addEventListener("click",function(e){
    lista_immagini[2].style.border = "1px solid white";
    lista_immagini[2].style.opacity = "1";
    lista_immagini[1].style.border = "none";
    lista_immagini[1].style.opacity = "1";
    lista_immagini[0].style.border = "none";
    lista_immagini[0].style.opacity = "1";
    lista_immagini[3].style.border = "none";
    lista_immagini[3].style.opacity = "1";
    lista_immagini[4].style.border = "none";
    lista_immagini[4].style.opacity = "1";
})

lista_immagini[3].addEventListener("click",function(e){
    lista_immagini[3].style.border = "1px solid white";
    lista_immagini[3].style.opacity = "0.8";
    lista_immagini[1].style.border = "none";
    lista_immagini[1].style.opacity = "1";
    lista_immagini[2].style.border = "none";
    lista_immagini[2].style.opacity = "1";
    lista_immagini[0].style.border = "none";
    lista_immagini[0].style.opacity = "1";
    lista_immagini[4].style.border = "none";
    lista_immagini[4].style.opacity = "1";
})

lista_immagini[4].addEventListener("click",function(e){
    lista_immagini[4].style.border = "1px solid white";
    lista_immagini[4].style.opacity = "0.8";
    lista_immagini[1].style.border = "none";
    lista_immagini[1].style.opacity = "1";
    lista_immagini[2].style.border = "none";
    lista_immagini[2].style.opacity = "1";
    lista_immagini[3].style.border = "none";
    lista_immagini[3].style.opacity = "1";
    lista_immagini[0].style.border = "none";
    lista_immagini[0].style.opacity = "1";
})

/*
    Effettuando il click sull'avatar del profilo compariranno tutti gli avatar selezionabili
    per la sua modifica
*/
var avatar_profilo = document.getElementById("profile-image");
var lista_avatar = document.getElementById("lista_avatar");

avatar_profilo.addEventListener("click", function(e){
    
    lista_avatar.style.display = "inline-block";
     
})


/*
    Effettuando il click su "I miei preferiti" comparirà o scomparirà la lista dei film 
    preferiti dall'utente loggato
*/

var preferiti_btn = document.getElementById("section-title-preferiti");
var preferiti_list = document.querySelector("#list-preferiti");
var preferiti_style = getComputedStyle(preferiti_list)


preferiti_btn.addEventListener("click",function(e){
    if (preferiti_style.display=="none")
        preferiti_list.style.display="grid";
    else
        preferiti_list.style.display="none";
})

/*
    Effettuando il click su "Le mie recensioni" comparirà o scomparirà la lista delle 
    recensioni ai film scritte dall'utente loggato
*/

var recensioni_btn = document.getElementById("section-title-recensioni");
var recensioni_list = document.querySelector("#list-recensioni");
var recensioni_style = getComputedStyle(recensioni_list);

recensioni_btn.addEventListener("click",function(e){
    if (recensioni_style.display=="none")
        recensioni_list.style.display="block";
    else
        recensioni_list.style.display="none";
})








// edit form

function func(){
    document.getElementById("edit-dati-profilo").style.display = "block";
    document.getElementById("dati-profilo").style.display = "none";
}

var edit_form = document.forms.edit-form;

edit_form.addEventListener("submit",function(event){
        event.preventDefault();

        if (edit_form.edit_username.value == ""){
            document.getElementById("edit_username").focus();
            return false;
        } 
        if (edit_form.edit_nome.value == ""){
            document.getElementById("edit_nome").focus();
            return false;
        } 
        if (edit_form.edit_cognome.value == ""){
            
            document.getElementById("edit_cognome").focus();
            return false;
        } 
        if (edit_form.edit_email.value == ""){
            
            document.getElementById("edit_email").focus();
            return false;
        } 
        edit_form.submit();
});

/*
    Effettuando il salvataggio delll'avatar del profilo scompare la lista degli avatar
*/

var save_btn = document.getElementsByClassName("saveBtn");

save_btn.addEventListener("click",function(e){
    lista_avatar.style.display = "none";  
})

