<?php


class controller {
    // display the right page function of index/user information/action - set title - pass information in array
    public function render(string $page, string $title, array $var = [])
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/header.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/view/" . $page . ".php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/footer.php";
    }

    // verify which form is to complete and is it complete
    public function checkValidation($param, $pdo)
    {
        // which form ?
        if (!empty($_POST)) {
            switch ($param) {
                case 'connexion':
                    // check pseudo & password
                    if (isset($_POST['pseudo'], $_POST['passW'])) {
                        $pseudo = strip_tags($_POST['pseudo']);
                        $password = password_hash($_POST['passW'], PASSWORD_ARGON2ID);
                    } else {
                        // form incomplete
                        echo "pseudo ou mot de passe incorrect";
                    }
                    break;
                case 'inscription':
                    // check all form fields
                    if (isset($_POST['name'], $_POST['surname'], $_POST['mail'], $_POST['pseudo'], $_POST['passW'])) {
                        $name = strip_tags($_POST['name']);
                        $surname = strip_tags($_POST['surname']);
                        $pseudo = strip_tags($_POST['pseudo']);
                        if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                            echo("adresse mail incorrecte");
                        }
                        $password = password_hash($_POST['passW'], PASSWORD_ARGON2ID);

                    }
                    else {
                        echo ("le formulaire est incomplet");
                    }
            }
        }
    }
}

// wich form
// con = check con
// ins = check insc + con
