<?php
    /*
        Login sticky form 
    */
    if (!isset($_POST['log_username']))
        $log_username = "";
    else
        $log_username = $_POST['log_username'];
    if (!isset($_POST['log_password']))
        $log_password = "";
    else
        $log_password = $_POST['log_password'];


    /*
        Registration sticky form 
    */
    if (!isset($_POST['nome']))
        $nome = "";
    else
        $nome = $_POST['nome'];
    if (!isset($_POST['cognome']))
        $cognome = "";
    else
        $cognome = $_POST['cognome'];
    if (!isset($_POST['email']))
        $email = "";
    else
        $email = $_POST['email'];
    if (!isset($_POST['username']))
        $username = "";
    else
        $username = $_POST['username'];
    if (!isset($_POST['password']))
        $password = "";
    else
        $password = $_POST['password'];
    if (!isset($_POST['repassword']))
        $repassword = "";
    else
        $repassword = $_POST['repassword'];

?>