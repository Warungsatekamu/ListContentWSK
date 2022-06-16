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
  <section class="section">
    <div class="container">
      <div class="row itembox">
        <div class="col-12 col-md-8 col-lg-8"><h2>Contact Atribute List</h2></div>
      </div>
      <hr />
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="dataTables_length bs-select" id="dtBasicExample_length">
            <label class
              >Show
              <select name="dtBasicExample_length" aria-controls="dtBasicExample" class="custom-select custom-select-sm ">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
              entries</label
            >
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div id="dtBasicExample_filter" class="dataTables_filter">
            <label>Search: <input type="search" class="" placeholder="" aria-controls="dtBasicExample" /> </label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="th-sm">Name</th>
                <th class="th-sm">Type</th>
                <th class="th-sm">Category</th>
                <th class="th-sm">Value</th>
              </tr>
            </thead>
            <!-- <tbody>
              <tr>
                <th>Owner</th>
                <th>WarungSaTeKaMu</th>
                <th></th>
                <th>button edit dan delete wkwk</th>
              </tr>
            </tbody> -->
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
            <li class="paginate_button page-item">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="2" tabindex="0" class="page-link">2</a>
            </li>
            <li class="paginate_button page-item">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="3" tabindex="0" class="page-link">3</a>
            </li>
            <li class="paginate_button page-item">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="4" tabindex="0" class="page-link">4</a>
            </li>
            <li class="paginate_button page-item">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="5" tabindex="0" class="page-link">5</a>
            </li>
            <li class="paginate_button page-item">
              <a href="#" aria-controls="dtBasicExample" data-dt-idx="6" tabindex="0" class="page-link">6</a>
            </li>
            <li class="paginate_button page-item next" id="dtBasicExample_next"><a href="#" aria-controls="dtBasicExample" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</body>
