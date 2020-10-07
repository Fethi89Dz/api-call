<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/php-template/search.php":
			$CURRENT_PAGE = "البحث"; 
			$PAGE_TITLE = "البحث";
			break;
		
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "هابي سيزون";
	}
?>