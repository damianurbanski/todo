<?php 
require '../modules/session.php';
require '../modules/user.php';
$today_tasks = $user->get_tasks($_GET['pid']);

?>
<div class="container-fluid">
<?php if(!empty($today_tasks)){ ?>
<h4 class="grey text-center">Masz parę rzeczy do zrobienia! :)</h4>
<?php } else{ ?>
<h4 class="grey text-center">Nie masz żadnych zadań do wykonania, dodaj kilka! :)</h4>
		      	<button class="btn btn-green"  data-toggle="modal" data-target="#quick-add">Dodaj zadanie</button>
		</div>
<?php } ?>
		<div class="tasks-wrapper">

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

		</div>

</div>