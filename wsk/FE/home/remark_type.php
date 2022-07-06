<?php
    require_once('../../BE/configuration/db_connection.php');
    require_once('../../BE/model/database.php');
    include('navbar.php');
    include('../../BE/model/remark.php');
    include('../../BE/model/contribution.php');
  
    $connection = new Database($host,$user,$pass,$dbName);
    $remarks = new ContributionRemark($connection);
    $contribution = new Contribution($connection);
    
    if(isset($_GET['delete'])){
        $idRemark = $_GET['delete'];
        $remarks->DeleteRemarkType($idRemark);
    }
?>

<!DOCTYPE html>
<html lang="en">

    <body>
        <section class="section">
            <div class="container">
                <div class="row itembox">
                    <div class="col-12 col-md-8 col-lg-8"><h2>Remark Type</h2></div>
                </div>
                <hr />
                <!-- <div class="col-sm-12 col-md-6"> -->
                <div id="dtBasicExample_filter" class="dataTables_filter" style = "margin-left: 800px;">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#remarkModal">Add New Remark</button>
                </div>
                <!-- </div>   -->
                <br>
                <!-- tabel remark -->
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
                                        <th class="th-sm">Id</th>
                                        <th class="th-sm">Remark Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no=1;
                                    $show = $remarks->ShowAllRemarkType();
                                    while($data = $show->fetch_object()){
                                ?>
                                    <tr>
                                        <th><?php echo $data->remark_type_name ?>
                                        </th>
                                        <th><a href="remark_type.php?delete=<?php echo $data->id ?>" type="button" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus remark type ini \n remark type = <?php echo $data->remark_type_name ?>?')">Delete</a></th>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
            <!-- modal remark -->
            <div class="modal fade" id="remarkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Remark</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mx-auto mb-3" style="width: 460px">
                                <label for="remarkType" class="form-label">Remark Type</label>
                                <input type="text" name="remarkType" class="form-control" id="remarkType" required/>
                            </div>
                        </div>
                        <div class="mx-auto mb-3" style="width: 460px">
                            <label for="linkedStatus" class="form-label">Status For This Remark</label>
                            <select id="linkedStatus" class="form-select" name="linkedStatus">
                            <!-- get all status for list -->
                            <?php
                                $showStatusList = $contribution->ShowAllContributionStatus();
                                while($dataStatus = $showStatusList->fetch_object()){
                            ?>
                                    <option><?php echo $dataStatus->contribution_status_name ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" name="submitNewRemarkType" class="btn btn-primary" value="Add New Remark Type"></input>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
    <?php
        if(@$_POST['submitNewRemarkType']){ //if button add new remark type triggered
            $remarkType = $connection->con->real_escape_string($_POST['remarkType']);
            $linkedStatus = $connection->con->real_escape_string($_POST['linkedStatus']);
            $linkedStatusid = $contribution->ShowAllContributionStatus($linkedStatus);
            $linkedStatus = $linkedStatusid['id'];
            $remarks->InsertNewRemarkType($remarkType, $linkedStatus); //insert to db remark_types
            echo '<meta content="0" http-equiv="refresh">'; //refresh page
        }
    ?>
</html>
