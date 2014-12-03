<?php
if(isset($_COOKIE['userid'])){
	setcookie('userid', '', time()-(86400 * 30), '/');
	header("Location: index.php");
}
?>