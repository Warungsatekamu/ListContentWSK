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
        <label for="exampleFormControlInput1" class="form-label">Contributor</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" />
        <a href="add_new_contact.php">Add new contributor</a>
      </div>
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
