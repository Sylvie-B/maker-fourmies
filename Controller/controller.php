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

    // render form for admin or modo to change user or action

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
     * switch between connexion or inscription view
     *
     * @param $param
     */
    public function checkValidation($param) {
        // $param can be connexion or inscription
        switch ($param) {
            // connexion
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

                        if(!$user || !password_verify($_POST['passW'], $passW)) {
                            // if user don't exist or if it's not the good password
                            //redirect to connexion page with error mail or password
                            header('location: index.php?ctrl=connexion-view&error=mail-pass');
                        }
                        else {
                            // if user exist and password is correct
                            // start a session
                            session_start();
                            // give session user's values
                            $_SESSION['user'] = [
                                'id' => $user->getIdUser(),
                                'mail' => $user->getMail(),
                                'pseudo' => $user->getPseudo(),
                                'role' => $user->getRoleFk(),
                            ];
                            // go to home page
                            header('location: index.php?ctrl=home-view');
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

                    // testExist return true if pseudo or mail already exist
                    if($this->userManager->testExist('pseudo', $pseudo)){
                        header('location: index.php?ctrl=signIn-view&error=pseudo');
                    }
                    elseif ((!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)
                        || $this->userManager->testExist('mail',$_POST['mail']))){
                        // this is not an email or it's already exist
                        header('location: index.php?ctrl=signIn-view&error=mail');
                    }
                    else{
                        $password = password_hash($_POST['passW'], PASSWORD_ARGON2ID);
                        // add new user in data base
                        $add = $this->userManager->addUser($name, $surname, $pseudo, $_POST['mail'], $password);
                        if(!$add){
                            header('location: index.php?ctrl=signIn-view&error=add');
                        }
                        else{
                            session_start();
                            $_SESSION['user'] = [
                                'pseudo' => $pseudo,
                                'role' => 4,
                            ];
                            header('location: index.php?ctrl=home-view');
                        }
                    }
                }
                else {
                    header('location: index.php?ctrl=signIn-view&error=form');
                }
                break;
        }
    }

    /**
     * stop the session
     */
    public function disconnect (){
        session_start();
        session_unset();
        // setcookie("PHPSESSID", "", time() - 3600);
        header('location: index.php?ctrl=home-view&');
    }

}
