<?php 
	require __DIR__ . '\..\components\user.component.php';
	$user = new User($_SESSION['uid']);