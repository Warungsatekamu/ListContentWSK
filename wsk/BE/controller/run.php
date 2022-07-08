<?php
	foreach(glob("../model/*.php") as $filename){
		include $filename;
	}
	
	class run{
		public function getUser($username){
			$this->user = new User();
			
			$this->user->ShowUser($username);
		}
	}
	$var = new run();
	$var->getUser($_POST['username']);
	
	//CONTROLLER UNTUK MENDEFINE CLASS MELAKUKAN RUN UNTUK CLASS LAIN
?>