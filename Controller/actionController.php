<?php


class actionController extends controller {
    private TypeManager $typeManager;
    private ActionManager $actionManager;
    private ImageManager $imageManager;

    /**
     * @return bool
     */
    public function checkActionData (){
        // check action-part form return true or error message
        if($this->checkData('actionType', 'actionTitle', 'actionDescription', 'startAction')){

            // get id type
            $type = strip_tags($_POST['actionType']);
            $id_type = $this->typeManager->typeId($type)->getIdType();

            // action title
            $title = strip_tags($_POST['actionTitle']);
            $description = strip_tags($_POST['actionDescription']);
            $start = $_POST['startAction'];

            $this->actionManager->addAction($title, $description, $start, $id_type);

            // if check image-part form
            if ($this->checkData('imageTitle', 'actionImage')) {   // test image
                $imgTitle = strip_tags($_POST['imageTitle']);
                $actionImg = strip_tags($_POST['actionTitle']);
                // sub-part image
                $this->imageManager->addImage($imgTitle, $actionImg);
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