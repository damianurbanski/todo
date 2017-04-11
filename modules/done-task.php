<?php 
require $_SERVER["DOCUMENT_ROOT"].'/config/config.php';
require PATH.'modules/user.php';
if($_GET['task-id']){
if($user->remove_task($_GET['task-id'])) echo 'true';
else echo 'false';

} else echo 'false';