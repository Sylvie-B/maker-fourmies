<?php


class controller {
    public function render(string $page, string $title, array $var = []){
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/header.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/view/" . $page. ".php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/footer.php";
    }

    public function checkInscription ($param){
//        which form ? -> case $_GET[ctrl]
//        switch ($param){
//            case
//        }
        if(!empty($_POST)){
            if(isset($_POST['name'], $_POST['surname'], $_POST['mail'], $_POST['pseudo'], $_POST['passW'])){
                // form is complete
                echo 'ici';
            }
        }
    }
}


