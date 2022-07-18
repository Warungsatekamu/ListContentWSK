<?php
	
	class run{
		public function GetUser($username, $password){
			require("../configuration/db_connection.php");
			require("../model/user.php");
			require("../model/database.php");
			$connection = new Database($host,$user,$pass,$dbName);
			$users = new User($connection);
			
			$users->AuthenticationUser($username, $password);
		}
	}

	$var = new run();
	$var->GetUser($_POST['username'] , $_POST['password']);
	
	//CONTROLLER UNTUK MENDEFINE CLASS MELAKUKAN RUN UNTUK CLASS LAIN
?>