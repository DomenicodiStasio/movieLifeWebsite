<!-- HEADER PER GLI UTENTI CHE NON HANNO EFFETTUATO IL LOGIN -->

<div class="header">
        <nav class="navbar">
            <div class="container">
                <!--    Logo e nome del sito     -->
                <div class="navbar-brand-group">
                    <a class="navbar-brand logo" href=" <?php if(!$_SESSION['logged']){ echo 'index.php';} else{ echo 'index.php?username=' . $user; } ?> "> <span id="logo-header-website" class="material-symbols-outlined">movie</span></a>
                    <a class="navbar-brand title" id="site-name" href="<?php if(!$_SESSION['logged']){ echo 'index.php';} else{ echo 'index.php?username=' . $user; } ?> "> MovieLife</a>    
                </div>
                <!--    Menu orizzontale   -->
                <div class="menu">
                    <ul class="menu-list">

                        <!--    Link che porta alla home page    -->
                        <li class="menu-list-item" role="presentation">
                            <a class="menu-list-link" href="<?php if(!$_SESSION['logged']){ echo 'index.php';} else{ echo 'index.php?username=' . $user; } ?> ">Home</a>
                        </li>

                        <!--    Link che porta alla pagina risultati per tutti i film presenti   -->
                        <li class="menu-list-item" role="presentation">
                            <a class="menu-list-link" href="risultati.php?film=all">Film</a>
                        </li>
                        <!--    Menu categorie: ogni categoria è un link che porta alla pagina risultati per i film della categoria scelta   -->
                        <li class="menu-list-item dropdown">
                            <a class="categorie-link"  id="categorie-link"  href="#">Categorie <span>&#9662</span> </a>
                            <div id="categorie-menu">
                                <ul class="categorie-list">
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Azione">Azione</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Animazione">Animazione</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Giallo">Giallo</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Fantasy">Fantasy</a></li>             
                                </ul>
                                <ul class="categorie-list">
                                    
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Commedia">Commedia</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Thriller">Thriller</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Avventura">Avventura</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Horror">Horror</a></li>              
                                </ul>
                                <ul class="categorie-list">
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Fantascienza">Fantascienza</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Drammatico">Drammatico</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Crime">Crime</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Superhero">Superhero</a></li>           
                                </ul>
                                <ul class="categorie-list">
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Guerra">Guerra</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Storia">Storia</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Musica">Musica</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Sport">Sport</a></li>             
                                </ul>
                                <ul class="categorie-list">
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Noir">Noir</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Sentimentale">Sentimentale</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Poliziesco">Poliziesco</a></li>
                                    <li class="categorie-list-item"><a class="categorie-list-anchor" href="risultati.php?categoria=Grottesco">Grottesco</a></li>             
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!--    Barra di ricerca   -->
                    <div class="form-group">
                        <form class="search-form" action="risultati.php" method="post">
                            <input class="search-field" type="search" name="search" id="search-field" placeholder="Cerca per film,cast o regia..." autocomplete="off">
                            <button class="search-btn" type="submit">
                                <img src="Images/magnifying-glass.png" width="12px" height="10px" alt="Search">
                            </button>
                        </form>
                    </div>
                </div>
                <!--    n -->
                <div class="accedi-span">
                    <?php
                    if($_SESSION['logged']){
                        // Link per la pagina del profilo e link per eseguire i logout se l'utente ha effettuto l'accesso
                       echo '<span class="navbar-text"><a href="profilo.php?username=' .$user .'"> ' . $user . '</a></span>';
                       echo '<span class="navbar-text"><a href="index.php?logout=true" class="login">Logout</a></span>';

                    }else{
                        // Link per la pagina di login  se l'utente non ha effettuto l'accesso
                        echo '<span class="navbar-text"><a href="login_registration.php" class="login">Accedi</a></span>';
                    }
                    ?>
                </div>
                    
            </div>
        </nav>
</div>

<script src="JS/header.js"> </script>


