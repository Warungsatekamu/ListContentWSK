<?php
  require_once('../../BE/configuration/db_connection.php');
  require_once('../../BE/model/database.php');
  include('navbar.php');
  include('../../BE/model/contribution.php'); 
  include('../../BE/model/remark.php'); 
  include('../../BE/model/attributeModel.php'); 
  
  $id = $_GET['id'];
  $connection = new Database($host,$user,$pass,$dbName);
  $contributions = new Contribution($connection);
  $remarks = new ContributionRemark($connection);
  $attributes = new Atribute($connection);
  
  //if get delete command, delete record where id = $idContributionRemark
  if(isset($_GET['deleteRemark'])){
    $idContributionRemark = $_GET['deleteRemark'];
    $remarks->DeleteContributionRemark($idContributionRemark);
  }
?>



<!DOCTYPE html>
<html lang="en">

  <body>
    <section class="section">
      <div class="container">
        <!-- get data from db -->
        <?php
          $show = $contributions->ShowAllContributions($id,null);
          $data = $show->fetch_object();
        ?>

        <div class="row itembox">
        <div class="col-12 col-md-8 col-lg-8"><h2><?php echo $data->title?></h2></div>
          <!-- nama data bakal di get dari db -->
        </div>
        <hr />
        <!-- ada button remark edit sm delete --> 
        
        <!-- <div class="col-sm-12 col-md-6"> -->
          <div id="dtBasicExample_filter" class="dataTables_filter" style = "margin-left: 900px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRemark">Remark</button>
            <a href="edit_contribution.php?id=<?php echo $id ?>" type="button" class="btn btn-light">Edit</a>
            <a href="contribution_list.php?delete=<?php echo $id ?>" type="button" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a>
          </div>
        <!-- </div>   -->
        <br>
        <!-- kode per-page -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="data-tab" data-bs-toggle="tab" data-bs-target="#data" type="button" role="tab" aria-controls="data" aria-selected="true">Data</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="remarks-tab" data-bs-toggle="tab" data-bs-target="#remarks" type="button" role="tab" aria-controls="remarks" aria-selected="true">Remarks</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="attributes-tab" data-bs-toggle="tab" data-bs-target="#attributes" type="button" role="tab" aria-controls="attributes" aria-selected="true">Attributes</button>
          </li>
          <!-- <li class="nav-item" role="presentation">
            <button class="nav-link" id="attachments-tab" data-bs-toggle="tab" data-bs-target="#attachments" type="button" role="tab" aria-controls="attachments" aria-selected="true">Attachments</button>
          </li> -->
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="edit-tab" data-bs-toggle="tab" data-bs-target="#edit" type="button" role="tab" aria-controls="edit" aria-selected="true">Edit</button>
          </li>
        </ul>
        <br>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="data" role="tabpanel" aria-labelledby="data-tab">
            <div class="col-12 col-md-8 col-lg-8"><h2>Data</h2></div>
            <div class="row">
              <div class="col-lg-12">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                  <!-- <thead>
                    <th>
                      <tr class="th-sm">Full Name</th>
                      <tr class="th-sm">Abby Phinney</th>
                    </th>
                  </thead> -->

                  <tbody>
                    <tr>
                      <th class="th-sm">Contributor</th>
                      <th class="th-sm"><?php echo $data->full_name?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Title</th>
                      <th class="th-sm"><?php echo $data->title?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Type</th>
                      <th class="th-sm"><?php echo $data->contribution_type_name?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Message</th>
                      <th class="th-sm"><?php echo $data->message?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Content</th>
                      <th class="th-sm"><?php echo $data->content?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Content Link</th>
                      <th class="th-sm"><a href = "<?php echo $data->content_link?>" target = "_blank">Link</a></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Language</th>
                      <th class="th-sm"><?php echo $data->language?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Received Date</th>
                      <th class="th-sm"><?php echo $data->received_date?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Received Via</th>
                      <th class="th-sm"><?php echo $data->channel_name?></th>
                    </tr>
                    <tr>
                      <th class="th-sm">Contributions Source Type</th>
                      <th class="th-sm"><?php echo $data->contribution_source_type_name?></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="remarks" role="tabpanel" aria-labelledby="remarks-tab">
            <div class="row itembox">
              <div class="col-12 col-md-8 col-lg-8"><h2>Remarks</h2></div>
              <!-- <button id="add" class="btn btn-primary col-3" type="button">+ attributes</button> -->
            </div>
            <!-- <h2 class="align-baseline">Contribution List</h2>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button class="btn btn-primary me-md-2 mt-1" type="button">Add New Contribution</button>
            </div> -->
            <div class="row">
              <div class="col-sm-6">
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
                  <label id="search">Search: </label> <input type="search" class="" placeholder="" aria-controls="dtBasicExample">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="th-sm">Remark Type</th>
                      <th class="th-sm">Time</th>
                      <th class="th-sm">Remark</th>
                      <th class="th-sm">Action</th>  
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $noOfContributionRemark=0;
                      $showContributionRemarkList = $remarks->ShowAllContributionRemark($id);
                      while($dataContributionRemarkList = $showContributionRemarkList->fetch_object()){
                    ?>
                    <tr>
                      <th><?php echo $dataContributionRemarkList->remark_type_name ?></th>
                      <th><?php echo $dataContributionRemarkList->action_time ?></th>
                      <th><?php echo $dataContributionRemarkList->remark ?></th>
                      <th>
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editRemark<?php echo $dataContributionRemarkList->id ?>">edit</button>

                        <form method="post" >
                          <!-- modal edit remark -->
                          <div class="modal fade" id="editRemark<?php echo $dataContributionRemarkList->id ?>" tabindex="-1" aria-labelledby="editRemarkLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="editRemarkLabel">Edit Remark</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="idRemark" class="form-control" id="idRemark" value="<?php echo $dataContributionRemarkList->id ?>"/>
              
                                  <div class="mx-auto mb-3" style="width: 460px">
                                    <label for="actionTime" class="form-label">Time</label>
                                    <input type="datetime-local" name="actionTime" class="form-control" id="actionTime" value="<?php echo $dataContributionRemarkList->action_time ?>"/>
                                  </div>
                                  <div class="mx-auto mb-3" style="width: 460px">
                                    <label for="remarkType" class="form-label">Remark Type</label>
                                    <select id="remarkType" name="remarkType" class="form-select">
                                      <!-- get all status for list -->
                                      <?php
                                        $showType = $remarks->ShowAllRemarkType();
                                        while($dataType = $showType->fetch_object()){
                                          if($dataType->remark_type_name == $dataContributionRemarkList->remark_type_name){
                                      ?>
                                        <option selected><?php echo $dataType->remark_type_name ?></option>
                                      <?php 
                                          } else {
                                      ?>
                                        <option><?php echo $dataType->remark_type_name ?></option>
                                      <?php
                                          }}
                                      ?>
                                    </select>
                                  </div>
                                  <div class="mx-auto mb-3" style="width: 460px">
                                    <label for="remark" class="form-label">Remark</label>
                                    <textarea class="form-control" name="remark" id="remark" rows="3"><?php echo $dataContributionRemarkList->remark ?></textarea>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <input type="submit" name="editRemark" class="btn btn-primary" value="Edit Remark"></input>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>

                        <a href="hasil_karya.php?id=<?php echo $id ?>&deleteRemark=<?php echo $dataContributionRemarkList->id ?>" type="button" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus remark ini?')">Delete</a>
                      </th>
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
          </div>
          <div class="tab-pane fade" id="attributes" role="tabpanel" aria-labelledby="attributes-tab">  
            <div class="row itembox">
              <div class="col-lg-8"><h2>Attributes</h2></div>
              <button type="button" class="btn btn-primary col-2" style="height:5%" data-bs-toggle="modal" data-bs-target="#addAttribute">Attribute</button>
            </div>
                  
            <!-- <h2 class="align-baseline">Contribution List</h2>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button class="btn btn-primary me-md-2 mt-1" type="button">Add New Contribution</button>
            </div> -->
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="dataTables_length bs-select" id="dtBasicExample_length">
                  <label class>Show <select name="dtBasicExample_length" aria-controls="dtBasicExample" class="custom-select custom-select-sm ">
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
                  <?php
                    $noOfContributionRemark=0;
                    $showContributionAttributeList = $attributes->ShowAllAttribute(null,$id,null);
                    while($dataContributionAttributeList = $showContributionAttributeList->fetch_object()){
                  ?>
                    <tbody>
                      <tr>
                        <td><?php echo $dataContributionAttributeList->attribute_type_name ?></td>
                        <td><?php echo $dataContributionAttributeList->attribute_generic_value_name ?></td>
                        <td><?php echo $dataContributionAttributeList->attribute_value ?></td>
                        <td><a href="" type="button" class="btn btn-light">Edit</a>
                        <a href="" type="button" class="btn btn-danger">Delete</a>
                        </td>    
                      </tr>
                    </tbody>
                  <?php } ?>
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
                  Showing 1 to 1 of 1 entries
                </div>
              </div>
              <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="dtBasicExample_paginate" style = "margin-left: 280px">
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
          <!-- <div class="tab-pane fade" id="attachments" role="tabpanel" aria-labelledby="attachments-tab">
            <div class="row itembox">
              <div class="col-12 col-md-8 col-lg-8"><h2>Attachment</h2></div>
              <button type="button" class="btn btn-primary col-2" style = "margin-left: 100px;">add attachment</button>
            </div>
          </div> -->
          <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
            <div class="row">
              <!-- <div class="col-5"><h2>Edit</h2></div> -->
              <div class="col-5"><a class="btn btn-primary" style = "margin-top: 20px; margin-bottom: 20px;" href="#" role="button">Start Edit</a></div>
              <br>
            </div>
            <div class="row justify-content-center">
              <div class="col-12">
                <iframe class="embed-responsive-item" src="<?php echo $data->edit_link_url?>"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
      <!-- modal add remark -->
      <div class="modal fade" id="addRemark" tabindex="-1" aria-labelledby="AddNewRemark" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="AddNewRemark">Add New Remark</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="actionTime" class="form-label">Time</label>
                <input type="datetime-local" name="actionTime" class="form-control" id="actionTime" required/>
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="remarkType" class="form-label">Remark Type</label>
                <select id="remarkType" name="remarkType" class="form-select">
                  <!-- get all status for list -->
                  <?php
                    $showType = $remarks->ShowAllRemarkType();
                    while($dataType = $showType->fetch_object()){
                  ?>
                    <option><?php echo $dataType->remark_type_name ?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="remark" class="form-label">Remark</label>
                <textarea class="form-control" name="remark" id="remark" rows="3"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" name="submitNewRemark" class="btn btn-primary" value="Add Remark"></input>
            </div>
          </div>
        </div>
      </div>
    </form>

    <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
      <!-- modal add attribute -->
      <div class="modal fade" id="addAttribute" tabindex="-1" aria-labelledby="AddNewAttribute" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="AddNewAttribute">Add New Attribute</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="attributeType" class="form-label">Attribute Type</label>
                <select id="attributeType" name="attributeType" class="form-select">
                  <!-- get all status for list -->
                  <?php
                    $showAttributeType = $attributes->ShowAllAttributeType("contribution", null);
                    while($dataAttributeType = $showAttributeType->fetch_object()){
                  ?>
                    <option><?php echo $dataAttributeType->attribute_type_name ?></option>
                  <?php
                    }
                  ?>
                </select>
                <a type="button" href="" data-bs-toggle="modal" data-bs-target="#addAttributeType">
                  Add New Attribute Type
                </a>
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="attribuetCategory" class="form-label">Attribute Category</label>
                <select id="attribuetCategory" name="attribuetCategory" class="form-select">
                  <!-- get all status for list -->
                  <?php
                    $showAttributeCategory = $attributes->ShowAllAttributeCategory();
                    while($dataAttributeCategory = $showAttributeCategory->fetch_object()){
                  ?>
                    <option><?php echo $dataAttributeCategory->attribute_generic_value_name ?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="remark" class="form-label">Attribute Value</label>
                <textarea class="form-control" name="attributeValue" id="attributeValue" rows="3"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" name="submitNewAttribute" class="btn btn-primary" value="Add New Attribute"></input>
            </div>
          </div>
        </div>
      </div>
    </form>

    <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
      <!-- modal add attribute type-->
      <div class="modal fade" id="addAttributeType" tabindex="-1" aria-labelledby="AddNewAttributeType" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="AddNewAttributeType">Add New Attribute Type</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mx-auto mb-3">
                <label for="attributeTypeName" class="form-label">Attribute Type Name</label>
                <input type="text" name="attributeTypeName" class="form-control" id="attributeTypeName" required/>
              </div>
              <div class="mx-auto mb-3" style="width: 460px">
                <label for="attributeCategoryType" class="form-label">Attribute Category Type</label>
                <select id="attributeCategoryType" name="attributeCategoryType" class="form-select">
                  <!-- get all status for list -->
                  <?php
                    $showAttributeCategoryType = $attributes->ShowAllAttributeCategoryType();
                    while($dataAttributeCategoryType = $showAttributeCategoryType->fetch_object()){
                  ?>
                    <option><?php echo $dataAttributeCategoryType->attribute_generic_value_type_name ?></option>
                  <?php
                    }
                  ?>
                </select>
                <a type="button" href="" data-bs-toggle="modal" data-bs-target="#addAttributeGenericValueType">
                  Add new attribute generic value type
                </a>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" name="submitNewAttributeType" class="btn btn-primary" value="Add new attribute type"></input>
            </div>
          </div>
        </div>
      </div>
    </form>

    <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
      <!-- modal add attribute -->
      <div class="modal fade" id="addAttributeGenericValueType" tabindex="-1" aria-labelledby="AddNewAttributenericValueType" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="AddNewAttributenericValueType">Add New Attribute Generic Value Type</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mx-auto mb-3">
                <label for="attributeCategoryTypeName" class="form-label">Attribute Category Type Name</label>
                <input type="text" name="attributeCategoryTypeName" class="form-control" id="attributeCategoryTypeName" required/>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" name="submitNewAttributeGenericValueType" class="btn btn-primary" value="Add new attribute generic value type"></input>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
  <?php
    if(@$_POST['submitNewRemark']){ //if button add new remark triggered
      $actionTime = $connection->con->real_escape_string($_POST['actionTime']);
      $remarkType = $connection->con->real_escape_string($_POST['remarkType']);
      $remarkTypeid = $remarks->ShowAllRemarkType($remarkType,null);
      $remarkType = $remarkTypeid['id'];
      $remark = $connection->con->real_escape_string($_POST['remark']);
      $remarks->InsertNewContributionRemark($id, $actionTime, $remarkType, $remark); //insert to db remark_types
      echo '<meta content="0" http-equiv="refresh">'; //refresh page
    } else if(@$_POST['editRemark']){
      $idUpdateRemark = $connection->con->real_escape_string($_POST['idRemark']);
      $actionTime = $connection->con->real_escape_string($_POST['actionTime']);
      $remarkType = $connection->con->real_escape_string($_POST['remarkType']);
      $remarkTypeid = $remarks->ShowAllRemarkType($remarkType,null);
      $remarkType = $remarkTypeid['id'];
      $remark = $connection->con->real_escape_string($_POST['remark']);
      $remarks->UpdateContributionRemark($idUpdateRemark, $actionTime, $remarkType, $remark); //insert to db remark_types
      echo '<meta content="0" http-equiv="refresh">'; //refresh page
    }

  ?>
</html>