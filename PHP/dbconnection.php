<?php
    /* 
        Script PHP per la connessione al DB postgreSQL e quindi per la creazione della 
        connection string da passare alla funzione pg_connect
    */ 

    $host = 'localhost';
    $port = '5432';
    $db = 'movielife';   
    $usern = 'www';        
    $pwd = 'tsw2022';
    $connection_string = "host=$host port=$port dbname=$db user=$usern password=$pwd";
    $db = pg_connect($connection_string) or die('Impossibile connetersi al database: ' . pg_last_error());
?>