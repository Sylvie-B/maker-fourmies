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
     * are there data and are they complete ?
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
     * display the form which is to complete
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
                        // if it's an email, verify that user exist & check password
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
                            // go to home page with success
                            header('location: index.php?ctrl=home-view&success=1');
                        }
                    }
                }
                else {
                    // form incomplete
                    header('location: index.php?ctrl=connexion-view&error=form');
                }
                break;

            case 'signIn-view':
                // check all fields
                if ($this->checkData('name', 'surname', 'mail', 'pseudo', 'passW')) {
                    // protect user entry
                    $name = strip_tags($_POST['name']);
                    $surname = strip_tags($_POST['surname']);
                    $pseudo = strip_tags($_POST['pseudo']);

                    // does pseudo exist ? true if pseudo exist
                    if($this->userManager->testPseudo($pseudo)){
                        header('location: index.php?ctrl=signIn-view&error=pseudo');
                    }
                    else{
                        // is this an email ?
                        if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                            header('location: index.php?ctrl=signIn-view&error=mail');
                        }
                        else{
                            $password = password_hash($_POST['passW'], PASSWORD_ARGON2ID);
                            // add new user in data base
                            $ref = $this->userManager->addUser($name, $surname, $_POST['mail'], $pseudo, $password);
                            if(!$ref){
                                header('location: index.php?ctrl=signIn-view&error=add');
                            }
                            else{
                                $_SESSION['user'] = [
                                    'pseudo' => $pseudo,
                                ];
                                header('location: index.php?ctrl=home-view&success=1');
                            }
                        }
                    }
                }
                else {
                    header('location: index.php?ctrl=signIn-view&error=form');
                }
                break;
        }
    }
}
