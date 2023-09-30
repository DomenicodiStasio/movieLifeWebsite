<?php

    /*
        Script PHP che gestisce il form di login e imposta tutte le variabili di sessione
        in base alle informazioni del determinato utente loggato.
        Effettua il controllo sul corretto inserimento delle credenziali.
    */

    if (!empty($log_username) && !empty($log_password)){
        if(!check_login($log_username,$log_password))
            echo '<script type="text/javascript">alert("Passord o Username errati!")</script>';
        else{
            $timeout = 60*60*2;
            ini_set( "session.gc_maxlifetime", $timeout );
            session_start();
            $_SESSION['username'] = $log_username;
            $utente = utenteByUser($_SESSION['username']);
            $_SESSION['codice'] = $utente['codice'];
            $_SESSION['nome'] = $utente['nome'];
            $_SESSION['cognome'] = $utente['cognome'];
            $_SESSION['email'] = $utente['email'];
            $_SESSION['logged'] = true;
            $_SESSION['foto'] = $utente['foto'];
            header("Location: profilo.php?username=" . $_SESSION['username']);
        }
    }
?>