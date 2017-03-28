<?php 
	session_start();

if(!isset($_SESSION['uid'])){
 	header('location: index.php?error=not_logged');
 }
