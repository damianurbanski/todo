<?php
require '\config\config.php';
require '\modules\session.php';
require '\modules\user.php';
$projects = $user->get_projects();


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
    <div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    <span class="glyphicon glyphicon-option-vertical"></span>
    </button>
    <button type="button" class="navbar-toggle sidebar" id="sidebar-toggle">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

 <a class="navbar-brand ajax-load" rel="home" href="dashboard">
        <img style="max-width: 38px;margin-top: -10px;margin-left: 10px;"
             src="/img/logo.png">
             
    </a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li>
        <a href="dashboard">
        <li><a href="modules/logout.php">Wyloguj <span class="glyphicon glyphicon-share"></span></a></li>
        </a></li>
      </ul>
  </div>
  </div>
</nav>


<div class="container page-wrapper">
    <div class="row profile">
		<div class="col-md-3 padding-0">
			<div class="profile-sidebar" id="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<button class="icon-cancel hidden-lg"></button>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<h4><?=$user->get('name');?>
						<a href="settings" class="ajax-load"><i class="icon-cog"></i></a>
						</h4>
						
					</div>
					<div class="profile-usertitle-points">
					 PUNKTY: <span class="ajax-sync-points"><?=$user->get('points');?></span>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
				<!-- <a href="fast" class="btn today ajax-load">
				<i class="icon-calendar-check-o"></i>
				Szybkie
				<i class="count ajax-sync-fast"><?=$user->count_fast_tasks()?></i>
				</a> -->
				<a href="today" class="btn ajax-load"><i class="icon-calendar-minus-o"></i>Dzisiaj 
				<i class="count ajax-sync-today"><?=$user->count_today_tasks()?></i>
				</a>

				<a href="overdue" class="btn ajax-load"><i class="icon-calendar-times-o"></i>Zaległe 
				<i class="count ajax-sync-overdue"><?=$user->count_overdue_tasks()?></i>
				</a>



				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<span class="profile-list-title">
					Projekty 
					<button  class="add-project" data-toggle="modal" data-target="#add-project-modal">Dodaj projekt</button>
					</span>
					<ul class="nav ajax-sync-projects-list">

					<?php 

						foreach ($projects as $row):

					?>
						<li>
							<a href="project?pid=<?=$row['id']?>" class="ajax-load">
							<span class="profile-color"></span>
							<?=$row['name'];?>
							</a>

							<button class="icon-dot-3 menu-dotted"></button>
							<div class="submenu">
								<button><i class="icon-pencil"></i></button>
								<button><i class="icon-trash-empty ajax-delete-project" data-id="<?=$row['id']?>"></i></button>
								<button><i class="icon-brush"></i></button>
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
            <div id="content" class="content ajax-sync-view">

            </div>
       <!-- VIEW CONTAINER -->
		</div>
	</div>
</div>

<button id="quick-add-task" class="quick-add-task" title="Dodaj zadanie" data-toggle="modal" data-target="#quick-add">
 <span>+</span>
</button>

<!-- Modal -->
<div id="quick-add" class="modal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content modal-md">
      <div class="modal-body">
      <!-- Modal content-->
	<div class="add-task-input-wrapper">
	 <h5 class=" text-center">Dodaj zadanie</h5>
		      		<form class="ajax-add-task" action="modules/add-task">
						<input type="text" name="name" placeholder="What do you want to do? Hmmm?">

						<span class="btn-icon col-sm-12 col-xs-12 col-lg-3">
						<span class="glyphicon glyphicon-th-list"></span>
								<select placeholder="project" name="project-id" class="ajax-sync-project-options">
									<?php $projects = $user->get_projects();
									 foreach ($projects as $row):
									?>

								    <option value="<?=$row['id'];?>"> <?=$row['name']?> </option>

								    <?php ENDFOREACH; ?>
								</select>
							</span>
							<button type="button" class="btn-icon">
							<input type="text" class="hidden" name="priority" value="0" submenu-val-holder>
							<span class="glyphicon glyphicon-flag priority-1  submenu-toggle"  submenu-toggle-button submenu-target="#priority-picker"></span>
							</button>

							<span class="btn-icon">
							<span class="glyphicon glyphicon-calendar"></span>
							<input type="date" value="<?=date('Y-m-d'); ?>"  name="date"></input>
							</span>
						<br>
						<button class="btn btn-green ajax-submit" type="submit">Zapisz</button>
						<button class="btn btn-red" data-dismiss="modal">Anuluj</button>
						<span class="ajax-add-task-state">
						<span class="loader"></span>
						<span class="succes">Dodano zadanie.</span>
						<span class="error">Wystąpił błąd.</span>
						</span>
					</form>
		      	</div>
		      	<!-- ADD TASK MODULE -->
		   		      	<!-- ADD TASK BUTTON MODULE -->
		      	<!-- ADD TASK BUTTON MODULE -->
		</div>
		<!-- Modal content-->
      </div>

    </div>
  </div>
</div>
<!-- Modal -->


<!-- Modal -->
<div id="add-project-modal" class="modal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content modal-md">
      <div class="modal-body">
      <!-- Modal content-->
	<div class="add-task-input-wrapper">
	 <h5>Dodaj projekt</h5>
		      		<form class="ajax-add-project" action="modules/add-project">
						<input type="text" name="name" placeholder="Nazwa projektu">
						<button class="btn btn-green ajax-submit" type="submit">Zapisz</button>
						<button class="btn btn-red" data-dismiss="modal">Anuluj</button>

					</form>
		      	</div>
		      	<!-- ADD TASK MODULE -->
		   		      	<!-- ADD TASK BUTTON MODULE -->
		      	<!-- ADD TASK BUTTON MODULE -->
		</div>
		<!-- Modal content-->
      </div>

    </div>
  </div>
</div>
<!-- Modal -->












<div class="submenu-absolute priority-picker" id="priority-picker">
	<h6 class="grey">Priorytet</h6>
	<span class="glyphicon glyphicon-flag priority-5" submenu-value="5"></span>
	<span class="glyphicon glyphicon-flag priority-4" submenu-value="4"></span>
	<span class="glyphicon glyphicon-flag priority-3" submenu-value="3"></span>
	<span class="glyphicon glyphicon-flag priority-2" submenu-value="2"></span>
	<span class="glyphicon glyphicon-flag priority-1" submenu-value="1"></span>
</div>


<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/jquery.alterclass.js"></script>
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sync.js"></script>
<script src="js/main.js"></script>
<script src="js/add-task.js"></script>
<script src="js/add-project.js"></script>
<script src="js/done-task.js"></script>
<script src="js/delete-project.js"></script>
<script type="text/javascript">
$("#content").load("views/dashboard");

	$(document).on('tap click', '.ajax-load', function(e){
		e.preventDefault();
		$("#content").load("views/"+$(this).attr('href'));
		history.replaceState(null, null, 'app-'+$(this).attr('href'));
	});
</script>
</body>
</html>