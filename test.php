<!DOCTYPE html>
<html>
<head>
	<title>TODO APP</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#222" />
<!-- STYLES -->
<!-- JS FILES -->
<!-- BOOTSTRAP -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/app.css">
<link rel="stylesheet" type="text/css" href="css/fontello.css">
</head>
<body>
<?php

include("components\user.component.php");

$reg = new User("1","2","3","4");
var_dump($reg->getTasks());



?>


<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>