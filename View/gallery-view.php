<div id="mosaic">
    <?php
    foreach ($var as $item){?>
    <div class="frameImg frame">
        <div class="column mosaic">
            <img src='/img/action/<?= $item->getImage() ?>'
                 alt="<?= $item->getImageTitle() ?>"
                 title="<?= $item->getImageTitle() ?>"/>
            <div class="frameText"><?= $item->getImageTitle() ?></div>
        </div>
    </div>
    <?php
    }?>
</div>

