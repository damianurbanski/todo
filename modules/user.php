<?php
	require $_SERVER["DOCUMENT_ROOT"]. '\components\user.component.php';
	if(!isset($_SESSION)) {session_start();}
	$user = new User($_SESSION['uid']);