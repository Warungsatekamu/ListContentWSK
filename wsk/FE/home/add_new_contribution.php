<?php
  include('navbar.php');
  require_once('../../BE/configuration/db_connection.php');
  require_once('../../BE/model/database.php');
  include('../../BE/model/contact.php');
  include('../../BE/model/contribution.php');
  include('../../BE/model/city.php');

  $connection = new Database($host,$user,$pass,$dbName);
  $contacts = new Contact($connection);
  $contribution = new Contribution($connection);
  $citydb = new City($connection);
?>

<!DOCTYPE html>
<html lang="en">

  <body class="jumbotron">

    <!-- Form pengisian  -->
    <form class="mx-auto mb-3" style="width: 800px">
      <h2 class="mb-4">Add New Contribution</h2>

      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">Contributor</label>
        <select id="disabledSelect" class="form-select">
          <?php
            $showContactList = $contacts->ShowContact();
            while($dataContactList = $showContactList->fetch_object()){
          ?>
          <option><?php echo $dataContactList->full_name ?></option>
          <?php
            }
          ?>
        </select>
        
        <a type="button" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add New Contributor
        </a>
        
        <br><br>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" />
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">Type</label>
        <select id="disabledSelect" class="form-select">
          <?php
            $showContributionTypeLists = $contribution->ShowAllContributionType();
            while($dataContributionTypeLists = $showContributionTypeLists->fetch_object()){
          ?>
          <option><?php echo $dataContributionTypeLists->contribution_type_name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">Language</label>
        <select id="disabledSelect" class="form-select">
          <option>Language1</option>
          <option>Language1</option>
          <option>Language1</option>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="exampleFormControlInput1" class="form-label">Received Date</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" />
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">Received Type</label>
        <select id="disabledSelect" class="form-select">
          <?php
            $showReceivedType = $contribution->ShowAllReceiveType();
            while($dataReceivedType = $showReceivedType->fetch_object()){
          ?>
          <option><?php echo $dataReceivedType->channel_name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">Contribution Source Type</label>
        <select id="disabledSelect" class="form-select">
          <?php
            $showSourceType = $contribution->ShowAllContributionSourceType();
            while($dataSourceType = $showSourceType->fetch_object()){
          ?>
          <option><?php echo $dataSourceType->contribution_source_type_name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">Contribution Status</label>
        <select id="disabledSelect" class="form-select">
          <?php
            $showContributionStatus = $contribution->ShowAllContributionStatus();
            while($dataContributionStatus = $showContributionStatus->fetch_object()){
          ?>
          <option><?php echo $dataContributionStatus->contribution_status_name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="exampleFormControlInput1" class="form-label">Edit Link URL</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" />
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="exampleFormControlInput1" class="form-label">Published Link URL</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" />
      </div>
      <button type="submit" name="submitNewContribution" class="btn btn-primary">Submit</button>
    </form>
    
    <form class="mx-auto mb-3" style="width: 800px">
    <!-- model add contributor -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Contributor</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mx-auto mb-3" style="width: 460px">
                  <label for="fullname" class="form-label">Fullname</label>
                  <input type="text" name="fullname" class="form-control" id="fullname" />
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                  <label for="nickname" class="form-label">Nickname</label>
                  <input type="text" name="nickname" class="form-control" id="nickname" />
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                  <label for="gender" class="form-label">Gender</label>
                  <select id="gender" class="form-select" name="gender">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required/>
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="bio" class="form-label">Biodata</label>
                <textarea class="form-control" name="bio" id="bio" rows="3"></textarea>
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="city" class="form-label">City</label>
                <select id="city" class="form-select" name="city">
                  <!-- get all city name for list -->
                  <?php
                    $show = $citydb->ShowAllCityName();
                    while($data = $show->fetch_object()){
                  ?>
                      <option><?php echo $data->city_name ?></option>
                  <?php
                    }
                  ?>
                </select>
                <a type="button" href="" data-bs-toggle="modal" data-bs-target="#addNewCity">
                  Add New City
                </a> 
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" name="addNewContributor"class="btn btn-primary">Add New Contributor</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <form class="mx-auto mb-3" style="width: 800px">
      <!-- modal add new city -->
      <div class="modal fade" id="addNewCity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New City</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="cityName" class="form-label">City Name</label>
                <input type="text" name="cityName" class="form-control" id="cityName" required />
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="province" class="form-label">Province</label>
                <input type="text" name="province" class="form-control" id="province" required />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="submitNewCity" class="btn btn-primary">Add New City</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>

  <?php
      //get data from form
      if(@$_POST['submitNewContribution']){

        
      } else if(@$_POST['addNewContributor']){ //if button triggered
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

</html>
