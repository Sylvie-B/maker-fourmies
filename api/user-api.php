<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/assoDb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . 'Model/Manager/UserManager.php';

// database connexion
$db = new assoDb();
$db = $db->connect();

$userManager = new UserManager($db);

$request = $_SERVER['REQUEST_METHOD'];

