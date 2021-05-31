<div id="frame">
    <h2>Connexion</h2>
    <!-- connexion form -->
    <form method="post" action="/index.php?ctrl=connexion-view">
        <div>
            <label for="mail">Email</label>
            <input type="email" name="mail" id="mail">
        </div>
        <div>
            <label for="passW">mot de passe</label>
            <input id="passW" type="password" name="passW">
        </div>
        <div>
            <button id="validate" name="connect">valider</button>
        </div>
    </form>
    <p>
        <!-- display error message -->
        <?php
        if(isset($var['info'])){
            echo $var['info'];
        }?>
    </p>
</div>