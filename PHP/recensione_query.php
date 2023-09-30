<?php
    /*
        Inserimento di un arecensione scritta da un determinato utente
        relativamente a un feterminato film
    */
    function insert_recensione($user,$codicefilm,$recensione,$data,$rating,$headline){
        require "PHP/dbconnection.php";
        $sql = "INSERT INTO recensione(utente, film, recensione, datarecensione,rating,headline) 
                VALUES ($1,$2,$3,$4,$5,$6)";
        $prep = pg_prepare($db,'insertRecensione',$sql);
        if(!$prep){
            //echo "PREPARATION ERROR " . pg_last_error();
            
            return false;
        } else{
            $utente = utenteByUser($user);
            $ret = pg_execute($db,'insertRecensione', array($utente['codice'],$codicefilm,$recensione,$data,$rating,$headline));
            if (!$ret){
                //echo "Execution Error " . pg_last_error();
                return false;
            } else {
                return true;
                
            }
        }
    }
?>