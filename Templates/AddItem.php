<?php use Modules\Item; ?>
<div id="addBackground">
<form method="post" id="addnew" enctype="multipart/form-data">
    <div id="img-src">
        <label for="fimg">Image Source: </label>
     <input type="file" name="fimg" required id="content-file">
    </div>
    <input type="text" name="fcena" required id="content-cena" placeholder="Cena">
    <select name="kategorija">
        <?php
        foreach(Item::getCategories($db) as $category)
        {
            echo "<option value='" . $category['kategorija_id'] . "'>" . $category['ime_kategorije'] . "</option>";
        }
        ?>
    </select>
    <select name="tip">

    </select>
    <input type="submit" name="fsubmit" value="Submit">
</form>
</div>