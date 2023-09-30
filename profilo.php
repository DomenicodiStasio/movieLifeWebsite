<?php
    include "PHP/profilo_query.php";
    include 'PHP/session_manager.php';

    $nome = $_SESSION['nome'];
    $cognome = $_SESSION['cognome'];
    $email = $_SESSION['email'];
    $foto = $_SESSION['foto'];
  
    if (isset($_POST['avatar'])){
        $_SESSION['foto'] = $_POST['avatar'];
        $foto = $_POST['avatar'];

        if(!update_image($foto,$user))
            echo "Immagine non salvata con successo";
    }

    
    // Sticky edit form

    if (isset($_POST['edit_username']))
        $edit_username = $_POST['edit_username'];
    else
        $edit_username = $user;
    if (isset($_POST['edit_nome']))
        $edit_nome = $_POST['edit_nome'];
    else
        $edit_nome = $nome;
    if (isset($_POST['edit_cognome']))
        $edit_cognome = $_POST['edit_cognome'];
    else
        $edit_cognome = $cognome;
    if (isset($_POST['edit_email']))
        $edit_email = $_POST['edit_email'];
    else
        $edit_email = $email;

    include 'PHP/edit_manager.php' 
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- Link CSS per lo stile di tutte le pagine -->
    <link rel="stylesheet" href="CSS/style.css?v=<?php echo time();?>" type="text/css">
   
    <title>Profilo</title>
    

</head>
<body id="profilo-body">
        <?php
                include 'header.php'; 
        ?>
        
        <div class="dati-profilo" id="dati-profilo">
            <h1>Dati profilo</h1>
            
            <form action="profilo.php?username=<?php echo $user ?>" method="POST" name="lista_avatar" class="lista_avatar" id="lista_avatar">
                    
                        <input type="radio" id="image1" name="avatar" value="Avatar/avatar1.png" class="radio-input">
                        <label for="image1"><img src="Avatar/avatar1.png" alt="" class="avatar_image" ></label>
                        
                        <input type="radio" id="image2" name="avatar" value="Avatar/avatar2.png" class="radio-input">
                        <label for="image2"><img src="Avatar/avatar2.png" alt="" class="avatar_image" ></label>

                        <input type="radio" id="image3" name="avatar" value="Avatar/avatar3.png">
                        <label for="image3"><img src="Avatar/avatar3.png" alt="" class="avatar_image" class="radio-input"></label>

                        <input type="radio" id="image4" name="avatar" value="Avatar/avatar4.png">
                        <label for="image4"><img src="Avatar/avatar4.png" alt="" class="avatar_image" class="radio-input"></label>

                        <input type="radio" id="image5" name="avatar" value="Avatar/avatar5.png">
                        <label for="image5"><img src="Avatar/avatar5.png" alt="" class="avatar_image" class="radio-input"></label>

                        <input type="submit" id="saveBtn" name="imageBtn" value="Salva" form="lista_avatar">

            </form>

            <div class="dati-profilo-main">
                <div id="profile-container">
                    <img id="profile-image" src="<?php echo $foto; ?>">
                </div>     
            </div>
            <div class="info_profilo">
                <div class="dati-profilo-field">
                    <p>Username:<p>
                    <p><?php echo $user?></p>
                </div>
                <div class="dati-profilo-field">
                    <p>Nome:<p>
                    <p><?php echo $nome?></p>
                </div>
                <div class="dati-profilo-field">
                    <p>Cognome:<p>
                    <?php echo $cognome?>
                </div>
                <div class="dati-profilo-field">
                    <p>Email:<p>
                    <?php echo $email?></p>
                </div>
                
                <!-- NEW -->
                <div class="update-dati-profilo">
                    <button class="editBtn" name="editBtn" id="editBtn" onclick="func()">Modifica dati</button>
                </div>
            </div>
        
        </div>


        <div class="dati-profilo" id="edit-dati-profilo">
            <h1>Modifica dati profilo</h1>
            
            <div class="dati-profilo-main">
                <div id="profile-container">
                    <img id="profile-image" src="<?php echo $foto; ?>">
                </div>
               
            </div>
            <form name="edit-form" class="info_profilo" action="profilo.php?username=<?php echo $user ?>" method="post">
                <div class="field-column">
                    <div>
                        <label for="edit_username">Username</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input class="demo-input-box" type="text" name="edit_username" id="edit_username" value="<?php echo $edit_username?>">
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="edit_nome">Nome</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input class="demo-input-box" type="text" name="edit_nome" id="edit_nome" value="<?php echo $edit_nome?>">
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="edit_cognome">Username</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input class="demo-input-box" type="text" name="edit_cognome" id="edit_cognome" value="<?php echo $edit_cognome?>">
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="edit_email">Email</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input class="demo-input-box" type="text" name="edit_email" id="edit_email" value="<?php echo $edit_email?>">
                    </div>
                </div>
                
                <div class="update-dati-profilo">
                    <input class="editBtn" type="submit" name="edit-btn" id="edit-btn-form" value="Salva">
                </div>
            </form>
        
        </div>

        <h1 class="section-title" id="section-title-preferiti">I miei preferiti <span>&#9662</span></h1>

        <ul class="film-list" id="list-preferiti">
        <?php 
            $preferiti = user_preferiti($codice);
            while ($film = pg_fetch_assoc($preferiti)){    
                echo    '<li class="film-list-item">
                            <div class="film-risultato">
                                <a href="film.php?codice_film=' . $film['codice'] . '" class="title"><h1>'. $film['titolo'] . '</h1></a>
                                <p class="anno">'. $film['anno'] . '</p>
                                <a href="film.php?codice_film=' . $film['codice'] . '" class="title"><img src="' . $film['copertina'] . '"></a>   
                            </div>
                        </li>';
                    }
                ?>
        </ul>

        <div class="sezione-mie-recensioni">
        <h1 class="section-title" id="section-title-recensioni">Le mie recensioni <span>&#9662</span></h1>
        <?php 
            $recensioni = user_recensioni($codice);
        ?>
            
            <section class="movie-section-reviews" id="list-recensioni" style="margin-top: 80px; margin-bottom:120px;">

                    <?php
                    while($recensione = pg_fetch_array($recensioni)){

                        
                    echo   '<div class="movie-review-cover-container">
                                <div class="movie-cover">
                                    <a href="film.php?codice_film=' . $recensione['codice'] . '"> <img id="user-img-review" src=" '. $recensione['copertina'] .'" width="140"  height="140" style="border-radius:100px;"></a>
                                </div>

                                <div class="movie-review profile-movie-review">                                    
                                    <div class="review-header">
                                        <div class="review-details">
                                            <div class="profile-review-user-details">
                                                <h3 id="profile-review-film-title"> '. $recensione['titolo'] .' </h3> 
                                                <p id="profile-review-date"> '. $recensione['datarecensione'] .'</p>
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
                                </div>

                                <div class="review-trasher">
                                    <a id="trasher_elimina" href="'.$_SERVER['PHP_SELF'].'?action=delete&review='.$recensione['id'].'"><span id="trasher" class="fa fa-trash-o"></span></a>
                                </div>
                            </div>';
                    
                    }
                
                    ?>

                                

                    </section>




        </ul>
        </div>
        
            <?php include 'footer.html' ?>
        
         <script src="JS/profilo-utente.js"></script>
         <script src="JS/reviews.js"></script>

         
</body>
</html>