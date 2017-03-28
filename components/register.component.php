<?php 

	class Register{
		private $login;
		private $email;
		private $password; // password is hashed on start
		private $name;
		public function __construct ( $login, $email , $name, $password) {
			$this->login = $login;
   			$this->password = md5($password);
   			$this->email = $email;
   			$this->name = $name;
		}
		// Return true when login is in database
		public function isExistLogin(){
			require __DIR__ . '\..\config\dbconnect.php';
			$query= 'SELECT COUNT(*) FROM users WHERE login = :login';
			$stmt = $pdo->prepare($query);
			$stmt->bindParam(":login",$this->login);
			$stmt->execute();
			return (bool) $stmt->fetchColumn();
			$stmt->close_cursor();
		}
		// Return true when email is in database
		public function isExistEmail(){
			require __DIR__ . '\..\config\dbconnect.php';
			$query= 'SELECT COUNT(*) FROM users WHERE email = :email';
			$stmt = $pdo->prepare($query);
			$stmt->bindParam(":email",$this->email);
			$stmt->execute();
			return (bool) $stmt->fetchColumn();
			$stmt->close_cursor();

		}

		// Chceck again email and login in database, and if user doesn't exist, insert new one
		// Return true if action was succesfull and false if not
		public function register(){
			require __DIR__ . '\..\config\dbconnect.php';
			$today = date("Y-m-d");

			 if(!$this->isExistLogin() && !$this->isExistEmail()){
					$query = 'INSERT INTO `users` (`id`, `login`, `name`, `password`, `email`, `registered`, `last_seen`, `theme_id`, `points`, `lang_id`) 
					VALUES (NULL, :login, :name, :password, :email, :registered, :last_seen, 1, 0, 1)';

					$stmt = $pdo->prepare($query);

					$stmt->bindParam(":login",$this->login);
					$stmt->bindParam(":name",$this->name);
					$stmt->bindParam(":password",$this->password);
					$stmt->bindParam(":email",$this->email);
					$stmt->bindParam(":registered",$today);
					$stmt->bindParam(":last_seen",$today);
					return (bool) $stmt->execute();
					$stmt->close_cursor();

			 }
			 else return false;


	 	}
}
