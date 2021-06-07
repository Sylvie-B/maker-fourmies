<div>
    <h3>MODE ADMINISTRATEUR</h3>
</div>

<!-- principals entities -->
<ul id="first">
  <li class="entity">User</li>
  <li class="entity">Action</li>
  <li id="others">Base de données</li>
</ul>

<!-- others entities -->
<ul id="second">
    <li class="entity">Image</li>
    <li class="entity">Matiére</li>
    <li class="entity">Origine</li>
    <li class="entity">Role</li>
    <li class="entity">Technique</li>
    <li class="entity">Outils</li>
    <li class="entity">Type</li>
</ul>

<!-- operation -->
<ul id="operation">

    <li class="action">
        <a href="/index.php?ctrl=admin-view&action=add">Ajouter</a>
    </li>
    <li class="action">
        <a href="/index.php?ctrl=admin-view">Voir la liste</a>
    </li>
    <li class="action">
        <a href="/index.php?ctrl=admin-view">Mettre à jour</a>
    </li>
    <li class="action">
        <a href="/index.php?ctrl=admin-view">Supprimer</a>
    </li>
</ul>


<?php
// formController display good form
require_once $_SERVER['DOCUMENT_ROOT'] . "/Model/assoDb.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/formController.php";
$db = new assoDb();
$db = $db->connect();
$formCtrl = new formController($db);
//    $refForm = 'action';
if(isset($_GET['action'])){?>
<div id="frameForm"><?php
    switch ($_GET['action']){
        case 'add' :
            $formCtrl->formRender('operation-view', 'PUBLIER UNE ACTION');
    }?>
</div><?php
}


