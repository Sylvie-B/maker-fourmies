<div id="frame">
    <!-- affect inscription or connexion -->
    <h2>Inscription</h2>
    <form method="post" action="../Controller/controller.php">
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
            <label for="passW">mot de passe</label>
            <input id="passW" type="password" name="passW">
        </div>
        <div>
            <button id="validate">valider</button>
        </div>
    </form>
</div>