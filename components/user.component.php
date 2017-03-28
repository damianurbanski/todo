<?php 

	class User{
		private $login;
		private $email;
		private $name;
		private $id;

		public function __construct ( $login, $email , $name) {
			$this->login = $login;
   			$this->email = $email;
   			$this->name = $name;
		}

		public function getTasks($project = false){
			if($project) $query= 'SELECT * FROM tasks WHERE user_id = :id AND project_id = :project_id';
			else $query = $query= 'SELECT * FROM tasks WHERE user_id = :id';
			require(__DIR__."\..\config\dbconnect.php");
			$stmt = $pdo->prepare($query);
			$stmt->bindParam(":id",$this->getId());
			$stmt->execute();
			var_dump($stmt->fetch(PDO::FETCH_ASSOC));
			$stmt->close_cursor();
			
			
		}

		public function getId(){
			require(__DIR__."\..\config\dbconnect.php");
			$query= 'SELECT id FROM users WHERE (login = :login OR email = :email)';
			$stmt = $pdo->prepare($query);
			$stmt->bindParam(":login",$this->login);
			$stmt->bindParam(":email",$this->email);
			$stmt->execute();
			return $stmt->fetch()["id"];
			$stmt->close_cursor();
		}


}
