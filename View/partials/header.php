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
                    <h1>MAKER FOURMIES</h1>
                </a>
                <!--    choice connexion or inscription     -->
                <div>
                    <?php
                        if(isset($_SESSION['user'])){
                            echo $_SESSION['user']['pseudo'] . '<br>' . "connecté en tant que " . $_SESSION['user']['role'];
                    ?>
                            <div>
                                <a href="/index.php?ctrl=home-view&disconnect=1">
                                    <button class="btn" type="button">Déconnexion</button>
                                </a>
                            </div><?php
                    }
                    else{
                    ?>
                    <a href="/index.php?ctrl=connexion-view">
                        <button class="btn" type="button">Connexion</button>
                    </a>
                    <a href="/index.php?ctrl=signIn-view">
                        <button class="btn" type="button">Inscription</button>
                    </a><?php
                    }?>
                </div>
            </div>
            <!-- menu -->
            <nav>
                <a href="/index.php?ctrl=home-view" class="menu">
                    <div>Accueil</div>
                </a>
                <a href="/index.php?ctrl=resource-view" class="menu">
                    <div>Resource</div>
                </a>
                <!--   for maker only : role = 1 ou 2 ou 3          -->
                <?php
                    if(isset($_SESSION['user']) && $_SESSION['user']['role'] != 4){?>
                        <a href="/index.php?ctrl=project-view" class="menu">
                            <div>Les projets</div>
                        </a><?php
                    }?>
                <a href="/index.php?ctrl=gallery-view" class="menu">
                    <div>Galerie</div>
                </a>
            </nav>
        </header>
        <section>
