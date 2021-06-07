<div id="frame">
    <h2>Inscription</h2>

    <form class="formTest" method="post" action="/index.php?ctrl=signIn-view&test=1">
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="surname">Prénom</label>
            <input type="text" name="surname" id="surname">
        </div>
        <div>
            <label for="mail">Email</label>
            <input type="email" name="mail" id="mail">
        </div>
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo">
        </div>
        <div>
            <label for="passW">Mot de passe</label>
            <input id="passW" type="password" name="passW">
        </div>
        <div>
            <button id="validate" name="signIn">valider</button>
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
</div>

