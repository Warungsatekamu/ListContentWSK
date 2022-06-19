<?php
  include('navbar.php');
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
</html>

<body class="jumbotron" style="padding: 5rem 0">
  <form class="mx-auto mb-3" style="width: 800px">
    <h2 class="mb-4">Add New Contact</h2>

    <div class="mx-auto mb-3" style="width: 800px">
      <label for="exampleFormControlInput1" class="form-label">Full Name</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" />
    </div>
    <div class="mx-auto mb-3" style="width: 800px">
      <label for="exampleFormControlInput1" class="form-label">Nickname</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" />
    </div>
    <div class="mx-auto mb-3" style="width: 800px">
      <label for="disabledSelect" class="form-label">Gender</label>
      <select id="disabledSelect" class="form-select">
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    <div class="mx-auto mb-3" style="width: 800px">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
    </div>
    <div class="mx-auto mb-3" style="width: 800px">
      <label for="exampleFormControlTextarea1" class="form-label">Biodata</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="mx-auto mb-3" style="width: 800px">
      <label for="exampleFormControlInput1" class="form-label">Birthdate</label>
      <input type="date" class="form-control" id="exampleFormControlInput1" />
    </div>
    <div class="mx-auto mb-3" style="width: 800px">
      <label for="exampleFormControlInput1" class="form-label">Phone</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" />
    </div>
    <div class="mx-auto mb-3" style="width: 800px">
      <label for="exampleFormControlInput1" class="form-label">Address</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" />
    </div>
    <div class="mx-auto mb-3" style="width: 800px">
      <label for="exampleFormControlInput1" class="form-label">City</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>
