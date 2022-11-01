<?php

        $link = $_SERVER["DOCUMENT_ROOT"] . "/BlipsandChitz/";
		require $link . "functions.php";
		require $link . "/Modules/Shop/crud.php";
		require $link . "cartFunctionality.php";
		require $link . "ourPicks.php";
		// Funkcija crud daje CRUD funkcionalnosti web aplikaciji i prikazuje potrebne elemente web stranice

 		echo '</div>';
 	?>

 		<div id="hero-image">
 			<div class="container">
 				
 			</div>
 		</div>
 		<div id="shortcuts">
 			<form class="container" id="picks-form"method="POST" action="shop/index.php">
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
 			<div class="items">
 				<?php ourPicks($db) ?>
 			</div>
 		</div>

 		<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>
