<!-- connexion form -->
<form class="formTest" method="post" action="/index.php?ctrl=connexion-view&test=1">
    <div>
        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail">
    </div>
    <div>
        <label for="passW">Mot de passe</label>
        <input id="passW" type="password" name="passW">
    </div>
    <div>
        <button id="validate" name="connect">valider</button>
    </div>
</form>
<div id="target">
<!-- display error message -->
<?php
if(isset($var['info'])){?>
    <div class="red" id="target"><?=
    $var['info'];?>
    </div><?php
}?>
