<?php 
    include 'PHP/session_manager.php';
    include 'PHP/login_registration_sticky_forms.php';
    include 'PHP/login_registration_query.php';
    
?>

<html lang="it">
<head>
    <meta charset="UTF-8">
    
    <!-- Link CSS per lo stile di tutte le pagine -->
     <link rel="stylesheet" href="CSS/style.css?v=<?php echo time();?>" type="text/css">

    <title>Login o registrazione</title>
</head>
<body id="login-registration-body">
   
    <?php include 'PHP/login_manager.php'?>
    <?php include 'header.php'; ?>

    
    <div id="login_form">
        <div class="form-container">
            <form action="login_registration.php" name="login_form" method="post" id="frmLogin">
                <div class="demo-table">

                    <div class="form-head">Login</div>
                
                    <div class="field-column">
                        <div>
                            <label for="log_username">Username</label><span id="user_info" class="error-info"></span>
                        </div>
                        <div>
                            <input class="demo-input-box" type="text" name="log_username" id="log_username" value="<?php echo $log_username?>">
                        </div>
                    </div>
                    <div class="field-column">
                        <div>
                            <label for="log_password">Password</label><span id="password_info" class="error-info"></span>
                        </div>
                        <div >
                            <input class="demo-input-box" type="password" name="log_password" id="log_password" value="<?php echo $log_password?>">
                        </div>
                    </div>
                    <div class=field-column>
                        <div>
                            <input class="btnLogin" type="submit" name="loginBtn" id="loginBtn" value="Accedi">
                        </div>
                    </div>
                    <div class="switch">
                    <p>Non hai un account? <span style="text-decoration: underline;" id="regBtn">Registrati</span> subito!</p>
                    </div>
                    <div id="success-registration"></div>
                    
                </div>
            </form>
        </div>
        
        <?php include 'footer.html' ?>
    </div>
    

    <div id="signup_form">
        <div class="form-container">
            <form action="login_registration.php" name="signup_form" class="signup" method="post" >


                <div class="demo-table demo-table-registration">

                    <div class="form-head">Signup</div>
                    <div class="field-row">
                        <div class="field-column">
                            <div>
                                <label for="nome" >Nome: </label> <span id="name_info" class="error-info"></span>
                            </div>
                            <div>
                                <input class="demo-input-box demo-input-flex" type="text" name="nome" id="nome" value="<?php echo $nome ?>">
                            </div>
                        </div>
                        <div class="field-column">
                            <div>
                                <label for="cognome">Cognome:</label> <span id="surname_info" class="error-info"></span>
                            </div>
                            <div>
                                <input class="demo-input-box demo-input-flex" type="text" name="cognome" id="cognome" value="<?php echo $cognome?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="field-row">
                        <div class="field-column">
                            <div>
                            <label for="username" >Username:</label> <span id="username_info" class="error-info"></span>

                            </div>
                            <div>
                                <input class="demo-input-box demo-input-flex" type="text" name="username" id="username" value="<?php echo $username?>">
                            </div>
                        </div>
                        <div class="field-column">
                            <div>
                            <label for="email">Email:</label> <span id="email_info" class="error-info"></span>

                            </div>
                            <div>
                                <input class="demo-input-box demo-input-flex" type="text" name="email" id="email" value="<?php echo $email?>">
                            </div>
                        </div>
                    </div>
                    <div class="field-row-double-pass">
                        <div class="field-column pass-row">
                            <div>
                                <label for="password">Password:</label> 
                            </div>
                            <div class="align-input-pass">
                                <input class="demo-input-box pass-box" type="password" name="password" id="password" value="<?php echo $password?>">
                                <i class="far fa-eye" id="toggle-password" style="cursor:pointer;"></i>
                                <span id="pass_info" class="error-info"></span>
                            </div>
                        </div>
                        <div class="field-column pass-row">
                            <div>
                                <label for="repassword">Ripeti password:</label>
                            </div>
                            <div class="align-input-repass">
                                <input class="demo-input-box pass-box" type="password" name="repassword" id="repassword" value="<?php echo $repassword?>">
                                <i class="far fa-eye" id="toggle-repassword" style="cursor:pointer;"></i>
                                <span id="re_pass_info" class="error-info" ></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class=field-column>
                        <div>
                            <input class="btnLogin" type="submit" name="registrationBtn" id="registrationBtn" value="Registrati"></span>
                        </div>
                    </div>
                    <input type="hidden" name="success" value="yes" onclick="">
                    <div class="switch">
                        <p>Hai già un account? Vai al <span style="text-decoration: underline;" id="logBtn">login</span></p>
                    </div>
                    <div id="error-registration"></div>
                </div>
        
            </form>
        </div>
        <?php include 'PHP/registration_manager.php'?>
        <?php include 'footer.html';?>
    </div>
    
    
    <!-- JAVASCRIPT -->
    <script src="JS/login-registration.js"></script>
</body>
</html>