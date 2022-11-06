<?php
use app\Models\Shop;
Shop::getItems($db);
include "Components/filters.html";
?>
<h1> Shop</h1>
<div class="items">
    <?php
    Shop::ispisiSadrzaj();
    ?>
</div>
<div id="back"></div>
<script src="/BlipsandChitz/public/js/shop.js"></script>
<script type="text/javascript" src="public/js/crud.js"></script>