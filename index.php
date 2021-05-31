<?php
// database inclusion
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/assoDb.php';
// database connexion
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
        // home
        case 'home-view' :
            // $_GET['success'] = 1 means form data were validated
            if(isset($_GET['success']) && $_GET['success'] == 1){
                $control->render($_GET['ctrl'], 'Accueil', [
                    'info' => "vous êtes connecté",
                ]);
            }
            $control->render($_GET['ctrl'], 'Accueil');
            break;

        case 'connexion-view' :
            // display connection form
            $control->render($_GET['ctrl'], 'Connexion');
            // if connexion form is submit
            if(isset($_GET['connect'])){
                // call form validation methode
                $control->checkValidation($_GET['ctrl']);
                // if an error occurs...
                if($_GET['error']){
                    switch ($_GET['error']){
                        // $_GET['error'] = mail-pass means error on mail or password
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
            }
            break;

        case 'signIn-view' :
            // display inscription form
            $control->render($_GET['ctrl'], 'Inscription');
            // if inscription form is submit
            if(isset($_GET['signIn'])){
                // call form validation methode
                $control->checkValidation($_GET['ctrl']);
                // if an error occurs...
                if($_GET['error']){
                    switch ($_GET['error']){
                        case 'pseudo':
                            $control->render($_GET['ctrl'], 'Inscription', [
                                'info' => "Ce pseudo existe déjà"
                            ]);
                            break;
                        case 'mail':
                            $control->render($_GET['ctrl'], 'Inscription', [
                                'info' => "adresse mail incorrecte"
                            ]);
                            break;
                        case 'add':
                            $control->render($_GET['ctrl'], 'Inscription', [
                                'info' => "erreur lors de l'inscription"
                            ]);
                            break;
                        case 'form':
                            $control->render($_GET['ctrl'], 'Inscription', [
                                'info' => "formulaire incomplet"
                            ]);
                            break;
                    }
                }
            }
            break;
        // projects page
        case 'project-view' :
            $control->render($_GET['ctrl'],'Les projets des makers');
            break;
        // one project page for maker only
        case 'oneProject-view' :
            $control->render($_GET['ctrl'], 'projet de maker fourmies');
            break;
        // display gallery
        case 'gallery-view' :
            $control->render($_GET['ctrl'],'Galerie');
            break;
        // home
        default :
            $control->render('home-view','Accueil');
    }
}
else{
    $control->render('home-view','Accueil');
}

// when click on disconnect button
if(isset($_GET['logOut'])){
    session_destroy();
    $control->render('home-view', 'Accueil', [
        'info' => "Vous avez été déconnecté"
    ]);
}
