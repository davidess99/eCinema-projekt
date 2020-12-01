<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>eCinema</title>

            <link rel="stylesheet" type="text/css" href="./assets/style.css">

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>            
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

            <link rel='stylesheet' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/43033/owl.carousel.css'>

            <link rel="stylesheet" type="text/css" href="/assets/DateTimePicker.css" />
        </head>
        
        <body>


        <nav class="navbar navbar-expand-lg">
                <a href="/"><img src="/assets/img/logo-ecinema.svg" alt="logo" class="logo svg"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>

                <div class="nav-content collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/filmy">Filmy</a>
                        </li>
                        <li class="nav-item">
                            <a href="/premietanie">Premietanie</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Atribúty filmu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/rozlisenie">Rozlíšenie</a>
                                    <a class="dropdown-item" href="/dabing">Dabing</a>
                                    <a class="dropdown-item" href="/titulky">Titulky</a>
                                    <a class="dropdown-item" href="/zanre">Žánre</a>
                                    <a class="dropdown-item connection-table" href="/filmy_zanre">Žánre filmu</a>
                                    <a class="dropdown-item" href="/krajiny">Krajiny</a>
                                    <a class="dropdown-item connection-table" href="/filmy_krajiny">Krajiny filmu</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/herci">Herci</a>
                                    <a class="dropdown-item connection-table" href="/filmy_herci">Herci filmu</a>
                                    <a class="dropdown-item" href="/reziseri">Režiséri</a>
                                    <a class="dropdown-item connection-table" href="/filmy_reziseri">Režiséri filmu</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/saly">Sály</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Používatelia
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/zakaznici">Zákazníci</a>
                                    <a class="dropdown-item" href="/platobne_udaje">Platobné údaje</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/zamestnanci">Zamestnanci</a>
                                    <a class="dropdown-item" href="/roly_zamestnancov">Roly zamestnancov</a>
                            </div>
                        </li>
                        

                        <?php if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_name'])) { ?>
                                <li class="nav-item">
                                    <a href="/prihlasenie">Prihlasenie</a>
                                </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
                    echo "<div class='nav-item user-info-bar dropdown'><button class='btn dropdown-toggle' type='button' id='dropdownMenuButto' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><img src='/assets/img/profile.svg' alt='profil' class='profile'><span class='user-profile-name'>".$_SESSION['user_name']."</span></button>"; ?>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/odhlasenie">odhlásiť sa</a>
                    </div>
                <?php  
                    echo "</div>"; 
                } ?>
        </nav>

        
    
