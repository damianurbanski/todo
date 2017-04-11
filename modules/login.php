<?php 
require '../config/config.php';
require '../components/login.component.php';
require '../components/user.component.php';

var_dump($_POST);
$login = new Login($_POST['login'],$_POST['password']);

if($result = $login->init()){
	session_start();
	$_SESSION['uid'] = $result['id'];
	$_SESSION['name'] = $result['name'];
	$_SESSION['login'] = $result['login'];

	header('Location: /app-dashboard');
} else {
	// if error
	header('Location: ../index?login=error');
}




