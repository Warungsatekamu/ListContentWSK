<?php
	foreach(glob("../model/*.php") as $filename){
		include $filename;
	}
	
	class run{
		public function getUser($username, $password){
			$this->user = new User();
			
			$this->user->ShowUser($username, $password);
		}
	}
	$var = new run();
	$var->getUser($_POST['username'] , md5($_POST['password']));
	
	//CONTROLLER UNTUK MENDEFINE CLASS MELAKUKAN RUN UNTUK CLASS LAIN
?>