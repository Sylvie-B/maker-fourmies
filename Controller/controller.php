<?php


class controller
{
    // display the right page function of index/user information/action - set title - pass information in array
    public function render(string $page, string $title, array $var = [])
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/header.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/view/" . $page . ".php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/footer.php";
    }

    // verify which form is to complete and is it complete
    public function checkValidation($param)
    {
        // which form ?
        if (!empty($_POST)) {
            switch ($param) {
                case 'connexion':
                    if (isset($_POST['pseudo'], $_POST['passW'])) {
                        $_GET['form'] = 1;
                    } else {
                        $_GET['form'] = 0;
                    }
                    break;
                case 'inscription':
                    if (isset($_POST['name'], $_POST['surname'], $_POST['mail'], $_POST['pseudo'], $_POST['passW'])) {
                        // form is complete
                        echo "formulaire d'inscription complet";
                    } else {
                        echo "formulaire d'nscription incomplet";
                    }
            }
        }
    }
}
