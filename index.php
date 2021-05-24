<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/assoDb.php';
// Inclusion des entités.

// Inclusion des managers.

// Inclusion des controllers.
require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/controller.php";

// database connexion
$db = new assoDb();
$db->connect();

$control = new controller();

if(isset($_GET['ctrl'])){
    switch ($_GET['ctrl']){
        case 'home-view' :
            $control->render($_GET['ctrl'], 'Accueil');
            break;
        case 'connexion-view' :
            $control->render($_GET['ctrl'], 'Connexion');
            $control->checkValidation($_GET['ctrl'], $db);
            break;
        case 'signIn-view' :
            $control->render($_GET['ctrl'],'Inscription');
            $control->checkValidation($_GET['ctrl'], $db);
            break;
        case 'project-view' :
            $control->render($_GET['ctrl'],'Les projets');
            break;
        case 'gallery-view' :
            $control->render($_GET['ctrl'],'Galerie');
            break;
        default :
            $control->render($_GET['ctrl'],'Accueil');
    }
}
else{
    $control->render('home-view','Accueil');
}

