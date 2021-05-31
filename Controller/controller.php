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
            // $param can be connexion or inscription
            case 'connexion-view':
                // check email & password
                if ($this->checkData('mail', 'passW')) {
                    // verify if it's an email
                    if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                        // if not redirect to connexion page with error mail or password
                        header('location: index.php?ctrl=connexion-view&error=mail-pass');
                    }
                    else{
                        // if it's an email verify password
                        $user = $this->userManager->getUserByMail($_POST['mail']);
                        $passW = $user->getPassword();
                        if($user && !password_verify($_POST['passW'], $passW)) {
                            // if it's not the good password redirect to connexion page
                            // with error mail or password
                            header('location: index.php?ctrl=connexion-view&error=mail-pass');
                        }
                        else {
                            // for the good pass word : connect user
                            $_SESSION['user'] = [
                                'id' => $user['id_user'],
                                'mail' => $user['mail'],
                                'pseudo' => $user['pseudo'],
                                'role' => $user['role_fk']
                            ];
                            // and go to home page with error = 0
                            header('location: index.php?ctrl=home-view&error=0');
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
