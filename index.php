<?php

// Inclusion des entités.

// Inclusion des managers.

// Inclusion des controllers.
require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/controller.php";

// database connexion

$control = new controller();

if(isset($_GET['ctrl'])){
    switch ($_GET['ctrl']){
        case 'connexion' :
            $control->render($_GET['ctrl'], 'Connexion');
            break;
        case 'project' :
            $control->render($_GET['ctrl'],'Les projets');
            break;
        case 'signIn' :
            $control->render($_GET['ctrl'],'Inscription');
            break;
        case 'gallery' :
            $control->render($_GET['ctrl'],'Galerie');
            break;
        default :
            $control->render($_GET['ctrl'],'Accueil');
    }
}
else{
    $control->render('home','Accueil');
}

