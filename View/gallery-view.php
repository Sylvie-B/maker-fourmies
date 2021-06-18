<div id="mosaic" class="frameText">
    <?php
        foreach ($var as $item){?>
        <div class="brouette">
            <div class='imgFrame'>
                <img class="imgWidth" src='/img/action/<?= $item->getImage() ?>'
                     alt="<?= $item->getImageTitle() ?>"
                     title="<?= $item->getImageTitle() ?>"
                />
                <div class="textText"><?= $item->getImageTitle() ?></div>
            </div>
        </div>
    <?php
    }
