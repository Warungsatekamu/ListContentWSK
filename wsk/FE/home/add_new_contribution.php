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
    <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
      <h2 class="mb-4">Add New Contribution</h2>

      <div class="mx-auto mb-3" style="width: 800px">
        <label for="contributor" class="form-label">Contributor</label>
        <select id="contributor" name="contributor" class="form-select" required>
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
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" required/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="type" class="form-label">Type</label>
        <select id="type" name="type" class="form-select" required>
          <?php
            $showContributionTypeLists = $contribution->ShowAllContributionType();
            while($dataContributionTypeLists = $showContributionTypeLists->fetch_object()){
          ?>
          <option><?php echo $dataContributionTypeLists->contribution_type_name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" name="message" id="message" rows="3"></textarea>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="contentLink" class="form-label">Content Link URL</label>
        <input type="text" class="form-control" name="contentLink" id="contentLink" />
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="receivedDate" class="form-label">Received Date</label>
        <input type="datetime-local" name="receivedDate" class="form-control" id="receivedDate" required/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="receivedType" class="form-label">Received Type</label>
        <select id="receivedType" name="receivedType" class="form-select" required>
          <?php
            $showReceivedType = $contribution->ShowAllReceiveType();
            while($dataReceivedType = $showReceivedType->fetch_object()){
          ?>
          <option><?php echo $dataReceivedType->channel_name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="sourceType" class="form-label">Contribution Source Type</label>
        <select id="sourceType" name="sourceType" class="form-select">
          <?php
            $showSourceType = $contribution->ShowAllContributionSourceType();
            while($dataSourceType = $showSourceType->fetch_object()){
          ?>
          <option><?php echo $dataSourceType->contribution_source_type_name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="contributionStatus" class="form-label">Contribution Status</label>
        <select id="contributionStatus" name="contributionStatus" class="form-select">
          <?php
            $showContributionStatus = $contribution->ShowAllContributionStatus();
            while($dataContributionStatus = $showContributionStatus->fetch_object()){
          ?>
          <option><?php echo $dataContributionStatus->contribution_status_name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="editLink" class="form-label">Edit Link URL</label>
        <input type="text" class="form-control" name="editLink" id="editLink" required/>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="publishedLink" class="form-label">Published Link URL</label>
        <input type="text" class="form-control" name="publishedLink" id="publishedLink" />
      </div>
      <input type="submit" name="submitNewContribution" class="btn btn-primary" value="submit new contribution"></input>
    </form>
    
    <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
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
                  <label for="fullName" class="form-label">Fullname</label>
                  <input type="text" name="fullName" class="form-control" id="fullName" required/>
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
              <input type="submit" name="addNewContributor" class="btn btn-primary" value="Insert New Contributor"></input>
            </div>
          </div>
        </div>
      </div>
    </form>

    <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
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
              <input type="submit" name="submitNewCity" class="btn btn-primary" value="Add New City"></input>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>

  <?php
      //get data from form
      if(@$_POST['submitNewContribution']){
        $contributor = $connection->con->real_escape_string($_POST['contributor']);
        $contributorId = $contacts->ShowContact(null,$contributor);
        $contributor = $contributorId['id'];
        $title = $connection->con->real_escape_string($_POST['title']);
        $type = $connection->con->real_escape_string($_POST['type']);
        $typeId = $contribution->ShowAllContributionType($type);
        $type = $typeId['id'];
        $message = $connection->con->real_escape_string($_POST['message']);
        $content = $connection->con->real_escape_string($_POST['content']);
        $contentLink = $connection->con->real_escape_string($_POST['contentLink']);
        $receivedDate = $connection->con->real_escape_string($_POST['receivedDate']);
        $receivedType = $connection->con->real_escape_string($_POST['receivedType']);
        $receivedTypeId = $contribution->ShowAllReceiveType($receivedType);
        $receivedType = $receivedTypeId['id'];
        $sourceType = $connection->con->real_escape_string($_POST['sourceType']);
        $sourceTypeId = $contribution->ShowAllContributionSourceType($sourceType);
        $sourceType = $sourceTypeId['id'];
        $contributionStatus = $connection->con->real_escape_string($_POST['contributionStatus']);
        $contributionStatusId = $contribution->ShowAllContributionStatus($contributionStatus);
        $contributionStatus = $contributionStatusId['id'];
        $editLink = $connection->con->real_escape_string($_POST['editLink']);
        $publishedLink = $connection->con->real_escape_string($_POST['publishedLink']);
        
        //insert to db 
        $contribution->InsertNewContribution($contributor, $title, $type, $message, $content, $contentLink, $receivedDate, $receivedType, $sourceType, $contributionStatus, $editLink, $publishedLink);

        //redirect to contact_list.php
        echo '<meta content="0, url=contribution_list.php" http-equiv="refresh">';
        

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
        echo '<meta content="0" http-equiv="refresh">';
        
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
