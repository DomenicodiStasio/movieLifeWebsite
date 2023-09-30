<?php
    include 'PHP/session_manager.php';
    include 'PHP/risultati_query.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- Link CSS per lo stile di tutte le pagine -->
     <link rel="stylesheet" href="CSS/style.css?v=<?php echo time();?>" type="text/css">

    <title>Risultati</title>
</head>
<body>
    <?php
            include 'header.php';
    ?>
    
    <?php
        #Ricerca tutti i film
        if ($_GET['film']=='all'){
            
            echo '<h1 class="risultato-init-line"> Tutti i film dalla <span class="span-risultato"> A </span> alla <span class="span-risultato"> Z </span> </h1>';
            $ret = query_all_films();
            if (!$ret)
                echo '<p class="risultato-init-line">Nessun film trovato</p>';
            else {
                echo '<ul class="film-list">';
                while($film = pg_fetch_array($ret)){
                    echo    '<li class="film-list-item">
                                <div class="film-risultato">
                                    <a href="film.php?codice_film=' . $film['codice'] . '" class="title"><h1>'. $film['titolo'] . '</h1></a>
                                    <p class="anno">'. $film['anno'] . '</p>
                                    <a  href="film.php?codice_film=' . $film['codice'] . '" class="title"><img src="' . $film['copertina'] . '"></a>
                                    
                                </div>
                            </li>';
                }
                echo '</ul>';
            }
        }

        #Ricerca per categoria
        $categoria = $_GET['categoria'];
        if(!empty($_GET['categoria'])){
            echo '<h1 class="risultato-init-line"> Risultati per la categoria <span class="span-risultato">' . strtoupper($categoria) .'</span></h1>';
            $ret = query_search_categoria($categoria);
            if (!$ret)
                echo '<p class="risultato-init-line">Nessun risultato trovato per questa categoria </p>';
            else {
                echo '<ul class="film-list">';
                
                while($film = pg_fetch_array($ret)){
                    
                    echo    '<li class="film-list-item">
                                <div class="film-risultato">
                                    <a href="film.php?codice_film=' . $film['codice'] . '" class="title"><h1>'. $film['titolo'] . '</h1></a>
                                    <p class="anno">'. $film['anno'] . '</p>
                                    <a  href="film.php?codice_film=' . $film['codice'] . '" class="title"><img src="' . $film['copertina'] . '"></a>
                                </div>
                            </li>';
                }

                echo '</ul>';
            }
        }
        #Ricerca dalla search bar per titoli e attori
        $search = $_POST['search'];
        if(!empty($_POST['search'])){

            $ret1 = query_search_titolo($search);
            $ret2 = query_search_attore($search);
            $ret3 = query_search_regista($search);
            if ($ret1 && $ret2 && $ret3){
                echo '<h1 class="risultato-init-line">Risultati per il film: " '. $search .' "</h1>';
                echo '<ul class="film-list">';
                while($film = pg_fetch_array($ret1)){
                    echo    '<li class="film-list-item">
                                <div class="film-risultato">
                                    <a href="film.php?codice_film=' . $film['codice'] . '" class="title"><h1>'. $film['titolo'] . '</h1></a>
                                    <p class="anno">'. $film['anno'] . '</p>
                                    <a  href="film.php?codice_film=' . $film['codice'] . '" class="title"><img src="' . $film['copertina'] . '"></a>
                                    
                                </div>
                            </li>';
                }
                echo '</ul>';
                echo '<h1 class="risultato-init-line">Risultati per i film dell\'attore: " '. $search .' "</h1>';
                echo '<ul class="film-list">';
                while($film = pg_fetch_array($ret2)){
                    echo    '<li class="film-list-item">
                                <div class="film-risultato">
                                    <a href="film.php?codice_film=' . $film['codice'] . '" class="title"><h1>'. $film['titolo'] . '</h1></a>
                                    <p class="anno">'. $film['anno'] . '</p>
                                    <a  href="film.php?codice_film=' . $film['codice'] . '" class="title"><img src="' . $film['copertina'] . '"></a>
                                </div>
                            </li>';
                }
                echo '</ul>';
                echo '<h1 class="risultato-init-line">Risultati per il film del regista: " '. $search .' "</h1>';
                echo '<ul class="film-list">';
                while($film = pg_fetch_array($ret3)){
                    echo    '<li class="film-list-item">
                                <div class="film-risultato">
                                    <a href="film.php?codice_film=' . $film['codice'] . '" class="title"><h1>'. $film['titolo'] . '</h1></a>
                                    <p class="anno">'. $film['anno'] . '</p>
                                    <a  href="film.php?codice_film=' . $film['codice'] . '" class="title"><img src="' . $film['copertina'] . '"></a>
                                </div>
                            </li>';
                }
                echo '</ul>';
            }
        }
    ?>

    
        <?php include 'footer.html' ?>

</body>
</html>