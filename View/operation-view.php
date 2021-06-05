<!--    if admin show
    create action or user
    read
    update
    delete
-->
<!--    if modo show
    create action
    read action
    update action or user
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

    <h3>Technique</h3>

    <!-- TECHNIC -->
    <select name="actionTechnic" id="actionTechnic">
        <!-- get technics list -->
        <option value="">technique utilisée</option>
        <option value="modelisation">Modélisation 3D</option>
    </select>

    <!-- TOOL -->
    <select name="actionTool" id="actionTool">
        <!-- get tools list -->
        <option value="">outils utilisés</option>
        <option value="modelisation">Imprimante 3D</option>
    </select>

    <!-- MATTER -->
    <select name="actionMatter" id="actionMatter">
        <!-- get matters list -->
        <option value="">matière</option>
        <option value="pla">PLA</option>
        <option value="abs">ABS</option>
    </select>

    <!-- TIME -->
    <label for="conceptionTime">temps de conception</label>
    <input type="time" name="conception" id="conceptionTime">

    <label for="realisationTime">temps de réalisation</label>
    <input type="time" name="realisation" id="realisationTime">

</form>