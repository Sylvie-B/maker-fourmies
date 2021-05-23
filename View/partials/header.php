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
                <a href="/index.php?ctrl=home">
                <img id="logo" src="../../img/gears.png" alt="logo"/>
                </a>
                <a id="title" href="/index.php?ctrl=home">
                    <h1 id="maker">MAKER FOURMIES</h1>
                </a>
                <!--    choice connexion or inscription     -->
                <div>
                    <a href="/index.php?ctrl=connexion">
                        <button class="btn" type="button">Connexion</button>
                    </a>
                    <a href="/index.php?ctrl=signIn">
                        <button class="btn" type="button">Inscription</button>
                    </a>
                </div>
                <?php if ?>
            </div>
            <!-- menu -->
            <nav>
                <a href="/index.php?ctrl=accueil" class="menu">
                    <div>Accueil</div>
                </a>
                <a href="/index.php?ctrl=project" class="menu">
                    <div>Les projets</div>
                </a>
                <a href="/index.php?ctrl=gallery" class="menu">
                    <div>Galerie</div>
                </a>
            </nav>
        </header>
