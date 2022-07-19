<?php
  include('navbar.php');
  require_once('../../configuration/db_connection.php');
  require_once('../../model/database.php');
  include('../../model/contact.php');
  include('../../model/user.php');

  $connection = new Database($host,$user,$pass,$dbName);
  $users = new User($connection);
?>

<!DOCTYPE html>
    <html lang="en">
    <body class="jumbotron">
        <!-- form user data -->
        <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
        <h2 class="mb-4">Add New Admin</h2>

        <!-- username -->
        <div class="mx-auto mb-3" style="width: 800px">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" required/>
        </div>

        <!-- name -->
        <div class="mx-auto mb-3" style="width: 800px">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" required/>
        </div>

        <!-- pass and conf -->
        <div class="mx-auto mb-3" style="width: 800px">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" class="form-control" id="password" required/>
            <button onclick="randomPasswordPopup()">Generate Password</button>
        </div>
        <?php
            
        ?>
        <!-- level (dropdown)-->
        

        <input type="submit" name="submitNewAdmin" class="btn btn-primary">

    </body>
    <?php
        if(@$_POST['submitNewAdmin']){ //if button triggered
            $username=$connection->con->real_escape_string($_POST['username']);
            $nama=$connection->con->real_escape_string($_POST['nama']);
            $password=$connection->con->real_escape_string($_POST['password']);

            //insert to db 
            $users->InsertNewUser($username, $nama, $password);
        }
    ?>
    <script>
        function randomPasswordPopup() {
            var randomPass = "<?php echo $users->randomPassword()?>" ;
            if (confirm("don't forget to copy generated password: " + randomPass)) {
                document.getElementById('password').value = randomPass;
            }
        }
    </script>