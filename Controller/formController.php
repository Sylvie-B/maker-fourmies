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

    public function formRender ($item) {
        // add good form on admin view
        switch ($item){
            case 1:
                echo "ici";
                break;

        }
    }
}
