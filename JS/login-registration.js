
var signup_form1 = document.getElementById("signup_form");
var login_form1 = document.getElementById("login_form");

/*
    Effettuando il click su "Registati" viene mostrato il form di Registrazione
    e nascosto quello di Login
*/

var span_reg = document.getElementById("regBtn");

span_reg.addEventListener("click",function(e){
    login_form1.style.display = "none";
    signup_form1.style.display = "block";
});

/*
    Effettuando il click su "Login" viene mostrato il form di Login
    e nascosto quello di Registrazione
*/

var span_log = document.getElementById("logBtn");

span_log.addEventListener("click",function(e){
    login_form1.style.display = "block";
    signup_form1.style.display = "none";
});




/*
    Signup Form Validation 
    Controlli:
    -   tutti i campi sono obbligatori
    -   l'email deve essere del formato corretto (deve contenere @)
    -   la password deve coincidere con repassword, deve essere lunga almeno 7 caratteri e deve contenere
        almeno 1 numero, 1 lettera minuscola, 1 lettera maiuscola, 1 carattere speciale tra ($,@,#,&,!)
*/

var signup_form = document.forms.signup_form;

signup_form.addEventListener("submit",function(event){
    event.preventDefault();
    var $flag = true;

    if (signup_form.nome.value == ""){
        document.getElementById("name_info").innerHTML = "obbligatorio";
        document.getElementById("nome").focus();
        $flag=false;
    } 
    if (signup_form.cognome.value == ""){
        document.getElementById("surname_info").innerHTML = "obbligatorio";
        document.getElementById("cognome").focus();
        $flag=false;
    } 
    if (signup_form.username.value == ""){
        document.getElementById("username_info").innerHTML = "obbligatorio";
        document.getElementById("username").focus();
        $flag=false;
    } 
    if (signup_form.email.value == ""){
        document.getElementById("email_info").innerHTML = "obbligatorio";
        document.getElementById("email").focus();
        $flag=false;
    } 

    email_value = signup_form.email.value;
    atPos = email_value.indexOf("@",0);
    if (atPos == -1){
        document.getElementById("error-registration").innerHTML= "Formato e-mail non corretto!";
        document.getElementById("email").focus();
        document.getElementById("error-registration").style.display="block";
        $flag=false;
    }

    if (signup_form.password.value == ""){
        document.getElementById("pass_info").innerHTML = "obbligatorio";
        document.getElementById("password").focus();
        $flag=false;
    } 

    if (signup_form.password.value != "" && signup_form.password.value.length < 7){
        document.getElementById("error-registration").innerHTML= "La password deve essere lunga almeno 7 caratteri!";
        document.getElementById("password").focus();
        document.getElementById("error-registration").style.display="block";
        $flag=false;
    }

    var password_value = signup_form.password.value;
    if (signup_form.password.value != "" && (!password_value.match(/[a-z]+/)||!password_value.match(/[A-Z]+/)||!password_value.match(/[0-9]+/)||!password_value.match(/[$@#&!]+/))) {
        document.getElementById("error-registration").innerHTML= "La password deve contenere almeno 1 lettera minuscola, 1 lettera maiuscola, 1 numero e 1 carattere speciale($@#&!).";
        document.getElementById("error-registration").style.display="block";
        $flag = false;
    }


    if (signup_form.repassword.value == ""){
        document.getElementById("re_pass_info").innerHTML = "obbligatorio";
        document.getElementById("repassword").focus();
        $flag=false;
    } 

    if (signup_form.password.value != signup_form.repassword.value){
        document.getElementById("error-registration").innerHTML= "Le due password non coincidono.";
        document.getElementById("repassword").focus();
        document.getElementById("error-registration").style.display="block";
        $flag=false;
    } 

    if ($flag)
        signup_form.submit();
})
    


/*
    Login Form Validation 
    Controllo se i due campi non sono vuoti
*/

var login_form = document.forms.login_form;

login_form.addEventListener("submit",function(event){
        event.preventDefault();

        if (login_form.log_username.value == ""){
            document.getElementById("user_info").innerHTML = "obbligatorio";
            document.getElementById("log_username").focus();
            return false;
        } 
        if (login_form.log_password.value == ""){
            document.getElementById("password_info").innerHTML = "obbligatorio";
            document.getElementById("log_password").focus();
            return false;
        }

        login_form.submit();
});


/*
    Gestione del "eye" per mostrare e nascondere la password 
*/

var toggle_password = document.getElementById("toggle-password");
var toggle_repassword = document.getElementById("toggle-repassword");

var password = document.getElementById("password");
var repassword = document.getElementById("repassword")

toggle_password.addEventListener("click",function(e){
    var type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type",type);
    this.classList.toggle("fa-eye-slash");
});

toggle_repassword.addEventListener("click",function(e){
    var type = repassword.getAttribute("type") === "password" ? "text" : "password";
    repassword.setAttribute("type",type);
    this.classList.toggle("fa-eye-slash");
});


/*
    Reset del messaggio di errore quando si effettua una submit sul form di registrazione
*/

function reset_error_div(){
    document.getElementById("error-registration").style.display="none";
}