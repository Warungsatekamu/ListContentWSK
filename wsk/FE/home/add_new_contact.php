<?php
  include('navbar.php');
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
    <!-- form user data -->
    <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
      <h2 class="mb-4">Add New Contact</h2>

      <!-- fullname -->
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="fullName" class="form-label">Full Name</label>
        <input type="text" name="fullName" class="form-control" id="fullName" required/>
      </div>

      <!-- nickname -->
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="nickname" class="form-label">Nickname</label>
        <input type="text" name="nickname" class="form-control" id="nickname"/>
      </div>

      <!-- gender (dropdown)-->
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="gender" class="form-label">Gender</label>
        <select id="gender" class="form-select" name="gender">
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      <!-- email -->
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required/>
      </div>
      <!-- bio -->
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="bio" class="form-label">Biodata</label>
        <textarea class="form-control" name="bio" id="bio" rows="3"></textarea>
      </div>
      <!-- birthdate -->
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="birthdate" class="form-label">Birthdate</label>
        <input type="date" name="birthdate" class="form-control" id="birthdate"/>
      </div>
      <!-- phone -->
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="phone" class="form-label">Phone</label>
        <input type="number" name="phone" class="form-control" id="phone"/>
      </div>
      <!-- address -->
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="address"/>
      </div>
      <!-- city (data from database) -->
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">City</label>
          <select id="disabledSelect" name="city" class="form-select">
            <!-- get all city name for list -->
              <option></option>
            <?php
              $show = $citydb->ShowAllCityName();
              while($data = $show->fetch_object()){
            ?>
                <option><?php echo $data->city_name ?></option>
            <?php
              }
            ?>
          </select>
          <!-- button for add new city modal -->
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
              <!-- city name -->
              <div class="mx-auto mb-3" style="width: 460px">
                  <label for="cityName" class="form-label">City Name</label>
                  <input type="text" name="cityName" class="form-control" id="cityName" required/>
              </div>
              <!-- province name -->
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="province" class="form-label">Province</label>
                <input type="text" name="province" class="form-control" id="province" required/>
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
        //change content of gender because on db is just M or F
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

        //redirect to contact_list.php
        echo '<meta content="0, url=contact_list.php" http-equiv="refresh">';
        
      } else if(@$_POST['submitNewCity']){ //if button add new city triggered
        $cityName = $connection->con->real_escape_string($_POST['cityName']);
        $province = $connection->con->real_escape_string($_POST['province']);

        //check for same data in City
        $sameData=0;
        $show = $citydb->ShowAllCityName();
        while($data = $show->fetch_object()){
          if ($cityName == $data->city_name){ //if there is data with the same cityName, sameData = 1
            $sameData = 1;
          }
        }

        switch ($sameData) {
          case "1": //if there is same data
            echo "<script>alert('Kota yang anda masukkan sudah ada dalam list')</script>"; //give information to user there is same data
            $sameData=0; //reseting samedata value
            echo '<meta content="0" http-equiv="refresh">'; //refreshing the page
            break;
          case "0": // if there isn't same data
            $citydb->InsertNewCity($cityName, $province); //insert to db cities
            echo '<meta content="0" http-equiv="refresh">'; //refresh page
            break;
        }
      }

    ?>
  </body>

</html>