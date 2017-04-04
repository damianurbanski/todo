<?php 
require '../config/config.php';
require PATH . '/components/login.component.php';
require PATH . '/components/user.component.php';


$login = new Login($_POST['login'],$_POST['password']);

if($result = $login->init()){
	session_start();
	$_SESSION['uid'] = $result['id'];
	$_SESSION['name'] = $result['name'];
	$_SESSION['login'] = $result['login'];
	User::init($result['id']);

	header('Location: ../app.php');
} else {
	// if error
	header('Location: ../index.php?login=error');
}




