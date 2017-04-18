<?php 
  require 'user.php';
  if($_POST){
  $user->update($_POST['login'], md5($_POST['password']), $_POST['name'], $_POST['email']);
  var_dump($_POST);
  }
  //header('Location: ../app');
?>