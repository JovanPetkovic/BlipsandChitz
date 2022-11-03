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
            echo "<option value='" . $category['kategorija_id'] . "'>" . $category['imeKategorije'] . "</option>";
        }
        ?>
    </select>
    <select name="tip">
        <?php
        foreach(Item::getTypes($db) as $tip)
        {
            echo "<option value='" . $tip['tip_id'] . "'>" . $tip['ime'] . "</option>";
        }
        ?>
    </select>
    <input type="submit" name="fsubmit" value="Submit">
</form>
</div>