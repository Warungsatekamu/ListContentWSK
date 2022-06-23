<?php
    include('navbar.php');
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Remark</button>
                    <!-- modal remark -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Remark</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mx-auto mb-3" style="width: 460px">
                                        <label for="exampleFormControlInput1" class="form-label">Time</label>
                                        <input type="datetime-local" class="form-control" id="exampleFormControlInput1" />
                                    </div>
                                    <div class="mx-auto mb-3" style="width: 460px">
                                        <label for="disabledSelect" class="form-label">Remark Type</label>
                                        <input type="text" name="remarkType" class="form-control" id="remarkType" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Add New Remark</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-light">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
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
                                    <tr>
                                        <th>nanti ada datanya
                                        </th>
                                        <th>nanti ada datanya
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
