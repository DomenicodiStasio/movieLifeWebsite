<?php

  include 'PHP/session_manager.php';
  include 'PHP/risultati_query.php';

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    
    <title>MovieLife - Home</title>

    <!-- Link CSS per lo stile di tutte le pagine -->
     <link rel="stylesheet" href="CSS/style.css?v=<?php echo time();?>" type="text/css">

</head>

<body>

  <?php
        include 'header.php'; 
  ?>

  <!--    Nel div .carousel verranno dinamicamente create le slide dello slideshow, tramite lo script index.js    -->
  <h1 class="title"> Uscite dell'Anno</h1>
    <div class="carousel-container">
        <div class="carousel">
              
        </div>
    </div>

  <!--     Indicatori della slide corrente    -->
  <div class="indicators">
      <button class="indicator indicator-1">&#9866;</button>
      <button class="indicator indicator-2">&#9866;</button>
      <button class="indicator indicator-3">&#9866;</button>
      <button class="indicator indicator-4">&#9866;</button>
      <button class="indicator indicator-5">&#9866;</button>
  </div>

  <!--    Frecce che permettono lo scorrimento a destra o a sinistra dello slideshow    -->
  <div class="sliders">
    <button  class="arrow arrow-left" id="cover-arrow-left" onclick="toPreviousSlide()">&#10094;</button>
    <button  class="arrow arrow-right" id="cover-arrow-right" onclick="toNextSlide()">&#10095;</button>
  </div>

  <!--    Esecuzione delle query per i film da inserire nelle cards   -->
  <?php
  $lastDate = query_last_date();
  $mostAwards = query_most_awards();
  $lovedMovies = query_loved_films();
  $cultMovies = query_cult_films();
  $oscarMovies = query_oscar();
  $maxCards = $maxCards2 = $maxCards3 = $maxCards4 = $maxCards5 = 0;
  ?>

  <!--    Cards per i film più recenti   -->
  <h1 class="title">Ultime uscite</h1>
  <div class="movies-list">
    <button class="pre-btn" >&#10094;</button>
    <button class="nxt-btn" >&#10095;</button>
        <div class="card-container">
          <?php
              while($film = pg_fetch_array($lastDate)){
                echo ' <div class="card">
                          <img src="' . $film['copertina'] . '" class="card-img" alt="">
                          <div class="card-body">
                            <h2 class="name">'. $film['titolo'] . '</h2>
                            <h6 class="des"> </h6>
                          <a href="film.php?codice_film=' . $film['codice'] . '" class="rec-btn">Recensisci</a>
                          </div>
                        </div>';
                  $maxCards ++;
                  if($maxCards == 14){
                    break;
                  }
              }
          ?>
      </div> 
  </div>

  
  <!--    Cards per i film con più premi vinti   -->
  <h1 class="title">I più premiati</h1>
  <div class="movies-list">
    <button class="pre-btn" >&#10094;</button>
    <button class="nxt-btn" >&#10095;</button>
        <div class="card-container">
          <?php
                while($film = pg_fetch_array($mostAwards)){
                  echo ' <div class="card">
                            <img src="' . $film['copertina'] . '" class="card-img" alt="">
                            <div class="card-body">
                              <h2 class="name">'. $film['titolo'] . '</h2>
                              <h6 class="des"> </h6>
                            <a href="film.php?codice_film=' . $film['codice'] . '" class="rec-btn">Recensisci</a>
                            </div>
                          </div>';
                    $maxCards2 ++;
                    if($maxCards2 == 14){
                      break;
                    }
                }
            ?>
        </div>
  </div>



  <!--    Cards per i film vintage     -->
  <h1 class="title">Cult del passato</h1>
  <div class="movies-list">
    <button class="pre-btn" >&#10094;</button>
    <button class="nxt-btn" >&#10095;</button>
        <div class="card-container">
          <?php
                while($film = pg_fetch_array($cultMovies)){
                  echo ' <div class="card">
                            <img src="' . $film['copertina'] . '" class="card-img" alt="">
                            <div class="card-body">
                              <h2 class="name">'. $film['titolo'] . '</h2>
                              <h6 class="des"> </h6>
                            <a href="film.php?codice_film=' . $film['codice'] . '" class="rec-btn">Recensisci</a>
                            </div>
                          </div>';
                    $maxCards4 ++;
                    if($maxCards4 == 14){
                      break;
                    }
                }
            ?>
        </div>
  </div>



  <!--    Cards per i film che hanno vinto un oscar come miglior film     -->
  <h1 class="title">Oscar come Miglior Film</h1>
  <div class="movies-list">
    <button class="pre-btn" >&#10094;</button>
    <button class="nxt-btn" >&#10095;</button>
        <div class="card-container">
          <?php
                while($film = pg_fetch_array($oscarMovies)){
                  echo ' <div class="card">
                            <img src="' . $film['copertina'] . '" class="card-img" alt="">
                            <div class="card-body">
                              <h2 class="name">'. $film['titolo'] . '</h2>
                              <h6 class="des"> </h6>
                            <a href="film.php?codice_film=' . $film['codice'] . '" class="rec-btn">Recensisci</a>
                            </div>
                          </div>';
                    $maxCards5 ++;
                    if($maxCards5 == 14){
                      break;
                    }
                }
            ?>
        </div>
  </div>




  <!--    Cards per i film che sono presenti più volte nei preferiti degli utenti    -->
  <h1 class="title">Scelti dagli utenti</h1>
  <div class="movies-list">
  <button class="pre-btn" >&#10094;</button>
  <button class="nxt-btn" >&#10095;</button>
      <div class="card-container">
        <?php
              while($film = pg_fetch_array($lovedMovies)){
                echo ' <div class="card">
                          <img src="' . $film['copertina'] . '" class="card-img" alt="">
                          <div class="card-body">
                            <h2 class="name">'. $film['titolo'] . '</h2>
                            <h6 class="des"> </h6>
                          <a href="film.php?codice_film=' . $film['codice'] . '" class="rec-btn">Recensisci</a>
                          </div>
                        </div>';
                  
                  $maxCards3++;
                  if($maxCards3 == 14){
                    break;
                  }
                  
              }
          ?>
      </div>
  </div>
  

  
  <?php include "footer.html" ?>

  
  <script src="JS/index.js"></script>
  <script src="JS/cards.js"></script>

   
</body>
</html>