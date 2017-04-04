<?php
require '\modules\session.php';
require '\modules\user.php';


?>
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
    <nav class="navbar navbar-default navbar-xs navbar-fixed" role="navigation">
    <div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
 <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
        <img style="max-width:100px; margin-top: -7px;"
             src="/img/">
             <span class="icon-remove nav-toggle">XXX</span>
    </a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li>
        <a href="dashboard">
        <li><a href="register">Informacje</a></li>
        <li><a href="login">Logowanie</a></li>
        <li><a href="modules/logout.php">Logout</a></li>
        </a></li>
      </ul>
  </div>
  </div>
</nav>


<div class="container page-wrapper">
    <div class="row profile">
		<div class="col-md-3 padding-0" style="xdisplay:none">
			<div class="profile-sidebar xactive">
				<!-- SIDEBAR USERPIC -->
				<button class="icon-cancel hidden-lg"></button>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<h4><?=$user->get('name');?>
						<a href=""><i class="icon-cog"></i></a>
						</h4>
						
					</div>
					<div class="profile-usertitle-points">
					 PUNKTY:<?=$user->get('points');?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
				<button class="btn today">
				<i class="icon-calendar-check-o"></i>
				Szybkie
				<i class="count"><?=$user->count_fast_tasks()?></i>
				</button>
				<button class="btn "><i class="icon-calendar-minus-o"></i>Dzisiaj 
				<i class="count"><?=$user->count_today_tasks()?></i>
				</button>
				<button class="btn"><i class="icon-calendar-times-o"></i>Tydzień 
				<i class="count"><?=$user->count_week_tasks()?></i>
				</button>



				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<span class="profile-list-title">Projekty</span>
					<ul class="nav">

					<?php 
					$projects = $user->get_projects();

						foreach ($projects as $row):

					?>
						<li>
							<a href="#">
							<span class="profile-color"></span>
							<?=$row['name'];?>
							</a>

							<button class="icon-dot-3 menu-dotted"></button>
							<div class="submenu">
								<button><i class="icon-pencil"></i></button>
								<button><i class="icon-trash-empty"></i></button>
								<button><i class="icon-brush"></i></button>
								<button><i class="glyphicon glyphicon-flag"></i></button>
							</div>
						</li>

						<?php ENDFOREACH; ?>
						
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9 col-sm-12 col-xs-12 padding-0">
		<!-- VIEW CONTAINER -->

            <div id="content" class="content">

            </div>
       <!-- VIEW CONTAINER -->

		</div>
	</div>
</div>




<div class="submenu-absolute priority-picker" id="priority-picker">
	<h6 class="grey">Priorytet</h6>
	<span class="glyphicon glyphicon-flag priority-5" submenu-value="5"></span>
	<span class="glyphicon glyphicon-flag priority-4" submenu-value="4"></span>
	<span class="glyphicon glyphicon-flag priority-3" submenu-value="3"></span>
	<span class="glyphicon glyphicon-flag priority-2" submenu-value="2"></span>
	<span class="glyphicon glyphicon-flag priority-1" submenu-value="1"></span>
</div>


<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript">
	$("#content").load("views/today.php");
</script>
</body>
</html>