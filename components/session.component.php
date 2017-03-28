<?php 
	session_start();

if(!isset($_SESSION['uid'])){
 	header('location: ../todo-app/index.html');
 }
