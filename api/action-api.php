<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/assoDb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Action.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'Model/Manager/ActionManager.php';

// database connexion
$db = new assoDb();
$db = $db->connect();

$actionManager = new ActionManager($db);
/**
 * return list of action
 * @param ActionManager $actionManager
 * @return string
 */
function getActionList(ActionManager $actionManager): string {
    $response = [];
    $data = $actionManager->getAllActions();
    foreach ($data as $action){
        $response[] = [
            'id_act' => $action->getIdAct(),
            'title' => $action->getTitle(),
        ];
    }
    return json_encode($response);
}
