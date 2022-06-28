<?php
  include('navbar.php');
  session_start();

  require_once('../../BE/configuration/db_connection.php');
  require_once('../../BE/model/database.php');
  include('../../BE/model/contact.php');
  include('../../BE/model/city.php');


  $connection = new Database($host,$user,$pass,$dbName);
  $contacts = new Contact($connection);
  $citydb = new City($connection);
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
        <input type="text" name="nickname" class="form-control" id="nickname"/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" class="form-select" name="gender">
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="bio" class="form-label">Biodata</label>
        <textarea class="form-control" name="bio" id="bio" rows="3"></textarea>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="birthdate" class="form-label">Birthdate</label>
        <input type="date" name="birthdate" class="form-control" id="birthdate"/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="phone" class="form-label">Phone</label>
        <input type="number" name="phone" class="form-control" id="phone" />
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="address"/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">City</label>
          <select id="disabledSelect" name="city" class="form-select">
            <?php
              $show = $citydb->ShowAllCityName();
              while($data = $show->fetch_object()){
            ?>
            <option><?php echo $data->city_name ?></option>
            <?php
              }
            ?>
          </select>
          <a type="button" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New City
          </a> 
          
        </div>
      </div>

      <input type="submit" name="submitNewContact" class="btn btn-primary">
    </form>

    <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
      <!-- modal add new city -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New City</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mx-auto mb-3" style="width: 460px">
                  <label for="cityName" class="form-label">City Name</label>
                  <input type="text" name="cityName" class="form-control" id="cityName" />
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="province" class="form-label">Province</label>
                <input type="text" name="province" class="form-control" id="province" />
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="submitNewCity" class="btn btn-primary"></input>
            </div>
          </div>
        </div>
      </div>
    </form>

    <?php
      //get data from form
      if(@$_POST['submitNewContact']){ //if button triggered
        $full_name=$connection->con->real_escape_string($_POST['fullName']);
        $nick_name=$connection->con->real_escape_string($_POST['nickname']);
        $gender=$connection->con->real_escape_string($_POST['gender']);
        if ($gender == "Female"){
          $gender = "F";
        } else {
          $gender = "M";
        }
        $email=$connection->con->real_escape_string($_POST['email']);
        $bio=$connection->con->real_escape_string($_POST['bio']);
        $birthdate=$connection->con->real_escape_string($_POST['birthdate']);
        $phone=$connection->con->real_escape_string($_POST['phone']);
        $address=$connection->con->real_escape_string($_POST['address']);
        $city = $connection->con->real_escape_string($_POST['city']);
        $cityid = $citydb->selectCityId($city);
        $city = $cityid['id'];

        //insert to db 
        $contacts->InsertNewContact($full_name, $nick_name, $gender, $email, $bio, $birthdate, $phone, $address, $city);
        echo '<meta content="0, url=contact_list.php" http-equiv="refresh">';
        
      } else if(@$_POST['submitNewCity']){
        $cityName = $connection->con->real_escape_string($_POST['cityName']);
        $province = $connection->con->real_escape_string($_POST['province']);

        $sameData=0;
        $show = $citydb->ShowAllCityName();
        while($data = $show->fetch_object()){
          //print $data->city_name; 
          if ($cityName == $data->city_name){
            $sameData = 1;
          }
        }

        switch ($sameData) {
          case "1":
            echo "<script>alert('Kota yang anda masukkan sudah ada dalam list')</script>";
            $sameData=0;
            echo '<meta content="0" http-equiv="refresh">';
            break;
          case "0":
            $citydb->InsertNewCity($cityName, $province);
            echo '<meta content="0" http-equiv="refresh">';
            break;
        }
      }

    ?>
  </body>

</html>