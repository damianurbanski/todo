<?php 
require $_SERVER["DOCUMENT_ROOT"].'/modules/session.php';
require $_SERVER["DOCUMENT_ROOT"].'/modules/user.php';
$today_tasks = $user->get_tasks();

?>
<div class="container-fluid">
<?php if($user->get_tasks()){ ?>
<h4 class="grey text-center">Cześć <?=$user->get('name');?> !  Masz parę rzeczy do zrobienia! :)</h4>
<?php } else{ ?>
<h4 class="grey text-center">Nie masz żadnych zadań do wykonania, dodaj kilka! :)</h4>
		      	<button class="btn btn-green"  data-toggle="modal" data-target="#quick-add">Dodaj zadanie</button>
		</div>
<?php } ?>

		<div class="tasks-wrapper">
				<ul class="tasks">
			<ul class="tasks">
					<?php 
					foreach ($today_tasks as $row):?>
		    	<li>
		        <span class="tasks-icon-done" data-id="<?=$row['id']?>"></span>
		        <span class="glyphicon glyphicon-flag priority-<?=$row['label_id']?>"></span>	
		        <a href="#"><?=$row['title'];?></a>
		        <span class="tasks-project"></span>
		      	</li>

		      <?php ENDFOREACH;?>

		    </ul>
</div>