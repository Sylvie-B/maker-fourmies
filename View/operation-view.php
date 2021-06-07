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
<h2><?=$title?></h2>
<form class="operationForm" method="post" action="/index.php?ctrl=admin-view&test=1">
    <div id="ref">
        <!-- ACTION -->
        <div class="part">
            <h3>Action</h3>

            <select name="actionType" id="actionType">
                <option value="">type d'action</option>
                <option value="anim">animation</option>
                <option value="project">projet</option>
            </select>

            <input type="text" name="actionTitle" placeholder="titre">
            <textarea name="actionDescription" id="actionDescription" cols="50" rows="3"
                      placeholder="description de l'action"></textarea>

            <label for="startDate">commencée le :</label>
            <input type="date" name="startAction" id="startDate">

            <h3>Image</h3>
            <input type="text" name="imageTitle" placeholder="titre de l'image">
            <input type="text" name="actionImage" placeholder="image">

        </div>

        <!-- MAKER -->
        <div class="part">
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
                <option value="">autre(s)</option>
                <option value="heliosens">Heliosens</option>
            </select>
        </div>

        <!-- TECHNIC -->
        <div class="part">
            <h3>Technique</h3>
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
            <h3>Temps :</h3>
            <label for="conceptionTime">conception</label>
            <input type="time" name="conception" id="conceptionTime">

            <label for="realisationTime">réalisation</label>
            <input type="time" name="realisation" id="realisationTime">
        </div>
    </div>
    <button type="">publier</button>
</form>
<!-- display error message -->
<?php
if(isset($var['info'])){?>
<div class="red" id="target"><?=
    $var['info'];?>
</div><?php
}
