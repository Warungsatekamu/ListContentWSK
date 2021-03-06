<?php
  require_once('../../configuration/db_connection.php');
  require_once('../../model/database.php');
  include('navbar.php');
  include('../../model/contribution.php');

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

<body>
  <section class="section">
  <div class = "container">
    <div class="row itembox">
      <div class="col-12 col-md-8 col-lg-8"><h2><b>Report (WarungSaTeKaMu)</b></h2></div>
      <!-- <button id="add" class="btn btn-primary col-3" type="button">Add New Contribution</button> -->
    </div>
    <hr />
    <div id="dtBasicExample_filter" class="dataTables_filter">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Month
      </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">January</a></li>
          <li><a class="dropdown-item" href="#">February</a></li>
          <li><a class="dropdown-item" href="#">March</a></li>
          <li><a class="dropdown-item" href="#">April</a></li>
          <li><a class="dropdown-item" href="#">May</a></li>
          <li><a class="dropdown-item" href="#">June</a></li>
          <li><a class="dropdown-item" href="#">July</a></li>
          <li><a class="dropdown-item" href="#">August</a></li>
          <li><a class="dropdown-item" href="#">September</a></li>
          <li><a class="dropdown-item" href="#">October</a></li>
          <li><a class="dropdown-item" href="#">November</a></li>
          <li><a class="dropdown-item" href="#">Desember</a></li>
        </ul>
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Year
      </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">2015</a></li>
          <li><a class="dropdown-item" href="#">2016</a></li>
          <li><a class="dropdown-item" href="#">2017</a></li>
          <li><a class="dropdown-item" href="#">2018</a></li>
          <li><a class="dropdown-item" href="#">2019</a></li>
          <li><a class="dropdown-item" href="#">2020</a></li>
          <li><a class="dropdown-item" href="#">2021</a></li>
          <li><a class="dropdown-item" href="#">2022</a></li>
        </ul>
    </div>
    <!-- <div class = "">
        <a href ="">April 2015</a> | <a href ="">May 2015</a> | <a href ="">Jun 2015</a> | <a href ="">Jul 2015</a> | <a href ="">Aug 2015</a> | <a href ="">Sep 2015</a> | <a href ="">Oct 2015</a> | <a href ="">Nov 2015</a> | <a href ="">Des 2015</a> |
        <a href ="">April 2016</a> | <a href ="">May 2016</a> | <a href ="">Jun 2016</a> | <a href ="">Jul 2016</a> | <a href ="">Aug 2016</a> | <a href ="">Sep 2016</a> | <a href ="">Oct 2016</a> | <a href ="">Nov 2016</a> | <a href ="">Des 2016</a> |
        <a href ="">April 2017</a> | <a href ="">May 2017</a> | <a href ="">Jun 2017</a> | <a href ="">Jul 2017</a> | <a href ="">Aug 2017</a> | <a href ="">Sep 2017</a> | <a href ="">Oct 2017</a> | <a href ="">Nov 2017</a> | <a href ="">Des 2017</a> |
        <a href ="">April 2018</a> | <a href ="">May 2018</a> | <a href ="">Jun 2018</a> | <a href ="">Jul 2018</a> | <a href ="">Aug 2018</a> | <a href ="">Sep 2018</a> | <a href ="">Oct 2018</a> | <a href ="">Nov 2018</a> | <a href ="">Des 2018</a> |
        <a href ="">April 2019</a> | <a href ="">May 2019</a> | <a href ="">Jun 2019</a> | <a href ="">Jul 2019</a> | <a href ="">Aug 2019</a> | <a href ="">Sep 2019</a> | <a href ="">Oct 2019</a> | <a href ="">Nov 2019</a> | <a href ="">Des 2019</a> |
        <a href ="">April 2020</a> | <a href ="">May 2020</a> | <a href ="">Jun 2020</a> | <a href ="">Jul 2020</a> | <a href ="">Aug 2020</a> | <a href ="">Sep 2020</a> | <a href ="">Oct 2020</a> | <a href ="">Nov 2020</a> | <a href ="">Des 2020</a> |
        <a href ="">April 2021</a> | <a href ="">May 2021</a> | <a href ="">Jun 2021</a> | <a href ="">Jul 2021</a> | <a href ="">Aug 2021</a> | <a href ="">Sep 2021</a> | <a href ="">Oct 2021</a> | <a href ="">Nov 2021</a> | <a href ="">Des 2021</a> |
        <a href ="">April 2022</a> | <a href ="">May 2022</a> | <a href ="">Jun 2022</a> | <a href ="">Jul 2022</a> | <a href ="">Aug 2022</a> | <a href ="">Sep 2022</a> | <a href ="">Oct 2022</a> | <a href ="">Nov 2022</a> | <a href ="">Des 2022</a> |
    </div> -->
    <br><br>
    <div class = "container">
        <div class="row itembox">
            <div class="col-12 col-md-8 col-lg-8"><h2>RECEVIED CONTRIBUTIONS</h2></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="th-sm">Type</th>
                    <th class="th-sm">Send to YMI</th>
                    <th class="th-sm">Rejected</th>
                    <th class="th-sm">Pending</th>
                    <th class="th-sm">Post to YMI</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>Article</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>Short Story</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tbody>
            </div>
        </div>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <br><br >  
        <h2>REQUESTED CONTRIBUTIONS</h2>  
          <thead>
              <tr>
                <th class="th-sm">Type</th>
                <th class="th-sm">Send to YMI</th>
                <th class="th-sm">Rejected</th>
                <th class="th-sm">Pending</th>
                <th class="th-sm">Post to YMI</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>TOTAL</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <tr>
                <th>Article</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>

            </tbody>
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <br><br >  
        <h2>TRANSLATED FROM OTHER LANGUAGE SITES CONTRIBUTIONS</h2>  
          <thead>
              <tr>
                <th class="th-sm">Type</th>
                <th class="th-sm">Send to YMI</th>
                <th class="th-sm">Rejected</th>
                <th class="th-sm">Pending</th>
                <th class="th-sm">Post to YMI</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>TOTAL</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <tr>
                <th>Article</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <br><br >  
        <h2>TOTAL CONTRIBUTIONS</h2>  
          <thead>
              <tr>
                <th class="th-sm">Type</th>
                <th class="th-sm">Send to YMI</th>
                <th class="th-sm">Rejected</th>
                <th class="th-sm">Pending</th>
                <th class="th-sm">Post to YMI</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>TOTAL</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
              <tr>
                <th>Article</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>

            </tbody>

            </tbody>
            
    </div>          
</body>
