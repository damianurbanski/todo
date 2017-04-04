<?php 

	class User{
		private $pdo;
		private $login;
		private $email;
		private $name;
		private $id;
		private $points;
		private $theme_id;
		private $lang_id;

		public function __construct($id){
			require(__DIR__."\..\config\dbconnect.php");
			$this->pdo = $pdo;

			$query= 'SELECT * FROM users WHERE id = :id';

			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->id = $result['id'];
			$this->login = $result['login'];
			$this->name = $result['name'];
			$this->theme_id = $result['theme_id'];
			$this->points = $result['points'];
			$this->lang_id = $result['lang_id'];


		}

		public function get($data){
			return $this->$data;
		}

		public function get_tasks($project = false){
			if($project) $query= 'SELECT * FROM tasks WHERE user_id = :id AND project_id = :project_id';
			else $query = $query= 'SELECT * FROM tasks WHERE user_id = :id';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close_cursor();
			
		}
		public function get_tasks_by_date($date = false){
			if(!$date) $date = date("Y-m-d");
			$query= 'SELECT * FROM tasks
			JOIN projects
			WHERE project_id = projects.id
			AND tasks.user_id = :id
			AND deadline = :date
			';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$this->id);
			$stmt->bindParam(":date",$date);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close_cursor();
			
		}
			
		public function get_overdued_tasks($project = false){
			$query= 'SELECT * FROM tasks 
			JOIN projects
			WHERE project_id = projects.id
			AND tasks.user_id = :id
			AND tasks.deadline < CURDATE()';

			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close_cursor();
			
		}

		public function get_projects(){
			$query = $query= 'SELECT * FROM projects WHERE user_id = :id';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close_cursor();
		}
		public function count_fast_tasks(){
			$query = $query= 'SELECT COUNT(*) FROM tasks WHERE (user_id = :id AND project_id = 1)';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt->fetchColumn();
		}
		public function count_today_tasks(){
			$query = $query= 'SELECT COUNT(*) FROM tasks WHERE (user_id = :id AND deadline = CURDATE())';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt->fetchColumn();
		}
		public function count_week_tasks(){
			$query = $query= 'SELECT COUNT(*) FROM tasks WHERE (user_id = :id AND deadline > DATE_SUB(NOW(), INTERVAL 1 WEEK))';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt->fetchColumn();
		}


}

// $u = new User(1);
// var_dump($u->get_overdued_tasks());

