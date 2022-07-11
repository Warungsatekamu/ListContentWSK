<?php
    class User{
        private $mysqli;
		private $id;
		private $username;
		private $name;
		private $password;
		private $level;
        
        
        //get contact data for contact list
        public function ShowUser($username, $password){
            $db = new mysqli("localhost", "root", "", "db_wsk");
            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$query = $db->query($sql) or die($db->error);
			$cek = false;
			while($row = mysqli_fetch_array($query)){
				$cek = true;
				$this->id = $row['id'];
				$this->username = $row['username'];
				$this->name = $row['nama'];
				$this->password = $row['password'];
				$this->level = $row['level'];
			}
			if($cek){
				session_start();
				$_SESSION['name'] = $this->name;
				echo "<script>alert('Login Success!');document.location = '../view/home/contribution_list.php?';</script>";
			}else{
				echo "<script>alert('Wrong username / password');document.location = '../../login/login.php';</script>";
			}
        }
    }
	//TAMBAHAN VARIABLE (4-8), PERUBAHAN KODINGAN MENGAMBIL DATA DARI DATABASE (17-23), PENAMBAHAN LOGIKA IF UNTUK MELEMPAR KE NEXT PAGE (25-28)
?>