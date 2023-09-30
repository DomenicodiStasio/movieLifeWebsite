/*
    Effettuando il mouse-over sulla voce categorie del menu viene mostrato il menu 
    delle categorie fin quando non si effettua il mouse-out dal menu.
*/

var link = document.getElementById("categorie-link");
var menu = document.getElementById("categorie-menu");

link.addEventListener("mouseover",function(e){
    menu.style.display="flex";
});

menu.addEventListener("mouseover",function(e){
    menu.style.display="flex";
});

menu.addEventListener("mouseout",function(e){
    menu.style.display="none";
});