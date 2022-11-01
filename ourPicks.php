<?php
	

	function ourPicks($db){
		$result = $db->query("SELECT * FROM proizvodi WHERE popust = 1");
		ispisiSadrzaj($result,"");
	}

?>