<?php 
require $_SERVER["DOCUMENT_ROOT"].'/config/config.php';
require PATH.'modules/user.php';
if($_POST['name']){
$name = $_POST['name'];

if($user->add_project($name)) echo 'true';
else echo 'false';

} else echo 'false';