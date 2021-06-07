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
        include $_SERVER['DOCUMENT_ROOT'] . "/view/" . $typeForm . ".php";
    }

    /**
     * @return bool
     */
    // get admin form data
    public function checkActionData (){
        // if not check return false then error message
        if(!$this->checkData('actionType', 'actionTitle', 'actionDescription', 'startAction')){ // test action data
            $this->formRender('operation-view', 'Publier une ACTION', ["erreur dans Action"]);
        }
        elseif (!$this->checkData('imageTitle', 'actionImage')) {   // test image
            $this->formRender('operation-view', 'Publier une ACTION', ["erreur dans Image"]);
        }
        elseif (!$this->checkData('maker', )){   // test maker - other maker can be empty
            $this->formRender('operation-view', 'Publier une ACTION', ["erreur dans Maker"]);
        }
        elseif (!$this->checkData('actionTechnic', 'actionTool', 'actionMatter')){   // technic - time can be empty
            $this->formRender('operation-view', 'Publier une ACTION', ["erreur dans Technic"]);
        }
        return true;
    }
}
