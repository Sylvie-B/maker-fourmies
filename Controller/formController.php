<?php


class formController {
    private PDO $pdo;
    private ActionManager $actionManager;
    private TypeManager $typeManager;
    private ImageManager $imgManager;
    private UserManager $maker;
    private TechnicManager $technic;
    private ToolManager $tool;
    private MatterManager $matter;

    /**
     * formController constructor.
     * @param $pdo
     */
    public function __construct ($pdo){
        $this->pdo = $pdo;
        $this->actionManager = new ActionManager($this->pdo);
        $this->typeManager = new TypeManager($this->pdo);
        $this->imgManager = new ImageManager($this->pdo);
        $this->maker = new UserManager($this->pdo);
        $this->technic = new TechnicManager($this->pdo);
        $this->tool = new ToolManager($this->pdo);
        $this->matter = new MatterManager($this->pdo);
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


    // get action form data

    /**
     * @return bool
     */
    public function checkActionData (){
        // if check action-part return true else false then error message
        if($this->checkData('actionType', 'actionTitle', 'actionDescription', 'startAction')){ // test action data
            $type = $_POST['actionType'];
            $id_type = $this->typeManager->typeId($type)->getIdType();
            $title = strip_tags($_POST['actionTitle']);
            $description = strip_tags($_POST['actionDescription']);
            $start = $_POST['startAction'];
            // sub-part action
            $this->actionManager->addAction($title, $description, $start, $id_type);

            // if check image-part
            if ($this->checkData('imageTitle', 'actionImage')) {   // test image
                $imgTitle = strip_tags($_POST['imageTitle']);
                $actionImg = strip_tags($_POST['actionTitle']);
                // sub-part image
                $this->imgManager->addImage();
            }
            else {
                $this->formRender('operation-view', 'Publier une ACTION', ["erreur dans Image"]);
            }
        }
        else{
            $this->formRender('operation-view', 'Publier une ACTION', ["erreur dans Action"]);
        }



//        elseif (!$this->checkData('maker', )){   // test maker - other maker can be empty
//            $this->formRender('operation-view', 'Publier une ACTION', ["erreur dans Maker"]);
//        }
//        elseif (!$this->checkData('actionTechnic', 'actionTool', 'actionMatter')){   // technic - time can be empty
//            $this->formRender('operation-view', 'Publier une ACTION', ["erreur dans Technic"]);

        return true;
    }
}
