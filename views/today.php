<?php 
require '../modules/session.php';
require '../modules/user.php';

?>
<div class="container-fluid">
	<h4 class="grey text-center">Cześć!  Masz parę rzeczy do zrobienia! :)</h4>
		<div class="tasks-wrapper">
			<h4 class="tasks-title red">Zaległe <span class="glyphicon glyphicon-fire"></span></h4>
				<ul class="tasks">

					<?php 
			$overdued_tasks = $user->get_overdued_tasks();
					foreach ($overdued_tasks as $row):?>
		      <li>
		        <span class="tasks-icon-done"></span>
		        <span class="glyphicon glyphicon-flag priority-<?=$row['label_id']?>"></span>	
		        <a href="#"><?=$row['title'];?></a>
		        <span class="tasks-project"><?=$row['name'];?></span>

		        <div class="tasks-config">
		        	<a href=""><i class="glyphicon glyphicon-pencil" title="edytuj"></i></a>
		        	<a href=""><i class="glyphicon glyphicon-calendar" title="zmień datę"></i></a>
		        	<a href=""><i class="glyphicon glyphicon-flag" title="priorytet"></i></a>
		        	<a href=""><i class="glyphicon glyphicon-trash" title="usuń"></i></a>

		        </div>
		      </li>

		      <?php ENDFOREACH;?>

		    </ul>
			<h4 class="tasks-title blue">Dzisiaj <span class="glyphicon glyphicon-calendar"></span></h4>

			<ul class="tasks">

					<?php 
					$today_tasks = $user->get_tasks_by_date();
					foreach ($today_tasks as $row):?>
		      <li>
		        <span class="tasks-icon-done"></span>
		        <span class="glyphicon glyphicon-flag priority-<?=$row['label_id']?>"></span>	
		        <a href="#"><?=$row['title'];?></a>
		        <span class="tasks-project"><?=$row['name'];?></span>

<!-- 		        <div class="tasks-config">
		        	<a href=""><i class="glyphicon glyphicon-pencil" title="edytuj"></i></a>
		        	<a href=""><i class="glyphicon glyphicon-calendar" title="zmień datę"></i></a>
		        	<a href=""><i class="glyphicon glyphicon-flag" title="priorytet"></i></a>
		        	<a href=""><i class="glyphicon glyphicon-trash" title="usuń"></i></a>

		        </div> -->
		      </li>

		      <?php ENDFOREACH;?>

		    </ul>
		      <!-- ADD TASK MODULE -->
		      	<div class="add-task-input-wrapper hidden">
		      		<form>
						<input type="text" name="" placeholder="What do you want to do? Hmmm?">
						<span class="btn-icon">
						<span class="glyphicon glyphicon-th-list"></span>
							<select placeholder="project">
								<option value="1">Szybkie</option>

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
						<input type="date" value="<?=date('Y-m-d'); ?>"></input>
						</span>

						<br>
						<button class="btn btn-green">Zapisz</button>
						<button class="btn btn-red hide-task-wrapper">Anuluj</button>
					</form>
		      	</div>
		      	<!-- ADD TASK MODULE -->


		   		      	<!-- ADD TASK BUTTON MODULE -->
		      	<button class="btn btn-green add-task-toggle show-task-wrapper">Dodaj zadanie</button>
		      	<!-- ADD TASK BUTTON MODULE -->
		</div>



  <script>
  $( function() {
    $( ".datepicker" ).datepicker( $.datepicker.regional[ "en" ] );
} );














  </script>

</div>