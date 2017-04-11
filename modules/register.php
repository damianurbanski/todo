<?php 
	require __DIR__ . '\..\components\register.component.php';
	$data = array('login','email', 'name', 'password', 'password-repeat');

	function emptyData(){
		// Idea from http://stackoverflow.com/a/3190482/5678972
		foreach($data as $field) {
		return (bool) empty($_POST[$field]);
	    break;
	  	}	
	}
	
	$register = new Register(	
	$_POST['login'],
	$_POST['email'],
	$_POST['name'],
	$_POST['password']
	);
	switch (true) {
		case emptyData():	
	        header('location: ../index?register_state=empty');
	        break;
	    case ($_POST["password"]!==$_POST["password-repeat"]):
	        header('location: ../index?register_state=password_not_same');
	        break;
	    // case (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
	    //     header('location: ../index?register_state=bad_email');
	    //     break;
	    case ($register->isExistLogin()):
	        header('location: ../index?register_state=login_exist');
	        break;
	    case ($register->isExistEmail()):
	        header('location: ../index?register_state=email_exist');
	        break;
	    case ($register->register()):
	        header('location: ../index?register_state=successfull');
	        break;
	    default:
			header('location: ../index?register_state=error');
	}
