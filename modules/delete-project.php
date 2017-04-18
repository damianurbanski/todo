<?php 
require $_SERVER["DOCUMENT_ROOT"].'/config/config.php';
require PATH.'modules/user.php';
if($_GET['project-id']){
$pid = $_GET['project-id'];

if($user->delete_project($pid)) echo 'true';
else echo 'false';

} else echo 'false';