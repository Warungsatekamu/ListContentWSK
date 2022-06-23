<?php
  include('navbar.php');
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
          <option></option>
          <option></option>
          <option></option>
        </select>
        
        <a type="button" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add New Contributor
        </a>
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
                    <select id="gender" class="form-select">
                      <option>M</option>
                      <option>F</option>
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
                  <label for="disabledSelect" class="form-label">City</label>
                    <select id="disabledSelect" class="form-select">
                      <option></option>
                      <option></option>
                      <option></option>
                    </select>
                    <a type="button" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Add New City
                    </a> 
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Add New City</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add New Contributor</button>
              </div>
            </div>
          </div>
        </div>
        <br><br>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" />
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">Type</label>
        <select id="disabledSelect" class="form-select">
          <option>Type1</option>
          <option>Type2</option>
          <option>Type3</option>
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
        <label for="exampleFormControlInput1" class="form-label">Recevied Date</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" />
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">Recevied Type</label>
        <select id="disabledSelect" class="form-select">
          <option>Recevied Type1</option>
          <option>Recevied Type2</option>
          <option>Recevied Type3</option>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">Contribution Source Type</label>
        <select id="disabledSelect" class="form-select">
          <option>Recevied</option>
          <option>Recevied</option>
          <option>Recevied</option>
        </select>
      </div>
      <div class="mx-auto mb-3" style="width: 800px">
        <label for="disabledSelect" class="form-label">Contribution Status</label>
        <select id="disabledSelect" class="form-select">
          <option>Recevied</option>
          <option>Recevied</option>
          <option>Recevied</option>
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
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>

</html>
