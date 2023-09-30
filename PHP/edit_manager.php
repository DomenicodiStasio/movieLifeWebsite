<?php
    /*
        Script PHP che gestisce il form di modifica dei dati del profilo
    */
    if($_POST['edit-btn']=="Salva"){
        if (!empty($edit_username) && !empty($edit_nome) && !empty($edit_cognome) && !empty($edit_email)){
            if (!edit_user($user,$edit_username,$edit_nome,$edit_cognome,$edit_email)){
                echo '<p style="color:white;text-align:center">Username o Email già esistenti!</p>';
                $edit_username = $user;
                $edit_nome = $nome;
                $edit_cognome = $cognome;
                $edit_email = $email;
            }
            else {
                $_SESSION['username'] = $edit_username;
                $user = $edit_username;
                $_SESSION['nome'] = $edit_nome;
                $nome = $edit_nome;
                $_SESSION['cognome'] = $edit_cognome;
                $cognome = $edit_cognome;
                $_SESSION['email'] = $edit_email;
                $email = $edit_email;
            } 
        }
    }
?>