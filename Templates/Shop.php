<?php

use Modules\Shop;

    Shop::getItems($db);

    include "filters.php";
?>



<div class="items">
    <?php
        Shop::ispisiSadrzaj();
    ?>
</div>

<div id="back"></div>

<script src="/BlipsandChitz/public/js/shop.js"></script>