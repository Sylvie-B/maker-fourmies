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
    <!-- ACTION -->
    <select name="actionType" id="actionType">
        <option value="">type d'action</option>
        <option value="anim">animation</option>
        <option value="project">projet</option>
    </select>

    <input type="text" name="actionTitle" placeholder="titre">
    <textarea name="actionDescription" id="actionDescription" cols="50" rows="3" placeholder="description de l'action"></textarea>
    <input type="text" name="imageTitle" placeholder="titre de l'image">
    <input type="text" name="actionImage" placeholder="image">

    <label for="startDate">commencée le :</label>
    <input type="date" id="startDate">

    <!-- MAKER -->
    <h3>Maker</h3>
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

    <!-- TECHNIC -->
    <h3>Technique</h3>

    <select name="actionTechnic" id="actionTechnic">
        <!-- get makers list -->
        <option value="">technique utilisée</option>
        <option value="modelisation">Modélisation 3D</option>
    </select>

</form>
