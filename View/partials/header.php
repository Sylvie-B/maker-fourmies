<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
    <div id="container">
        <header>
            <div id="headband">
                <a href="/index.php?ctrl=home-view">
                    <img id="logo" src="../../img/gears.png" alt="logo"/>
                </a>
                <a id="title" href="/index.php?ctrl=home-view">
                    <h1>MAKERS FOURMIES</h1>
                </a>
                <div>
                    <!--     if $_session exist then display user name (= profile link), role, disconnect button    -->
                    <?php
                        if(isset($_SESSION['user'])){
                            // display pseudo todo link profile
                            ?>
                            <a href="/index.php?ctrl=user-view"><?php
                                $_SESSION['user']['pseudo']
                            ?></a><?php
                            // switch button function of role
                            switch ($_SESSION['user']['role']){
                            //      administrator
                                case 1 :?>
                                    <a href="/index.php?ctrl=admin-view">
                                        <!--  todo  check user_fk value and admin ref value    -->
                                        <button class="btn" type="button">Admin</button>
                                    </a><?php
                                    break;
                            //      moderator
                                case 2 :?>
                                    <a href="/index.php?ctrl=modo-view">
                                        <!--  todo  check user_fk value and modo ref value    -->
                                        <button class="btn" type="button">Modo</button>
                                    </a><?php
                                    break;
                            //      Maker
                                case 3 :?>
                                    <!--  todo  check user_fk value and maker ref value    -->
                                        <p>Maker</p>
                                    <?php
                                    break;
                            //      nothing for user
                            }?>
                        <div>
                            <a href="/index.php?ctrl=home-view&connect=0">
                                <button class="btn" type="button">Déconnexion</button>
                            </a>
                        </div><?php
                    }
                    else{?>
                    <!--     if $_session not exist then display connexion & inscription button    -->
                    <a href="/index.php?ctrl=connexion-view">
                        <button class="btn" type="button">Connexion</button>
                    </a>
                    <a href="/index.php?ctrl=signIn-view">
                        <button class="btn" type="button">Inscription</button>
                    </a><?php
                    };
                    ?>
                </div>
            </div>
            <!-- tabs -->
            <nav>
                <a href="/index.php?ctrl=home-view" class="menu">
                    <div>Accueil</div>
                </a>
                <a href="/index.php?ctrl=resource-view" class="menu">
                    <div>Ressource</div>
                </a>
                <a href="/index.php?ctrl=gallery-view" class="menu">
                    <div>Galerie</div>
                </a>
                <!--   for maker only : role = 1 ou 2 ou 3          -->
                <?php
                    if(isset($_SESSION['user']) && $_SESSION['user']['role'] != 4){?>
                        <a href="/index.php?ctrl=project-view" class="menu">
                            <div>Les projets</div>
                        </a<?php
                    }?>
            </nav>
        </header>
        <section>
