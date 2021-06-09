<?php


class formController {
    private PDO $pdo;

    /**
     * formController constructor.
     * @param $pdo
     */
    public function __construct ($pdo){
        $this->pdo = $pdo;
    }

    /**
     * are there data and are they complete ?
     * @param mixed ...$data
     * @return bool
     */
    public function checkData(...$data): bool {
        foreach ($data as $input) {
            // is data exist ? is data not empty ?
            return !isset($_POST[$input]) ? false : (empty($_POST[$input]) ? false : true);
        }
        return true;
    }

    // give the right form

    /**
     * @param $typeForm
     * @param $title
     * @param array $var
     */
    public function formRender ($typeForm, $title, array $var = []) {
        // add good form on admin view
        include $_SERVER['DOCUMENT_ROOT'] . "/view/partials/" . $typeForm . ".php";
    }
}
