<<<<<<< HEAD:wsk/FE/home/contact_atribute_list.php
<?php
  require_once('../../BE/configuration/db_connection.php');
  require_once('../../BE/model/database.php');
  include('navbar.php');
  include('../../BE/model/attributeModel.php');

  $connection = new Database($host,$user,$pass,$dbName);
  $attributes = new Atribute($connection);

?>

<!DOCTYPE html>
<html lang="en">


  <body>
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
            <div id="dtBasicExample_filter" class="dataTables_filter" style = "margin-left: 280px; margin-bottom: 20px;">
              <label>Search: <input type="search" class="" placeholder="" aria-controls="dtBasicExample" /> </label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <table id="dtBasicExample" class="table table-bordered table-sm" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="th-sm">Name</th>
                  <th class="th-sm">Type</th>
                  <th class="th-sm">Category</th>
                  <th class="th-sm">Value</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $no=0;
                $showAttributeContactList = $attributes->ShowAllAttribute(null,null,"contact");
                while($dataAttributeContactList = $showAttributeContactList->fetch_object()){
              ?>
                  <tr>
                    <td><a href="detail_contact.php?id=<?php echo $dataAttributeContactList->data_id?>"><?php echo $dataAttributeContactList->full_name ?></td>
                    <td><?php echo $dataAttributeContactList->attribute_type_name ?></td>
                    <td><?php echo $dataAttributeContactList->attribute_generic_value_name ?></td>
                    <td><?php echo $dataAttributeContactList->attribute_value ?></td>
                  </tr>
                <?php } ?>
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
        <div class="row">
          <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="dtBasicExample_info" role="status" aria-live="polite">
              Showing 1 to 10 of 57 entries
            </div>
          </div>
        <div class="col-sm-12 col-md-7">
          <div class="dataTables_paginate paging_simple_numbers" id="dtBasicExample_paginate" style = "margin-left: 280px; margin-bottom: 20px;">
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

=======
<?php
  require_once('../../configuration/db_connection.php');
  require_once('../../model/database.php');
  include('navbar.php');
  include('../../model/attributeModel.php');

  $connection = new Database($host,$user,$pass,$dbName);
  $attributes = new Atribute($connection);

?>

<!DOCTYPE html>
<html lang="en">


  <body>
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
            <div id="dtBasicExample_filter" class="dataTables_filter" style = "margin-left: 280px; margin-bottom: 20px;">
              <label>Search: <input type="search" class="" placeholder="" aria-controls="dtBasicExample" /> </label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <table id="dtBasicExample" class="table table-bordered table-sm" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="th-sm">Name</th>
                  <th class="th-sm">Type</th>
                  <th class="th-sm">Category</th>
                  <th class="th-sm">Value</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $no=0;
                $showAttributeContactList = $attributes->ShowAllAttribute(null,null,"contact");
                while($dataAttributeContactList = $showAttributeContactList->fetch_object()){
              ?>
                  <tr>
                    <td><a href="detail_contact.php?id=<?php echo $dataAttributeContactList->data_id?>"><?php echo $dataAttributeContactList->full_name ?></td>
                    <td><?php echo $dataAttributeContactList->attribute_type_name ?></td>
                    <td><?php echo $dataAttributeContactList->attribute_generic_value_name ?></td>
                    <td><?php echo $dataAttributeContactList->attribute_value ?></td>
                  </tr>
                <?php } ?>
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
        <div class="row">
          <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="dtBasicExample_info" role="status" aria-live="polite">
              Showing 1 to 10 of 57 entries
            </div>
          </div>
        <div class="col-sm-12 col-md-7">
          <div class="dataTables_paginate paging_simple_numbers" id="dtBasicExample_paginate" style = "margin-left: 280px; margin-bottom: 20px;">
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

>>>>>>> d12fffbc52b0cb25fe3ec08c4fab152491971372:view/home/contact_atribute_list.php
</html>