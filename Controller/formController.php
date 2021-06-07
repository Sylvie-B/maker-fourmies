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
    public function formRender ($item) {
        // add good form on admin view
        switch ($item){
            case 1:
                echo "ici";
                break;
        }
    }

    // get admin form data
    public function getFormData (){
        /** case add action **/
        // test action data
        $this->checkData('actionType', 'actionTitle', 'actionDescription', 'startAction');
        // if not error action message

        // test image
        $this->checkData('imageTitle', 'actionImage');
        // if not error image message

        // test maker - other maker can be empty
        $this->checkData('maker', );

        // technic - time can be empty
        $this->checkData('actionTechnic', 'actionTool', 'actionMatter');

    }

}
