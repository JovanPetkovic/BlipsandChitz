<?php
use app\Models\Shop;

$link = $_SERVER["DOCUMENT_ROOT"] . "/BlipsandChitz/";
Shop::getItems($db);
echo '</div>';
?>

 		<div id="hero-image">
 			<div class="container">
 				
 			</div>
 		</div>
 		<div id="shortcuts">
 			<form class="container" id="picks-form"method="POST" action="shop">
 				<div id="wc3">
 					<input type="submit" name="tip[]" value="2">
 				</div>
 				<div id="juju">
 					<input type="submit" name="tip[]" value="3">
 				</div>
 				<div id="hxh">
 					<input type="submit" name="tip[]" value="1">
 				</div>
 				<div id="rm">
 					<input type="submit" name="tip[]" value="4">
 				</div>
 			</form>
 		</div>
 		<div id="our-picks">
            <h1> Super Sale For You</h1>
 			<div class="items">
 				<?php  Shop::getDiscountItems() ?>
 			</div>
 		</div>

 		<script type="text/javascript" src="public/js/index.js"></script>
	</body>
</html>
