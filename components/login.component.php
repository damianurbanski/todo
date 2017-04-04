<?php 

	class Login{
		private $login;
		private $password; // password is hashed on start
		private $id;

		// Here we have $login, it can be e-mail / login
		public function __construct ($login, $password) {
			$this->login = $login;
   			$this->password = md5($password);
   			$this->init();
		}

		// Return true when login is in database
		public function init(){
			require("../config/dbconnect.php");
			if(filter_var($this->login, FILTER_VALIDATE_EMAIL)) 
			$query = 'SELECT * FROM users WHERE email = :login AND password = :password';
			else $query = 'SELECT id FROM users WHERE login = :login AND password = :password';
			

			$stmt = $pdo->prepare($query);
			$stmt->bindParam(":login",$this->login);
			$stmt->bindParam(":password",$this->password);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		}

}



