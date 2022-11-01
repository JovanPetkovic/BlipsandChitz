<?php
    namespace Templates;
?>

    <form method='post' class='item' >
        <input name='id' id='productID' value='<= $this->id ?>'/>
        <p class='cena' value='<= $this->price ?>'><= $this->id ?></p>
        <image class='slika' src='<= $this->image ?>' width='auto' height='250' >
        <button type='submit' name='addToCart' class='buyBtn'>Add to Cart</button>
        <input type='submit' name='deletebtn' class='delete' value='Delete'/>
        <input type='submit' name='updatebtn' class='update' value='Update'/>
    </form>;
