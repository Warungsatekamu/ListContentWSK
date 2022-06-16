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

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="contribution_list.php">YMIDB</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Add </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="add_new_contribution.php">Add New Contributions</a></li>
              <li><a class="dropdown-item" href="add_new_contact.php">Add New Contact</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact_list.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contribution_list.php">Contributions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="remark_list.php">Remarks</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Atributes </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="contact_atribute_list.php">Contact</a></li>
              <li><a class="dropdown-item" href="contribute_atribute_list.php">Contributions</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Reports </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">YMI Report</a></li>
              <li><a class="dropdown-item" href="#">Old Report</a></li>
              <li><a class="dropdown-item" href="#">Costumized Report</a></li>
            </ul>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#contact mb-3">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
