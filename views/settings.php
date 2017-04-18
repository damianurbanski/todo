<?php 
require '../config/config.php';
require '../modules/user.php';
?>

<div class="container-fluid">
	
<form action="modules/updatesettings.php" method="POST">
  <div class="form-group">
    <label for="email">Imię i nazwisko:</label>
    <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$user->get('name')?>" required>
  </div>

    <div class="form-group">
    <label for="email">Login:</label>
    <input type="text" class="form-control" id="login" name="login" value="<?=$user->get('login')?>" required>
  </div>


    <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control" id="email" name="email" value="<?=$user->get('email')?>" required>
  </div>

  <div class="form-group">
    <label for="pwd">Nowe hasło:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>

    <div class="form-group">
    <label for="pwd">Powtórz nowe hasło:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>
  <button type="submit" class="btn btn-success">Zapisz</button>
  <a href="dashborad" class="btn btn-danger ajax-load" style="color:white">Anuluj</a>
</form>
</div>