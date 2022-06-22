<?php
  include('navbar.php');
  require_once('../../BE/configuration/db_connection.php');
  require_once('../../BE/model/database.php');
  include('../../BE/model/contact.php');

  $connection = new Database($host,$user,$pass,$dbName);
  $contacts = new Contact($connection);
?>

<!DOCTYPE html>
<html lang="en">


  <body class="jumbotron">
    <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
      <h2 class="mb-4">Add New Contact</h2>

      <div class="mx-auto mb-3" style="width: 800px">
        <label for="fullName" class="form-label">Full Name</label>
        <input type="text" name="fullName" class="form-control" id="fullName" required/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="nickname" class="form-label">Nickname</label>
        <input type="text" name="nickname" class="form-control" id="nickname" required/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" class="form-select">
          <option>M</option>
          <option>F</option>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="bio" class="form-label">Biodata</label>
        <textarea class="form-control" name="bio" id="bio" rows="3"></textarea>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="birthdate" class="form-label">Birthdate</label>
        <input type="date" class="form-control" id="birthdate" required/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="phoneNum" class="form-label">Phone</label>
        <input type="text" name="phoneNum" class="form-control" id="phoneNum" />
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="" class="form-control" id="address" required/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="city" class="form-label">City</label>
        <input type="text" name="name" class="form-control" id="city" />
        <a href="#">Add New City</a>
      </div>
      
      <input type="submit" name="submit" class="btn btn-primary">
    </form>

    <?php
      if(@$_POST['submit']){
        $full_name=$connection->con->real_escape_string($_POST['fullName']);
        $nick_name=$connection->con->real_escape_string($_POST['nickname']);
        $gender=$connection->con->real_escape_string($_POST['gender']);
        $email=$connection->con->real_escape_string($_POST['email']);
        $bio=$connection->con->real_escape_string($_POST['bio']);
        $birthdate=$connection->con->real_escape_string($_POST['birthdate']);
        $phone=$connection->con->real_escape_string($_POST['phone']);
        $address=$connection->con->real_escape_string($_POST['address']);
        $city=$connection->con->real_escape_string($_POST['city']);
      }
    ?>
  </body>

</html>