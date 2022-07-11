<?php
  require_once('../../configuration/db_connection.php');
  require_once('../../model/database.php');
  include('navbar.php');
  include('../../model/contact.php');
  include('../../model/contribution.php');
  include('../../model/attributeModel.php');

  //get id contact that we want to see
  $id = $_GET['id'];
  $connection = new Database($host,$user,$pass,$dbName);
  $contacts = new Contact($connection);
  $contributions = new Contribution($connection);
  $attributes = new Atribute($connection);
?>

<!DOCTYPE html>
<html lang="en">
  <body>
    <section class="section">
      <div class="container">
        <!-- get data from db where id=$id -->
        <?php
          $show = $contacts->ShowContact($id,null);
          $data = $show->fetch_object();
        ?>
        <div class="row itembox">
          <!-- name from db -->
          <div class="col-12 col-md-8 col-lg-8"><h2><?php echo $data->full_name?></h2></div>
        </div>
        <hr />
        <!-- kode per-page -->
        <div id="dtBasicExample_filter" class="dataTables_filter" style = "margin-left: 900px;">
            <a href="mailto:<?php echo $data->email ?>" type="button" class="btn btn-primary">Email</a>
            <a href="edit_contact.php?id=<?php echo $id ?>" type="button" class="btn btn-light">Edit</a>
            <a href="contact_list.php?delete=<?php echo $id ?>" type="button" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#data" type="button" role="tab" aria-controls="home" aria-selected="true">Data</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#attributes" type="button" role="tab" aria-controls="profile" aria-selected="true">Attributes</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contributions" type="button" role="tab" aria-controls="contact" aria-selected="true">Contributions</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="data" role="tabpanel" aria-labelledby="data-tab">
            <div class="col-12 col-md-8 col-lg-8"><h2>Data</h2></div>
            <div class="row">
              <div class="col-lg-12">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                  <!-- <thead>
                    <tr>
                      <th class="th-sm">Full Name</th>
                      <th class="th-sm">Abby Phinney</th>
                    </tr>
                  </thead> -->
                  
                  <tbody>
                    <tr>
                      <th class="th-sm">Full Name</th>
                      <th class="th-sm"><?php echo $data->full_name ?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Nick Name</th>
                      <th class="th-sm"><?php echo $data->nick_name ?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Gender</th>
                      <th class="th-sm"><?php echo $data->gender ?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Email</th>
                      <th class="th-sm"><?php echo $data->email ?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Birthdate</th>
                      <th class="th-sm"><?php echo $data->birthdate ?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Bio</th>
                      <th class="th-sm"><?php echo $data->bio ?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Phone</th>
                      <th class="th-sm"><?php echo $data->phone ?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Address</th>
                      <th class="th-sm"><?php echo $data->address ?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">City</th>
                      <th class="th-sm"><?php echo $data->city_name ?></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="attributes" role="tabpanel" aria-labelledby="attributes-tab"><section class="section">
              <div class="row itembox">
                <div class="col-12 col-md-8 col-lg-8"><h2>Attributes</h2></div>
                <button id="add" class="btn btn-primary col-3" style="height:5%" type="button">add attributes</button>
              </div>
              
              <!-- <h2 class="align-baseline">Contribution List</h2>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2 mt-1" type="button">Add New Contribution</button>
              </div> -->
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="dataTables_length bs-select" id="dtBasicExample_length">
                    <label>Show <select name="dtBasicExample_length" aria-controls="dtBasicExample" class="custom-select custom-select-sm ">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select> entries</label>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div id="dtBasicExample_filter" class="dataTables_filter" style = "margin-left: 280px; margin-bottom: 20px;">
                    <label>Search: <input type="search" class="" placeholder="" aria-controls="dtBasicExample" >
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">Attribute Type 
                        </th>
                        <th class="th-sm">Attribute Category
                        </th>
                        <th class="th-sm">Attribute Value
                        </th>
                        <th class="th-sm">Action
                        </th>  
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $noOfContributionAttribute=0;
                        $showContactAttributeList = $attributes->ShowAllAttribute($id,null,null);
                        while($dataContactAttributeList = $showContactAttributeList->fetch_object()){
                      ?>
                          <tr>
                            <td><?php echo $dataContactAttributeList->attribute_type_name ?></td>
                            <td><?php echo $dataContactAttributeList->attribute_generic_value_name ?></td>
                            <td><?php echo $dataContactAttributeList->attribute_value ?></td>
                            <td><a href="" type="button" class="btn btn-light">Edit</a>
                            <a href="" type="button" class="btn btn-danger">Delete</a>
                            </td>    
                          </tr>
                      <?php $noOfContributionAttribute++; } ?>
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
          </div>
          <div class="tab-pane fade" id="contributions" role="tabpanel" aria-labelledby="contributions-tab">
            <div class="row itembox">
              <div class="col-12 col-md-8 col-lg-8"><h2>Contributions</h2></div>
              <button id="add" class="btn btn-primary col-3" style="height:5%" type="button">add Contributions</button>
            </div>
            
            <!-- <h2 class="align-baseline">Contribution List</h2>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button class="btn btn-primary me-md-2 mt-1" type="button">Add New Contribution</button>
            </div> -->
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="dataTables_length bs-select" id="dtBasicExample_length">
                  <label>Show <select name="dtBasicExample_length" aria-controls="dtBasicExample" class="custom-select custom-select-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select> entries</label>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div id="dtBasicExample_filter" class="dataTables_filter" style = "margin-left: 280px; margin-bottom: 20px;">
                  <label>Search: <input type="search" class="" placeholder="" aria-controls="dtBasicExample">
                  </label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="th-sm">Received Date
                      </th>
                      <th class="th-sm">Type
                      </th>
                      <th class="th-sm">Title
                      </th>
                      <th class="th-sm">Status
                      </th>  
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $noOfContribution=0;
                    $showContributionList = $contributions->ShowAllContributions(null,$id);
                    while($dataContributionList = $showContributionList->fetch_object()){
                  ?>
                    <tr>
                      <th><?php echo $dataContributionList->received_date ?>
                      </th>
                      <th><?php echo $dataContributionList->contribution_type_name ?>
                      </th>
                      <th><?php echo $dataContributionList->title ?>
                      </th>
                      <th><?php echo $dataContributionList->contribution_status_name ?>
                      </th>
                    </tr>
                    <?php 
                        $noOfContribution++;
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
            <div class="row">
              <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dtBasicExample_info" role="status" aria-live="polite">
                  Showing 1 to 1 of <?php echo $noOfContribution ?> entries
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
                    <li class="paginate_button page-item next" id="dtBasicExample_next"><a href="#" aria-controls="dtBasicExample" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>
  </body>
</html>