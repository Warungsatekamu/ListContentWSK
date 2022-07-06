<?php
	session_start();
	if(isset($_COOKIE['login'])){
		$_SESSION['login'] = $_COOKIE['login'];
	}
	if(isset($_SESSION['login'])){
		header('Location: ../home/contribution_list.php');
	}else{
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

        <!-- My CSS -->
        <link rel="stylesheet" href="style.css" />

        <title>YMIDB</title>
    </head>
    <body style="padding: 5rem 0;;">
            <div class="text-center mt-5">
                <form style="max-width:480px; margin: auto;">
                    <h1 class=>Login Page</h1>
                    <label for="username" class="sr-only"></label>
                    <input type="text" id="username" class="form-control" placeholder="Username" required autofocus />
                    <label for="password" class="sr-only"></label>
                    <input type="password" id="password" placeholder="Password" class="form-control" />
                    <div class="checkbox">
                        <label> <input type="checkbox" value="remember-me" /> Remember me </label>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-lg btn-primary btn-block">Login</button>
                    </div>
                </form>
            </div>
        </body>
</html>
<?php 
    }   
?>