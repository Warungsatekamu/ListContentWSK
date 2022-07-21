<?php
    class User{
        private $mysqli;
		private $id;
		private $username;
		private $name;
		private $password;
		private $level;
        
        function __construct($con){
            $this->mysqli = $con;
        }
        
        //get contact data for contact list
        public function AuthenticationUser($username, $password){
            $sql = "SELECT * FROM users WHERE username = '$username'";
			$db = $this->mysqli->con;
			$query = $db->query($sql) or die($db->error);
			$cek = false;
			while($row = mysqli_fetch_array($query)){
				if(password_verify($password, $row['password'])){
					$cek = true;
					$this->password = $row['password'];
					$this->id = $row['id'];
					$this->username = $row['username'];
					$this->name = $row['name'];
					$this->level = $row['level'];
				}
			}
			if($cek){
				session_start();
				$_SESSION['login'] = true;
				$_SESSION['name'] = $this->name;
				$_SESSION['id'] = $this->id;
				$_SESSION['level'] = $this->level;

				echo '<meta content="0; url=../view/home/contribution_list.php" http-equiv="refresh">';;
			}else{
				echo "<script>alert('Wrong username / password');document.location = '../view/login/login.php?';</script>";
			}
        }

		public function InsertNewUser($username, $nama, $password){
			$passHash = password_hash($password, PASSWORD_DEFAULT) ;
            $db = $this->mysqli->con;
            $sql = "INSERT INTO users (username, name, password, level) VALUES ('$username', '$nama', '$passHash', '2')";
            $query = $db->query($sql) or die($db->error);
        }

		public function randomPassword() {
			$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789!@#$%^&*(),.<>/?;[]}{";
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 15; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			return implode($pass); //turn the array into a string
		}

		public function CheckTable(){
			$result = $this->ShowTable();
			$found = 0;
			while ($resultFetch = $result->fetch_object()){
				if($resultFetch->Tables_in_db_wsk == "users"){
					$found = 1;
				}
			}
			if($found == 0){
				$this->CreateInsertTableUsers();
			}
			
		}

		public function CreateInsertTableUsers(){
			$password = "admin";
			$pwHash = password_hash($password,PASSWORD_DEFAULT);
			$db = $this->mysqli->con;
			$sql = "CREATE TABLE db_wsk.users ( id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(255), name VARCHAR(255), password VARCHAR(255), level INT(1))";
			$query = $db->query($sql) or die($db->error);
			$sql2 = "INSERT INTO users (username, name, password, level) VALUES ('admin', 'admin' , '$pwHash', '1')";
			$query = $db->query($sql2) or die($db->error);
		}

		public function ShowTable(){
			$sql = "SHOW TABLES";
			$db = $this->mysqli->con;
			$query = $db->query($sql) or die($db->error);
			return $query;
		}
    }

	//TAMBAHAN VARIABLE (4-8), PERUBAHAN KODINGAN MENGAMBIL DATA DARI DATABASE (17-23), PENAMBAHAN LOGIKA IF UNTUK MELEMPAR KE NEXT PAGE (25-28)

?>