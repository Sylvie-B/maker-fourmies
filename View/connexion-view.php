<div id="frame">
    <h2>Connexion</h2>
    <p>
        <?php
        if(isset($var['info']) && $_GET['error'] == 0){
            echo $var['info'];
        }?>
    </p>
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
            <button id="validate" name="submit">valider</button>
        </div>
    </form>
</div>