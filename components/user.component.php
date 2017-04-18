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
			require($_SERVER["DOCUMENT_ROOT"]."\config\dbconnect.php");
			$this->pdo = $pdo;

			$query= 'SELECT * FROM users WHERE id = :id';

			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->id = $result['id'];
			$this->login = $result['login'];
			$this->email = $result['email'];
			$this->name = $result['name'];
			$this->theme_id = $result['theme_id'];
			$this->points = $result['points'];
			$this->lang_id = $result['lang_id'];
		}

		public function get($data){
			return $this->$data;
		}

		public function get_tasks($project = false){
			if($project) {
				$query= 'SELECT * FROM tasks WHERE user_id = :id AND project_id = :project_id';
				$stmt = $this->pdo->prepare($query);
				$stmt->bindParam(":id",$this->id);
				$stmt->bindParam(":project_id",$project);
			}
			else {
				$query = $query= 'SELECT * FROM tasks WHERE user_id = :id';
				$stmt = $this->pdo->prepare($query);
				$stmt->bindParam(":id",$this->id);
				
			}
			
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close_cursor();
			
		}
		public function get_tasks_by_date($date = false){
			if(!$date) $date = date("Y-m-d");
			$query= 'SELECT * FROM tasks
			WHERE tasks.user_id = :id
			AND tasks.deadline = :deadline
			';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$this->id);
			$stmt->bindParam(":deadline",$date,PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close_cursor();
			//NIE DZIAŁA
		}
			
		public function get_overdue_tasks(){
			$query = '
					SELECT * FROM tasks WHERE
					tasks.user_id = :id
					AND tasks.deadline < CURDATE()
			';

			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close_cursor();
			
		}
		public function get_fast_tasks(){
			$query = '
					SELECT * FROM tasks WHERE
					tasks.user_id = :id
					AND tasks.project_id =1
			';

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

		public function get_points(){
			$query = $query= 'SELECT points FROM users WHERE id = :id';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result[0]['points'];
			$stmt->close_cursor();
		}

		//COUNT TASKS
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
		public function count_overdue_tasks(){
			$query = $query= 'SELECT COUNT(*) FROM tasks WHERE (user_id = :id AND deadline < CURDATE())';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":id",$this->id);
			$stmt->execute();
			return $stmt->fetchColumn();
		}



		public function add_task($name,$project_id, $priority, $deadline){
			$query = $query= 'INSERT INTO tasks (title, user_id, project_id, deadline, label_id, done) 
			VALUES (:name, :uid, :pid, :deadline, :lid, 0)';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":name",$name);
			$stmt->bindParam(":uid",$this->id);
			$stmt->bindParam(":pid",$project_id);
			$stmt->bindParam(":deadline",$deadline);
			$stmt->bindParam(":lid",$priority);
			return $stmt->execute();
		}
		public function add_project($name){
			$query = $query= 'INSERT INTO projects (name, user_id, color_id) 
			VALUES ( :name, :uid, 1)';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":name",$name);
			$stmt->bindParam(":uid",$this->id);
			return $stmt->execute();
		}

		private function update_points($p){
			$query = $query= 'UPDATE users SET points = points+:p WHERE id = :uid';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":p",$p);
			$stmt->bindParam(":uid",$this->id);
			return $stmt->execute();
			$stmt->close_cursor();
		}




		public function remove_task($taskid){
			$query2 = $query= 'DELETE FROM tasks WHERE id = :tid AND user_id = :uid';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":tid",$taskid);
			$stmt->bindParam(":uid",$this->id);
			$this->update_points(10);
			return $stmt->execute();
			$stmt->close_cursor();
		}

		public function delete_project($pid){
			$query = $query= 'DELETE FROM projects WHERE id = :pid AND user_id = :uid';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":pid",$pid);
			$stmt->bindParam(":uid",$this->id);
			return $stmt->execute();
			$stmt->close_cursor();
		}

		public function update($l, $p, $n, $e){
			$query = 'UPDATE users SET 
			login = :login,
			name = :name,
			password = :password,
			email = :email
			WHERE id =:uid';
			$stmt = $this->pdo->prepare($query);
			$stmt->bindParam(":login",$l);
			$stmt->bindParam(":name",$n);
			$stmt->bindParam(":password",$p);
			$stmt->bindParam(":email",$e);
			$stmt->bindParam(":uid",$this->id);
			return $stmt->execute();
			$stmt->close_cursor();
		}



}

