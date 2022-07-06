<?php
	if(isset($_POST['login'])){
		include('../../BE/model/database.php');
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		
		$sql = "SELECT * FROM user";
		$result = mysqli_query($con, $sql);
		$final = false;
		while(($row = mysqli_fetch_row($result)) and (!$final)){
			if(($username == $row[1]) and ($password == $row[3])){
				$final = true;
				$_SESSION['login'] = true;
				$_SESSION['id'] = $row[0];
				$_SESSION['username'] = $row[1];
				$_SESSION['nama'] = $row[2];
				$level = $row[4];
				setcookie('login', 'true', time()+3600);
				if(isset($_POST['remember'])){
					setcookie('id', $row[0], time()+3600);
					setcookie('username', $row[1], time()+3600);
				}
			}
		}
		if($final){
			if($username = $row[1] and $password = $row[3]){
				echo "<script>alert('Welcome User " . $_SESSION['nama'] . "!');document.location = '../home/contribution_list.php';</script>";
			}else{
				echo "<script>alert('Invalid Username or Password');document.location = 'javascript:history.back(0);'</script>";
            }
	}
?>