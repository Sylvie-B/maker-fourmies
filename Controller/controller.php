<?php


class controller {
    private PDO $pdo;
    private UserManager $userManager;

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

    /**
     * is there data and are they complete ?
     * @param mixed ...$data
     * @return bool
     */
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

    /**
     * verify which form is to complete
     * @param $param
     */
    public function checkValidation($param) {
        switch ($param) {

            case 'connexion-view':

                // check email & password
                if ($this->checkData('mail', 'passW')) {
                    // verify mail
                    if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                        header('location: index.php?ctrl=connexion-view&error=mail');
                    }
                    else{
                        // verify password
                        $user = $this->userManager->getUserByMail($_POST['mail']);
                        if($user && !password_verify($_POST['passW'], $user->getPassword())) {
                            header('location: index.php?ctrl=signIn-view&error=pass');
                        }
                        else {
                            // connect user
                            $_SESSION['user'] = [
                                'id' => $user['id_user'],
                                'mail' => $user['mail'],
                                'pseudo' => $user['pseudo'],
                                'role' => $user['role_fk']
                            ];
                            header('location: index.php?ctrl=signIn-view&error=0');
                        }
                    }
                }
                else {
                    // form incomplete
                    header('location: index.php?ctrl=connexion-view&error=form');
                }
                break;

            case 'signIn-view':

                // check all form fields
                if ($this->checkData('name', 'surname', 'pseudo', 'mail', 'passW')) {
                    $name = strip_tags($_POST['name']);
                    $surname = strip_tags($_POST['surname']);

                    // ! does pseudo exist ?
                    $pseudo = strip_tags($_POST['pseudo']);


                    if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                        header('location: index.php?ctrl=signIn-view&error=mail');
                    }

                    $password = password_hash($_POST['passW'], PASSWORD_ARGON2ID);

                    // add new user in data base
                    $ref = $this->userManager->addUser($name, $surname, $_POST['mail'], $pseudo, $password);
                    if(!$ref){
                        header('location: index.php?ctrl=signIn-view&error=add');
                    }
                }
                else {

                }
                break;
        }
    }
}
