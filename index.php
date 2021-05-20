<?php

// Inclusion des entités.

// Inclusion des managers.

// Inclusion des controllers.
require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/controller.php";

// database connexion


$control = new controller();

$control->render('signIn.php', 'inscription');
