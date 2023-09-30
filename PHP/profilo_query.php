<?php
    /*
        Ricerca di tutti il film nella lista preferiti di un determinato utente
    */
    function user_preferiti($codice){
        require "PHP/dbconnection.php";
        $sql = "SELECT film.*
                FROM utente,film,preferito
                WHERE preferito.utente = utente.codice AND preferito.film = film.codice AND utente.codice = $1";
        $prep_stm = pg_prepare($db,"Preferiti",$sql);
        if (!$prep_stm){
            return false;
        } else {
            $ret = pg_execute($db,"Preferiti",array($codice));
            if (!$ret)
                return false;
            else {
                return $ret;
            }
        }       
    }
    /*
        Ricerca di tutte le recesioni scritte da un determinato utente
    */
    function user_recensioni($codice){
        require "PHP/dbconnection.php";
        $sql = "SELECT film.*,recensione.*,utente.username as utente
                FROM film,recensione,utente
                WHERE recensione.utente = utente.codice AND recensione.film = film.codice AND utente.codice = $1;";
        $prep_stm = pg_prepare($db,"Recensioni",$sql);
        if (!$prep_stm){
            return false;
        } else {
            $ret = pg_execute($db,"Recensioni",array($codice));
            if (!$ret)
                return false;
            else {
                return $ret;
            }
        }       
    }

    /*
        Modifica dell'immagine del profilo di un determinato utente
    */
    function update_image($image,$user){
        require "PHP/dbconnection.php";
        $sql = "UPDATE utente
                SET foto=$1
                WHERE username=$2";
        $prep_stm = pg_prepare($db,"UpdateFoto",$sql);
        if (!$prep_stm){
            return false;
        } else {
            $ret = pg_execute($db,"UpdateFoto",array($image,$user));
            if (!$ret)
                return false;
            else 
                return true;
            
        }             
    }

    /*
        Modifica dei dati del profilo di un determinato utente
    */
    function edit_user($prec_username,$edit_username,$edit_nome,$edit_cognome,$edit_email){
        require_once "PHP/dbconnection.php";
        $sql = "UPDATE utente
                SET username = $1,
                    nome = $2,
                    cognome = $3,
                    email = $4
                WHERE username = $5";
        $prep_stm = pg_prepare($db,"EditUser",$sql);
        if(!$prep_stm){
            return false;
        } else{
            $ret = pg_execute($db,'EditUser',array($edit_username,$edit_nome,$edit_cognome,$edit_email,$prec_username));
            if(!$ret){
                return false;

            } else {
                return true;
            } 
    }
}

/*
    Rimozione della recenzione 
*/

if(!empty($_GET['action']) && $_GET['action']=='delete'){
    require_once "PHP/dbconnection.php";

    $rec=$_GET['review'];
    $delete_query = "DELETE FROM recensione WHERE id=$1;";
    $prep = pg_prepare($db,'deleteReview',$delete_query);

    if(!$prep){

        echo "<script type='text/javascript'>alert('ERRORE QUERY DELETE!');</script>";
        exit;

    } else {
    
        $del = pg_execute($db,'deleteReview',array($rec));
    
        if(!$del){
            echo "<script type='text/javascript'>alert('ERRORE DELETE!');</script>";
            exit;
        } else {
            echo "<script type='text/javascript'>window.alert('Recensione eliminata correttamente!');</script>";
        }

    }    
}
?>