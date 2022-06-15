<?php
  require_once('../../BE/configuration/db_connection.php');
  require_once('../../BE/model/database.php');

  include('../../BE/model/contribution.php');

  $connection = new Database($host,$user,$pass,$dbName);
  $contributions = new Contribution($connection);
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">YMIDB</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Add </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#projects">Contributions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact mb-3">Remarks</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Atributes </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Reports </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
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
  <section class="section">
  <form class="mx-auto mb-3" style="width: 800px">
    <div class="row itembox">
      <div class="col-12 col-md-8 col-lg-8"><h2>Contribution List</h2></div>
      <button id="add" class="btn btn-primary col-3" type="button">Add New Contribution</button>
    </div>
    <hr />
    <!-- <h2 class="align-baseline">Contribution List</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button class="btn btn-primary me-md-2 mt-1" type="button">Add New Contribution</button>
    </div> -->
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="dataTables_length bs-select" id="dtBasicExample_length">
          <label>Show <select name="dtBasicExample_length" aria-controls="dtBasicExample" class="custom-select custom-select-sm form-control form-control-sm">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select> entries</label>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div id="dtBasicExample_filter" class="dataTables_filter">
          <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dtBasicExample">
          </label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">Title
              </th>
              <th class="th-sm">Recevied Date
              </th>
              <th class="th-sm">Type
              </th>
              <th class="th-sm">Contributor
              </th>
              <th class="th-sm">Status
              </th>
              <th class="th-sm">
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no=1;
              $show = $contributions->ShowAllContributions();
              while($data = $show->fetch_object()){
            ?>
              <tr>
                <td><?php echo $data->title ?></td>
                <td><?php echo $data->received_date ?></td>
                <td><?php echo $data->type ?></td>
                <td><?php echo $data->contributor ?></td>
                <td><?php echo $data->contribution_status ?></td>
                <td align="center">
                  <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i>edit</button>
                  <button type="button" class="btn btn-danger"><i class="fa fa-edit"></i>hapus</button>
                </td>
              </tr>
            <?php
              }
            ?>
          </tbody>
          <!-- <tfoot>
            <tr>
              <th>Name
              </th>
              <th>Position
              </th>
              <th>Office
              </th>
              <th>Age
              </th>
              <th>Start date
              </th>
              <th>Salary
              </th>
            </tr>
          </tfoot> -->
        </table>
      </div>
    </div>
    
    
    <!-- <div class="container">
      <div class="row row-cols-auto">
        <p class="col padtop"><b>Show</b></p>
        <div class="col">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle dropmargin" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">10</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
        </div>
        <p class="col padtop"><b>entries</b></p>
        <div class="searchpad row">
          <p class="col padtop"><b>Search: </b></p>
          <input type="text" id="search">
        </div>
      </section>
      </div>
    </div> -->
    <div class="row">
      <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="dtBasicExample_info" role="status" aria-live="polite">
          Showing 1 to 10 of 57 entries
        </div>
      </div>
      <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="dtBasicExample_paginate">
          <ul class="pagination">
            <li class="paginate_button page-item previous disabled" id="dtBasicExample_previous">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
            </li>
            <li class="paginate_button page-item active">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="1" tabindex="0" class="page-link">1</a>
            </li>
            <li class="paginate_button page-item ">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="2" tabindex="0" class="page-link">2</a>
            </li>
            <li class="paginate_button page-item ">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="3" tabindex="0" class="page-link">3</a>
            </li>
            <li class="paginate_button page-item ">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="4" tabindex="0" class="page-link">4</a>
            </li>
            <li class="paginate_button page-item ">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="5" tabindex="0" class="page-link">5</a>
            </li>
            <li class="paginate_button page-item ">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="6" tabindex="0" class="page-link">6</a>
            </li>
            <li class="paginate_button page-item next" id="dtBasicExample_next"><a href="#" aria-controls="dtBasicExample" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  </form>
</body>
