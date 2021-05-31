<?php
// database inclusion & connexion
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/assoDb.php';
$db = new assoDb();
$db = $db->connect();

// entities inclusions
require_once $_SERVER['DOCUMENT_ROOT'] . "/Model/Entity/User.php";

// managers inclusions
require_once $_SERVER['DOCUMENT_ROOT'] . "/Model/Manager/UserManager.php";

// controller inclusion
require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/controller.php";

$control = new controller($db);

// use $_GET['ctrl'] value to redirect to the right page
if(isset($_GET['ctrl'])){
    switch ($_GET['ctrl']){
        case 'home-view' :
            // $_GET['error'] = 0 means form data were validated
            if(isset($_GET['error']) && $_GET['error'] == 0){
                $control->render($_GET['ctrl'], 'Accueil', [
                    'info' => "Vous êtes connecté",
                ]);
            }
            $control->render($_GET['ctrl'], 'Accueil');
            break;
        case 'connexion-view' :
            $control->render($_GET['ctrl'], 'Connexion');
            // if form submit
            if(isset($_GET['submit'])){
                $control->checkValidation($_GET['ctrl']);
                switch ($_GET['error']){
                    // $_GET['error'] = mail-pass means error on mail or password data
                    case 'mail-pass':
                        $control->render($_GET['ctrl'], 'Connexion', [
                            'info' => "L'adresse mail et/ou le mot de passe est incorrecte"
                        ]);
                        break;
                    case 'form':
                        // $_GET['error'] = form means an incomplete form
                        $control->render($_GET['ctrl'], 'Connexion', [
                            'info' => "Le formulaire est incomplet"
                        ]);
                        break;
                }
            }
            break;
        case 'signIn-view' :
            if(isset($_GET['error']) && $_GET['error'] == 0){
                $control->render($_GET['ctrl'], 'Inscription', [
                    'info' => ""
                ]);
            }
            else{
                $control->render($_GET['ctrl'], 'Inscription');
                $control->checkValidation($_GET['ctrl']);
            }
            break;
        case 'disconnection' :
            session_destroy();
            $control->render($_GET['ctrl'], 'Accueil', [
                'info' => "Vous avez été déconnecté"
            ]);
            break;

        case 'project-view' :
            $control->render($_GET['ctrl'],'Les projets des makers');
            break;
        case 'oneProject-view' :
            $control->render($_GET['ctrl'], 'projet de maker fourmies');
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

