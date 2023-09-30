<?php
    include "PHP/film_query.php";
    include "PHP/session_manager.php";

    /* 
        Codice film passato con la GET 
    */
    if(!empty($_GET['codice_film']))
        $codice_film = $_GET['codice_film'];
       
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
  
    <!-- Link CSS per lo stile di tutte le pagine -->
    <link rel="stylesheet" href="CSS/style.css?v=<?php echo time();?>" type="text/css">

    <title>MovieLife - 
        <?php 
            /*
                Titolo della pagina modificati in base allo specifico film
            */
            $film = search_film($codice_film);
            echo $film['titolo'];
        ?>
    </title>
</head>

<body>
    <?php
        include 'header.php'
    ?>

    <!-- Per il film specifico si eseguono delle query per ottenere le seguenti informazioni:
         - categorie a cui appartiene il film
         - attori che recitano nel film
         - rating medio del film
    -->
    <?php
        $ret_category = search_cat_film($codice_film);
        $ret_cast = search_actor_film($codice_film);
        $rate = pg_fetch_array(avg_rating($codice_film))['avg_rate'];
        $rate = sprintf('%.1f', $rate);

        $rec= search_rec($codice_film);
    ?>

    <!-- Scheda del film  -->
    <div class="info-container-film">
        <section class="info-section-film">
            <div class="upside-info-box">
                <div class="upside-box-title">
                    <h1 class="box-film-title"><?php echo $film['titolo'] ?></h1>
                    <span id="age-dur-span">
                        <?php echo $film['anno'] . ' - ' . $film['durata']?>
                    </span>
                </div>
                <div class="upside-box-rating">
                    <div class="inside-box-rating">
                        <div class="box-rating">
                            <div class="title-square-rating">
                                    <h3 class="box-rating-titles box-fav-title">Aggiungi ai preferiti</h3>
                                    <div class="add-to-favourites">
                                        <a id="add-fav" href="film.php?codice_film=<?php echo $codice_film ?>&fav=si">&#9825;</a>
                                        <a id="rem-fav" href="film.php?codice_film=<?php echo $codice_film ?>&fav=no">&#9829;</a>
                                    </div>
                            </div>
                        </div>
                        <div class="box-rating">
                                <div class="title-square-rating">
                                    <h3 class="box-rating-titles">Valutazione MovieLife</h3>
                                    <div class="square-rate">
                                        <span id="avgStar">&#9733</span><span id="avgRate"> <?php echo $rate ?></span>
                                    </div>
                                </div>
                        
                        </div>
                        <div class="box-rating">
                            <div class="title-square-rating">
                                <h3 class="box-rating-titles">Aggiungi una recensione</h3>
                                <div class="your-rate">
                                    <a class="go-to-rate" id="go-to-rate" href="recensione.php?codice_film=<?php echo $film['codice']; ?>"> <span id="yourRate">&#9734</span><span id="rate">Valuta</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-info-box">
                <div class="content-media-box">
                    <div class="content-img-box">
                       <img src="<?php echo $film['copertina']?>" width="300" height="400">
                    </div>
                    <div class="content-trailer-box">
                        <iframe width="800" height="400" style="border:none;" src="<?php echo $film['trailer'] ?>"></iframe>
                    </div>
                </div>
                <div class="content-category">
                    <ul class="film-category-list">
                        <?php
                            while($category = pg_fetch_array($ret_category)){
                                echo '<li class="film-category-item"><a class="film-category-link" href="risultati.php?categoria='. $category['nome'] .'"> '.  $category['nome'] .' </a></li>';
                            }
                        ?>
                    </ul>
                </div>
                <hr class="details-divider">

                <div class="content-description">
                    <div class="content-plot">
                        <h2 class="details-title">Trama</h2>
                        <p style="color:white; text-align:left;"><?php echo $film['trama'] ?></p>
                    </div>

                    <hr class="details-divider">

                    <div class="content-details"  id="details-direction-production">
                        <div class="details-direction">
                            <h2 class="details-title">Regia</h2>
                            <a class="details-anchor"> <?php echo $film['regista']  ?></a>
                        </div>
                        <div class="details-production">
                            <h2 class="details-title">Produzione</h2>
                            <a class="details-anchor"> <?php echo $film['produzione']  ?></a>
                        </div>  
                    </div>

                    <hr class="details-divider">

                    <div class="content-details">
                        <h2 class="details-title">Data di uscita</h2>
                        <a class="details-anchor"> <?php echo $film['datauscita']  ?></a>
                    </div>

                    <hr class="details-divider">

                    <div class="content-details" id="content-details-cast">
                        <h2 class="details-title">Star</h2>
                        <ul class="details-cast-list">
                            <?php 
                                while($cast = pg_fetch_array($ret_cast)){
                                    echo '
                                        <li class="details-cast-item"> 
                                        <div class="cast-card">
                                            <a href="'. $cast['wiki'].' " class="details-cast-link"> <img src=" '. $cast['foto'].'" width="128" height="160"  >  </a>
                                            <a href="'. $cast['wiki'].' " class="details-cast-link cast-name"> '.  $cast['nome']  .' </a> 
                                        </div>
                                        </li>
                                    
                                    ';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <hr class="details-divider">

        <section class="movie-section-reviews">
                <h1>Recensioni degli utenti</h1>

                <?php
                while($recensione = pg_fetch_array($rec)){

                echo   '<div class="movie-review">                                    
                            <div class="review-header">
                                <div class="review-details">
                                    <div class="review-user-details">
                                        <img id="user-img-review" src=" '. $recensione['foto'] .'" width="64"  height="64">
                                        <h3> '. $recensione['utente'] .' </h3> 
                                        <p> '. $recensione['datarecensione'] .'</p>
                                    </div>
                                    <div class="rate-reviews">
                                        <div class="rate-review">
                                            <span id="review-star">&#9733</span>
                                            <span id="review-rating"> '. $recensione['rating'] .'/5</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-title">
                                    <h2 id="review-title"> '. $recensione['headline'] .'</h2>
                                </div>
                            </div>
                            
                            <div class="review-body">
                                    <p id="content-review"> '. $recensione['recensione'] .' </p>
                            </div>
                        </div>';
                
                }
            
                ?>
        </section>
    </div>


<script src="JS/reviews.js"></script>

   
   
        
        
        <?php 
            
            if (empty($user))
                echo '<script src="JS/film-not-logged.js"></script>';
            
            
            if(check_fav($codice_film,$codice))
                echo    '<script src="JS/show-rem-fav.js"></script>';
            else 
                echo    '<script src="JS/show-add-fav.js"></script>';
            

            
            if(!empty($_GET['fav'])){
                 
               if($_GET['fav']=='si'){
                    if(insert_fav($codice_film,$codice))
                                echo    '<script src="JS/show-rem-fav.js"></script>';
                }
            
                if($_GET['fav']=='no'){
                    if(remove_fav($codice_film,$codice))
                        echo    '<script src="JS/show-add-fav.js"></script>';    
                }
            }
        ?>
</body>
</html>