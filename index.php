<?php
require 'config/config.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>TODO APP</title>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- STYLES -->
<!-- JS FILES -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<!-- BOOTSTRAP -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/fontello.css">


<meta name="theme-color" content="#222" />
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

<script src="js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-default navbar-xs" role="navigation">
    <div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
 <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
        <img style="max-width:100px; margin-top: -7px;"
             src="/img/transparent-white-logo.png">
    </a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li>
        <a href="dashboard">
        <li><a href="register">Informacje</a></li>
        <li><a href="login">Logowanie</a></li>
        <li><a href="#">Rejestracja</a></li>
        </a></li>
      </ul>
  </div>
  </div>
</nav>



<section class="content">
	<header class="main-header">
	 <div class="overlay"></div>
	 <div class="inner col-lg-8 col-lg-offset-2">
	 <h1 class="text-center">
	 	Lorem ipsum dolor asmet
	 </h1>
	 <h3 class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	 consequat.</h3>

	 <div class="text-center main-header-btn-wrapper">
	 <button class="btn btn-xxl btn--red" data-toggle="modal" data-target="#register">Zarejestruj się</button>
	 <button class="btn btn-xxl btn--red" data-toggle="modal" data-target="#login">Zaloguj się</button>
	 </div>
</div>


</header>






</section>





<!-- Modal -->
<div id="register" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content modal-md">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class=" text-center">REJESTRACJA</h5>
      </div>
      <div class="modal-body">
      	<div class="text-center register-social-wrapper">
      <button class="register-social facebook"><i class="icon-facebook"></i>Zarejestruj się przez facebooka</button>
      <button class="register-social google"><i class="icon-gplus-1"></i>&nbsp Zarejestruj się przez google+</button>
      	</div>
      <!-- Modal content-->

      		<!-- REGISTER -->
		<form class="container-fluid" action="modules\register.php" method="POST">
			<div class="form-group">
		    <label for="text">Imię i nazwisko</label>
		    <input type="text" class="form-control" name="name">
		  </div>
		  <div class="form-group">
		    <label for="text">Wybierz login</label>
		    <input type="text" class="form-control" name="login">
		  </div>
		  <div class="form-group">
			<label for="email">Email address:</label>
				    <input type="text" class="form-control" name="email">
				 	
		  </div>
		  <div class="form-group">
		    <label for="pwd">Hasło:</label>
		   	 <div class="input-group">
		   		 <input type="password" class="form-control" id="pwd" name="password">
		   		 <span class="input-group-addon show-password">
		   		 	<i class="glyphicon glyphicon-eye-open"></i>
		   		 </span>
		   	 </div>
		  </div>
		  		  <div class="form-group">
		    <label for="pwd">Powtórz hasło:</label>
		    		 <div class="input-group">
		   		 <input type="password" class="form-control" id="pwd" name="password-repeat">
		   		 <span class="input-group-addon show-password">
		   		 	<i class="glyphicon glyphicon-eye-open"></i>
		   		 </span>
		   	 </div>
		  </div>
		  <div class="checkbox">
		    <label><input type="checkbox" checked name="terms"> Akceptuje regulamin</label>
		  </div>
		 	 <div class="text-center">
		  		<button type="submit" class="btn btn-xl btn--green">Utwórz konto</button>
		  	</div>
		</form>
		 		<!-- REGISTER -->

		<!-- Modal content-->
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>
<!-- Modal -->



<!-- Modal -->
<div id="login" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content modal-md">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class=" text-center">LOGOWANIE</h5>
      </div>
      <div class="modal-body">
      	<div class="text-center register-social-wrapper">
      <button class="register-social facebook"><i class="icon-facebook"></i>Zaloguj się przez facebook</button>
      <button class="register-social google"><i class="icon-gplus-1"></i>&nbsp Zaloguj się przez google+</button>
      	</div>
      <!-- Modal content-->
		<form class="container-fluid" action="modules\login.php" method="POST">
		  <div class="form-group">
			<label for="login">Login lub email:</label>
				    <input type="text" class="form-control" id="login" name="login">
				 	
		  </div>
		  <div class="form-group">
		    <label for="pwd">Hasło:</label>
		   	 <div class="input-group">
		   		 <input type="password" class="form-control" id="pwd" name="password">
		   		 <span class="input-group-addon show-password">
		   		 	<i class="glyphicon glyphicon-eye-open"></i>
		   		 </span>
		   	 </div>
		  </div>

		  <div class="checkbox">
		    <label><input type="checkbox" checked> Zapamiętaj mnie</label>
		  </div>
		 	 <div class="text-center">
		  		<button type="submit" class="btn btn-xl btn--green">ZALOGUJ</button>
		  	</div>
		</form>
		<!-- Modal content-->
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>
<!-- Modal -->











<script src="js/main.js"></script>
</body>
</html>