<?php 
require '../modules/session.php';
require '../modules/user.php';

?>
<div class="container-fluid">
	<h4 class="grey text-center">Szybkie zadania</h4>
		<div class="tasks-wrapper">

			<ul class="tasks">

					<?php 
					$today_tasks = $user->get_fast_tasks();
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