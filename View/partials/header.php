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
            <a href="/index.php?ctrl=home">
                <img id="logo" src="../../img/gears.png" alt="logo" width="13%" height="13%"/>
                <h1 id="maker">MAKER FOURMIES</h1>
            </a>
            <div>
                <a href="/index.php?ctrl=signIn">
                    <button type="button">Connexion</button>
                </a>
            </div>
            <div>
                <a href="/index.php?ctrl=signIn">
                    <button type="button">Inscription</button>
                </a>
            </div>
            <nav class="navbar">
                <a href="/index.php?ctrl=project" class="menu">
                    <div>Les projets</div>
                </a>
                <a href="/index.php?ctrl=gallery" class="menu">
                    <div>Galerie</div>
                </a>
            </nav>
        </header>
