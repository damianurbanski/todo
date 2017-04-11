<?php 
require '../modules/session.php';
require '../modules/user.php';
$overdue_tasks = $user->get_overdue_tasks();
?>
<div class="container-fluid">
	<h4 class="grey text-center">Zaległe zadania</h4>
	<?php if(!empty($overdue_tasks)){ ?>
<?php } else{ ?>
<h5 class="grey text-center">Nie masz żandych zaległych zadań!</h5>
		      	<button class="btn btn-green"  data-toggle="modal" data-target="#quick-add">Dodaj zadanie</button>
		</div>
<?php } ?>
		<div class="tasks-wrapper">

			<ul class="tasks">
					<?php 
					foreach ($overdue_tasks as $row):?>
		    	<li>
		        <span class="tasks-icon-done" data-id="<?=$row['id']?>"></span>
		        <span class="glyphicon glyphicon-flag priority-<?=$row['label_id']?>"></span>	
		        <a href="#"><?=$row['title'];?></a>
		        <span class="tasks-project"></span>
		      	</li>

		      <?php ENDFOREACH;?>

		</div>
</div>