<?php
  include('navbar.php');
  require_once('../../configuration/db_connection.php');
  require_once('../../model/database.php');
  include('../../model/contact.php');
  include('../../model/user.php');


  
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
            <input type="text" name="nama" class="form-control" id="nama"/>
        </div>
        <!-- pass and conf -->
        <div class="mx-auto mb-3" style="width: 800px">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" class="form-control" id="password" value = "<?php echo randomPassword(); ?>" required/>
        </div>
        <?php
            function randomPassword() {
                $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
                $pass = array(); //remember to declare $pass as an array
                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                for ($i = 0; $i < 12; $i++) {
                    $n = rand(0, $alphaLength);
                    $pass[] = $alphabet[$n];
                }
                return implode($pass); //turn the array into a string
            }
        ?>
        <!-- level (dropdown)-->
        

        <input type="submit" name="submitNewAdmin" class="btn btn-primary">

    </body>

</html>