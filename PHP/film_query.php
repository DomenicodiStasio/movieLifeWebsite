<?php
    /*
        Ricerca di un determinato film all'interno del database
    */
    function search_film($codice_film){
        require "PHP/dbconnection.php";
        $sql = "SELECT * FROM film WHERE codice = $1";
        $prep_stm = pg_prepare($db,"SearchByCodice",$sql);
        if (!$prep_stm){
            return false;
        } else {
            $ret = pg_execute($db,"SearchByCodice",array($codice_film));
            if (!$ret)
                return false;
            else {
                return pg_fetch_array($ret);
            }
        }
    }
    
   
    /*
        Ricerca di tutte le recensioni fatte per un determinato film all'interno del database
    */
    function search_rec($codice_film){
    require "PHP/dbconnection.php";
    $sql = "SELECT recensione.*,utente.username as utente,utente.foto
            FROM film,utente,recensione
            WHERE utente.codice = recensione.utente AND film.codice = recensione.film
                    AND film.codice = $1 ";
    $prep_stm = pg_prepare($db,"RecensioniByFilm",$sql);
    if (!$prep_stm){
        return false;
    } else {
        $ret = pg_execute($db,"RecensioniByFilm",array($codice_film));
        if (!$ret)
            return false;
        else {
            return $ret;
        }
    }
    }

    
    /*
        Inserimento di un determinato film nella lista dei preferiti di un determinato utente 
    */
    function insert_fav($codice_film,$codice_utente){
    require "PHP/dbconnection.php";
    $sql = "INSERT INTO preferito(film,utente)
            VALUES ($1,$2)";
    $prep_stm = pg_prepare($db,"InsertFav",$sql);
    if (!$prep_stm){
        return false;
    } else {
        $ret = pg_execute($db,"InsertFav",array($codice_film,$codice_utente));
        if (!$ret)
            return false;
        else {
            return true;
        }
    }
    }

    
    /*
        Rimozione di un determinato film nella lista dei preferiti di un determinato utente 
    */
    function remove_fav($codice_film,$codice_utente){
    require "PHP/dbconnection.php";
    $sql = "DELETE FROM preferito
            WHERE film = $1 AND utente = $2";
    $prep_stm = pg_prepare($db,"deleteFav",$sql);
    if (!$prep_stm){
        return false;
    } else {
        $ret = pg_execute($db,"deleteFav",array($codice_film,$codice_utente));
        if (!$ret)
            return false;
        else {
            return true;
        }
    }
    }

    
    /*
        Controllo della presenza di un determinato film nella lista dei preferiti di un determinato utente 
    */
    function check_fav($codice_film,$codice_utente){
    require "PHP/dbconnection.php";
    $sql = "SELECT COUNT(*) AS cont
            FROM preferito
            WHERE film = $1 AND utente = $2";
    $prep_stm = pg_prepare($db,"checkFav",$sql);
    if (!$prep_stm){
        return false;
    } else {
        $ret = pg_execute($db,"checkFav",array($codice_film,$codice_utente));
        if (pg_fetch_array($ret)['cont']!=1)
            return false;
        else {
            return true;
        }
    }
    }

     
    /*
        Ricerca di tutte le categorie a cui appartiene un determinato film
    */
    function search_cat_film($codice_film){
    require "PHP/dbconnection.php";
    $sql = "SELECT categoria.nome
            FROM film,categoria,appartenenza
            WHERE film.codice = appartenenza.film AND appartenenza.categoria = categoria.nome 
                    AND film.codice = $1";
    $prep_stm = pg_prepare($db,"CategorieByFilm",$sql);
    if (!$prep_stm){
        return false;
    } else {
        $ret = pg_execute($db,"CategorieByFilm",array($codice_film));
        if (!$ret)
            return false;
        else {
            return $ret;
        }
    }
}

    /*
        Ricerca di tutti gli attori che hanno recitato in un determinato film
    */

    function search_actor_film($codice_film){
        require "PHP/dbconnection.php";
        $sql = "SELECT attore.*
                FROM film,attore,recitazione
                WHERE film.codice = recitazione.film AND recitazione.attore = attore.nome 
                        AND film.codice = $1";
        $prep_stm = pg_prepare($db,"AttoreByFilm",$sql);
        if (!$prep_stm){
            return false;
        } else {
            $ret = pg_execute($db,"AttoreByFilm",array($codice_film));
            if (!$ret)
                return false;
            else {
                return $ret;
            }
        }
    }
    
    /*
        Calcolo del valore medio del rating di un determinato film
    */

    function avg_rating($codice_film){
        require "PHP/dbconnection.php";
        $sql = "SELECT AVG(rating) avg_rate
                FROM film,recensione
                WHERE film.codice = recensione.film 
                        AND film.codice = $1";
                
        $prep_stm = pg_prepare($db,"RatingAvg",$sql);
        if (!$prep_stm){
            return false;
        } else {
            $ret = pg_execute($db,"RatingAvg",array($codice_film));
            if (!$ret)
                return false;
            else {
                return $ret;
            }
        }
    }
?>