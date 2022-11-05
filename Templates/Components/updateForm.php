<form method="post" id="update" name="updateForm" action="/BlipsandChitz/update">
    <input type="text" name='id' class="hidden" value="<?= $_POST['id']?>">
    <input type="text" name="fcena" required id="content-cena" placeholder="Cena">
    <input type="submit" value="Update">
</form>
