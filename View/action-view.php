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
