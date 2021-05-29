<?php


class controller {

    private PDO $pdo;
    private UserManager $userManager;

    /**
     * controller constructor.
     * @param $pdo
     */
    public function __construct ($pdo){
        $this->pdo = $pdo;
        $this->userManager = new UserManager($this->pdo);
    }

    /**
     * display the right page - set title - give data in array
     * @param string $page
     * @param string $title
     * @param array $var
     */
    public function render(string $page, string $title, array $var = []) {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/header.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/view/" . $page . ".php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/footer.php";
    }

    // is there data and are they complete ?
    public function checkData(...$data): bool {
        foreach ($data as $input) {
            // is data exist ?
            if(!isset($_POST[$input])){
                return false;
            }
            else{
                // is data not empty ?
                if(empty($_POST[$input])){
                    return false;
                }
            }
        }
        return true;
    }

    // verify which form is to complete
    public function checkValidation($param) {
        switch ($param) {
            case 'connexion-view':
                // check pseudo & password
                if ($this->checkData('pseudo', 'passW')) {
                    $pseudo = strip_tags($_POST['pseudo']);
                    $password = password_hash($_POST['passW'], PASSWORD_ARGON2ID);
                } else {
                    // form incomplete
                    echo "pseudo ou mot de passe incorrect";
                }
                break;
            case 'signIn-view':
                // check all form fields
                if ($this->checkData('name', 'surname', 'pseudo', 'mail', 'passW')) {
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

