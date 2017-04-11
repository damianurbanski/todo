<?php 
require $_SERVER["DOCUMENT_ROOT"].'/config/config.php';
require PATH.'modules/user.php';
if($_POST['name']){
$name = $_POST['name'];
$project_id = $_POST['project-id'];
$priority = $_POST['priority'];
$deadline = $_POST['date'];




if($user->add_task($name,$project_id, $priority, $deadline)) echo 'true';
else echo 'false';

} else echo 'false';