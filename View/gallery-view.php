<div id="mosaic" class="frameText">
<!--display images-->
    <?php
        foreach ($var as $item){
            echo "
            <img class='imgFrame' src='/img/action/" . $item->getImage() . "' alt = '" . $item->getImageTitle() .
                " ' title='" . $item->getImageTitle() . "'>
            ";
        }
    ?>
</div>
