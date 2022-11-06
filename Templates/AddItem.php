<?php use app\Models\Item; ?>
<div id="addBackground">
    <h1>Add Item</h1>
<form method="post" id="addnew" action="/BlipsandChitz/item"enctype="multipart/form-data">
    <div id="img-src">
        <label for="fimg">Image Source: </label>
     <input type="file" name="fimg" required id="content-file">
    </div>
    <input type="text" name="fcena" required id="content-cena" placeholder="Cena">
    <select name="kategorija">
        <?php
        foreach(Item::getCategories() as $category)
        {
            echo "<option value='" . $category['kategorija_id'] . "'>" . $category['imeKategorije'] . "</option>";
        }
        ?>
    </select>
    <select name="tip">
        <?php
        foreach(Item::getTypes() as $tip)
        {
            echo "<option value='" . $tip['tip_id'] . "'>" . $tip['ime'] . "</option>";
        }
        ?>
    </select>
    <input type="submit" name="fsubmit" value="Submit">
</form>
</div>
<script type="text/javascript" src="public/js/crud.js"></script>