<?php
include 'config.php';
if(isset($_GET['view']) & !empty($_GET['view'])){
	if(file_exists( PATH.'view/' . $_GET['view']) . '.php'){
		include  PATH.'view/' . $_GET['view'] . '.php';
	} else{
		include  PATH.'view/404.php';
	}

}