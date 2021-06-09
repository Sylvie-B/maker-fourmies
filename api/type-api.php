<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/assoDb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Type.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/TypeManager.php';

header('Content-Type: application/json');

$db = new assoDb();
$db = $db->connect();

$typeManager = new TypeManager($db);

$request = $_SERVER['REQUEST_METHOD'];


if($request && $request == 'GET'){
    selectType($typeManager);
}


function selectType(TypeManager $typeManager): string {
    $ref = [];
    $item = $typeManager->getAllTypes();
    foreach ($item as $type){
        $ref[] = [
            'id_type' => $type->getIdType(),
            'type' => $type->getType()
        ];
    }
    return json_encode($ref);
}

