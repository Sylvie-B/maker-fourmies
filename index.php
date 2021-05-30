<?php
// database inclusion & connexion
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/assoDb.php';
$db = new assoDb();
$db = $db->connect();

// entities inclusions

// managers inclusions
require_once $_SERVER['DOCUMENT_ROOT'] . "/Model/Manager/UserManager.php";
// controller inclusion
require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/controller.php";
$control = new controller($db);




if(isset($_GET['ctrl'])){
    switch ($_GET['ctrl']){
        case 'home-view' :
            $control->render($_GET['ctrl'], 'Accueil');
            break;
        case 'connexion-view' :
            if(isset($_GET['mail']) && $_GET['mail'] == 0){
                $control->render($_GET['ctrl'], 'Connexion', [
                    'info' => "L'adresse mail et/ou le mot de passe est incorrecte"
                ]);
            }
            else{
                $control->render($_GET['ctrl'], 'Connexion');
                $control->checkValidation($_GET['ctrl']);
            }
            break;
        case 'signIn-view' :
            if(isset($_GET['mail']) && $_GET['mail'] == 0){
                $control->render($_GET['ctrl'], 'Inscription', [
                    'info' => "L'adresse mail et/ou le mot de passe est incorrecte"
                ]);
            }
            else{
                $control->render($_GET['ctrl'], 'Inscription');
                $control->checkValidation($_GET['ctrl']);
            }
            $control->render($_GET['ctrl'],'Inscription');
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

