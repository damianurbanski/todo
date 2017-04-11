<?php 
	session_start();
if(!isset($_SESSION['uid'])){
 	header('location: index.php?error=not_logged');
 }
require $_SERVER["DOCUMENT_ROOT"] . '/modules/user.php';

switch ($_GET['sync']){
	case 'fast':
		echo $user->count_fast_tasks();
	break;
	case 'today':
		echo $user->count_today_tasks();
	break;
	case 'overdue':
		echo $user->count_overdue_tasks();
	break;
	case 'project-list':
	$projects = $user->get_projects();

						foreach ($projects as $row):
							echo'<li><a href="project?pid='.$row['id'].'" class="ajax-load">
							<span class="profile-color"></span>
							'.$row['name'].'
							</a>
							<button class="icon-dot-3 menu-dotted"></button>
							<div class="submenu">
								<button><i class="icon-pencil"></i></button>
								<button><i class="icon-trash-empty"></i></button>
								<button><i class="icon-brush"></i></button>
								<button><i class="glyphicon glyphicon-flag"></i></button>
							</div>
						</li>';
						ENDFOREACH;
						break;
			case 'project-list-names-only':
			$p_names = $user->get_projects();
			foreach ($p_names as $row):
				echo '<option value="'.$row['id'].'">'.$row['name'].' </option>';
				ENDFOREACH;
		break;
	}