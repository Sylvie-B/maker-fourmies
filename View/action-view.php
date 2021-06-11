<?php
    foreach ($var as $item){?>
<div class="square" >
    <span><?= $item->getTitle() ?></span>
    <div class="description">
        <p><?= $item->getDescription() ?></p>
    </div>
</div>
    <?php
    }


//<!--                Projet fini-->
//<!--            </p>-->
//<!--
//<!--        <a href="/index.php?ctrl=oneProject-view">-->
//<!--            <img class="picture" src="../img/action/repose-arc.png" alt="image du projet 1">-->
//<!--        </a>-->
//<!--    </div>-->
//

