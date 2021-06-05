<div>
    <h1>ADMINISTRATEUR</h1>
</div>
<!--
    admin :
    choose
    - update or delete user
    - update user's role
    - create action file

    admin & modo :
    - update or delete comment
    - create action

    <input type="checkbox" id="change" name="user">
    <label for="change">user</label>
-->

<!-- CREATE ACTION -->
<h2>nouvelle action</h2>
<form method="post" action="/index.php?ctrl=oneProject-view">
    <!-- PROJECT -->
    <input type="text" name="actionTitle" placeholder="titre">
    <textarea name="description" id="actionText" cols="30" rows="10" placeholder="description de l'action"></textarea>
    <!-- todo add images -->
    <label for="startDate">commencée le :</label>
    <input type="date" id="startDate">
    <select name="actionType" id="actionType">
        <option value="">type d'action</option>
        <option value="anim">animation</option>
        <option value="project">projet</option>
    </select>
    <!-- MAKER -->
    <label for="actionMaker">créateur</label>
    <select name="maker" id="actionMaker">
        <!-- get makers list -->
        <option value="">maker</option>
        <option value="heliosens">Heliosens</option>
    </select>
    <label for="otherMaker">participant(s)</label>
    <select name="otherMaker" id="otherMaker" multiple>
        <!-- get makers list -->
        <option value="heliosens">Heliosens</option>
    </select>

</form>
