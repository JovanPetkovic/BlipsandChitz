<?php
    namespace Templates;
?>

    <form method='post' class='item' action="/BlipsandChitz/item">
        <input name='id' id='productID' value='<?= $this->id ?>'/>
        <p class='cena' value='<?= $this->getPrice() ?>'><?= $this->getPrice() . '€' ?></p>
        <image class='slika' src='<?= $this->getImage() ?>' width='auto' height='250' >
        <button type='submit' name='addToCart' class='buyBtn'>Add to Cart</button>
        <input type='submit' name='delete' class='delete' value='Delete'/>
        <input type='submit' name='edit' class='update' value='Edit'/>
    </form>

