<?php
    include "PHP/session_manager.php";
    include "PHP/film_query.php";
    include "PHP/login_registration_query.php";
    include "PHP/recensione_query.php";

    if(!empty($_GET['codice_film']))
        $codice_film = $_GET['codice_film'];
    
    
    if(!empty($_POST['recensioneBtn'])){
        $codicefilm = $_POST['codice_film']; // preso dalla post del form recensione
        $recensione = $_POST['area'];
        $rating = $_POST['rating'];
        $data = date('Y-m-d', time());
        $headline = $_POST['headline'];
        if(insert_recensione($user,$codicefilm,$recensione,$data,$rating,$headline))
            header("Location: film.php?codice_film=".$codicefilm);
            
        else
            echo "<p> Errore nell'inserimento della recensione.</p>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- Link CSS per lo stile di tutte le pagine -->
     <link rel="stylesheet" href="CSS/style.css?v=<?php echo time();?>" type="text/css">

    <title>Recensione</title>
</head>
<body id="recensione-body">
    <?php
            include 'header.php';
    ?>    
    
    <?php
        $film = search_film($codice_film);
    ?>

    <div id="cover-recensione-container">
        <div class="film-cover">
            <a href="film.php?codice_film=<?php echo $film['codice']?>"><img src="<?php echo $film['copertina']?>"></a>
        </div>
       
        <div class="recensione-form-container">
            
            <form action="recensione.php" method="POST" id="recensione-form" name="recensione-form"> 
                <div class="demo-table demo-table-recensione">
                <div class="form-head"><p>Lascia la tua recensione su<p></p></div>
                <div class="form-head"><p><?php echo $film['titolo']?></p></div>
                
                <div class="field-column">
                    <div class="wrapper">
                        <input type="radio" id="r1" name="rating" value="5">
                        <label for="r1">&#9733;</label>
                        <input type="radio" id="r2" name="rating" value="4">
                        <label for="r2">&#9733;</label>
                        <input type="radio" id="r3" name="rating" value="3">
                        <label for="r3">&#9733;</label>
                        <input type="radio" id="r4" name="rating" value="2">
                        <label for="r4">&#9733;</label>
                        <input type="radio" id="r5" name="rating" value="1">
                        <label for="r5">&#9733;</label>
                    </div>
                </div>


                <div class="field-column">
                    <div>
                        <label for="headline">Headline</label><span id="user_info" class="error-info"></span>
                    </div>
                
                    <div>
                        <input class="demo-input-box" type="text" name="headline" id="headline" placeholder="Scrivi un headline ad effetto!">
                    </div>
                </div>

                <div class="field-column">
                    <div>
                        <label for="area">Recensione</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <textarea class="demo-input-box" name="area" id="area" placeholder="Scrivi i tui pensiri sul film!"></textarea>
                    </div>
                </div>

                <input type="hidden" name="codice_film" value="<?php echo $codice_film; ?>">
                <div class="field-column">
                    <input type="submit" value="Invia recensione" name="recensioneBtn" id="recensioneBtn"></p>
                </div>
                </div>
            </form>
        </div>
        
    </div>
 
    <?php include 'footer.html' ?>

    
</body>
</html>