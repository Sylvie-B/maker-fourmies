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
        // connexion
        case 'connexion-view' :
            // if an error occurs...
            if(isset($_GET['error'])){
                switch ($_GET['error']){
                    // $_GET['error'] = mail-pass means error on mail or password
                    case 'mail-pass':
                        $control->render($_GET['ctrl'], 'Connexion', [
                            'info' => "L'adresse mail et/ ou le mot de passe est incorrecte"
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
            // there's no error, is there validation (test = 1) ?
            elseif (isset($_GET['test']) == 1){
                $control->checkValidation($_GET['ctrl']);
            }
            else{
                // display connection form only if there's no test & no error
                $control->render($_GET['ctrl'], 'Connexion');
            }
            break;
        // inscription
        case 'signIn-view' :
            // if an error occurs...
            if(isset($_GET['error'])){
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
            // there's no error, is there validation (test = 1) ?
            elseif (isset($_GET['test']) == 1){
                $control->checkValidation($_GET['ctrl']);
            }
            else{
                // display inscription form only if there's no test & no error
                $control->render($_GET['ctrl'], 'Inscription');
            }
            break;
        // home
        case 'home-view' :
            // display home page
            if(isset($_GET['connect']) && $_GET['connect'] == 0){
                $control->disconnect();
            }
            $control->render($_GET['ctrl'], 'Association Makers Fourmies');
            break;
        // projects page
        case 'project-view' :
            $control->render($_GET['ctrl'],'Les projets des makers');
            break;
        // home
        case 'resource-view' :
            $control->render($_GET['ctrl'], 'Association Makers Fourmies');
            break;
        // one project page for maker only
        case 'oneProject-view' :
            $control->render($_GET['ctrl'], 'projet de maker fourmies');
            break;
        // display gallery
        case 'gallery-view' :
            $control->render($_GET['ctrl'],'Galerie');
            break;
        // admin
        case 'admin-view' :
            $control->render($_GET['ctrl'],'admin');
            break;
        //user-record
        case 'user-view' :
            $control->render($_GET['ctrl'],'profil');
            break;
        // home
        default :
            $control->render('home-view','Association Makers Fourmies');
    }
}
else{
    $control->render('home-view','Association Makers Fourmies');
}


