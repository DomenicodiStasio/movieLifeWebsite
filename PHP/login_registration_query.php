<?php

    
    /*
        Controllo sul corretto inserimento dell'username e della password da parte dell'utente 
        nella fase di login. Per ragioni di sicurezza non si specifica se è l'username ad essere
        sbagliato o la password.
        Ritorna true se va a buon fine, false altrimenti.
    */

    function check_login($username,$password){
        require "PHP/dbconnection.php";
        $sql = "SELECT password FROM utente WHERE username = $1";
        $prep = pg_prepare($db,'selectByUsr',$sql);
        if(!$prep){
            //echo "PREPARATION ERROR " . pg_last_error();
            return false;
        } else{
            $ret = pg_execute($db,'selectByUsr',array($username));
            if(!$ret){
                //echo "EXECUTION ERROR " . pg_last_error();
                return false;
            } else {
                $utente= pg_fetch_array($ret);
                if (password_verify($password,$utente['password'])){
                    return true;    
                } else {
                    return false;
                }
            } 
        }      
    }
            
    /*
        Controllo sull'esistenza nel DB di un utente con lo stesso username di quello 
        inserito da un altro utente nella fase di registrazione.
        Ritorna true se va a buon fine, false altrimenti.
    */

    function check_username($username){
        require 'PHP/dbconnection.php';

        $sql = "SELECT username FROM utente WHERE username = $1";
        $prep_stm = pg_prepare($db,"SearchByUser",$sql);
        if(!$prep_stm)
            //echo "Statement Preparation Error " . pg_last_error();
            return;
        else {
            $ret = pg_execute($db,"SearchByUser",array($username));

            if (!$ret)
                //echo "Execution Error " . pg_last_error();
                return;
            else {
                
                if ($username == pg_fetch_array($ret)['username'])
                    return true;
                else 
                    return false;
            }
        }
    }

    /*
        Controllo sull'esistenza nel DB di un utente con la stessa email di quella 
        inserita da un altro utente nella fase di registrazione.
        Ritorna true se va a buon fine, false altrimenti.
    */
    function check_email($email){
        require 'PHP/dbconnection.php';

        $sql = "SELECT email FROM utente WHERE email = $1";
        $prep_stm = pg_prepare($db,"SearchByEmail",$sql);
        if(!$prep_stm)
            //echo "Statement Preparation Error " . pg_last_error();
            return;
        else {
            $ret = pg_execute($db,"SearchByEmail",array($email));

            if (!$ret)
                //echo "Execution Error " . pg_last_error();
                return;
            else {
                
                if ($email == pg_fetch_array($ret)['email'])
                    return true;
                else 
                    return false;
            }
        }
    }

    /*
        Inserimwento di un nuovo utente all'interno del DB.
        Ritorna true se va a buon fine, false altrimenti.
    */
    function insert_user($nome,$cognome,$email,$username,$password){
        require 'PHP/dbconnection.php';
        $sql = "INSERT INTO utente(nome,cognome,email,username,password)
                VALUES ($1,$2,$3,$4,$5)";
        $prep_stm = pg_prepare($db,"InsertUser",$sql);
        if(!$prep_stm)
            //echo "Statement Preparation Error " . pg_last_error();
            return false;
        else {
            $ret = pg_execute($db,"InsertUser",array($nome,$cognome,$email,$username,password_hash($password,PASSWORD_DEFAULT)));

            if (!$ret){
                //echo "Insert Execution Error " . pg_last_error();
                return false;
            } else 
                return true;                
        }
    }

    /*
        Ricerca di tutte le informazioni di un utente tramite il suo username
    */
    function utenteByUser($username){
        require 'PHP/dbconnection.php';
        $sql ="SELECT *
                    FROM utente
                    WHERE username = $1";
        $prep_stm = pg_prepare($db,"CodiceByUser",$sql);
        if(!$prep_stm)
            //echo "Statement Preparation Error " . pg_last_error();
            return false;
        else {
            $ret = pg_execute($db,"CodiceByUser",array($username));

            if (!$ret){
                //echo "Insert Execution Error " . pg_last_error();
                return false;
            } else 
                return pg_fetch_array($ret);                
        }
    }
?>