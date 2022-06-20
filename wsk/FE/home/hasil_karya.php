<?php
  include('navbar.php');
?>

<!DOCTYPE html>
<html lang="en">

  <body class="jumbotron" style="padding: 5rem 0">
    <section class="section">
      <div class="container">
        <div class="row itembox">
          <div class="col-12 col-md-8 col-lg-8"><h2>Judul Hasil Karya</h2></div>
          <!-- nama data bakal di get dari db -->
        </div>
        <hr />
        <!-- ada button remark edit sm delete -->
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
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="attachments-tab" data-bs-toggle="tab" data-bs-target="#attachments" type="button" role="tab" aria-controls="attachments" aria-selected="true">Attachments</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="edit-tab" data-bs-toggle="tab" data-bs-target="#edit" type="button" role="tab" aria-controls="edit" aria-selected="true">Edit</button>
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
                      <th class="th-sm">Contributor</th>
                      <th class="th-sm">nanti datanya ada kok</th>
                    </tr>
                    <tr>
                      <th class="th-sm">Title</th>
                      <th class="th-sm">nanti datanya ada kok</th>
                    </tr>
                    <tr>
                      <th class="th-sm">Type</th>
                      <th class="th-sm">nanti datanya ada kok</th>
                    </tr>
                    <tr>
                      <th class="th-sm">Message</th>
                      <th class="th-sm">nanti datanya ada kok</th>
                    </tr>
                    <tr>
                      <th class="th-sm">Content</th>
                      <th class="th-sm">nanti datanya ada kok</th>
                    </tr>
                    <tr>
                      <th class="th-sm">Language</th>
                      <th class="th-sm">nanti datanya ada kok</th>
                    </tr>
                    <tr>
                      <th class="th-sm">Received Date</th>
                      <th class="th-sm">nanti datanya ada kok</th>
                    </tr>
                    <tr>
                      <th class="th-sm">Received Via</th>
                      <th class="th-sm">nanti datanya ada kok</th>
                    </tr>
                    <tr>
                      <th class="th-sm">Contributions Source Type</th>
                      <th class="th-sm">nanti datanya ada kok</th>
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
                <div id="dtBasicExample_filter" class="dataTables_filter">
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
                    <tr>
                      <th>nanti ada datanya
                      </th>
                      <th>nanti ada datanya
                      </th>
                      <th>nanti ada datanya
                      </th>
                      <th>nanti ada datanya
                      </th>
                    </tr>
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
              <div class="col-sm-12 col-md-6"><h2>Attributes</h2></div>
              <button id="add" class="btn btn-primary col-2" style="height:5%" type="button">+ attributes</button>
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
                <div id="dtBasicExample_filter" class="dataTables_filter">
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
                  <tbody>
                    <tr>
                      <th>Owner
                      </th>
                      <th>WarungSaTeKaMu
                      </th>
                      <th>
                      </th>
                      <th>button edit dan delete wkwk
                      </th>    
                    </tr>
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
                  Showing 1 to 1 of 1 entries
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
                    <li class="paginate_button page-item next" id="dtBasicExample_next"><a href="#" aria-controls="dtBasicExample" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="attachments" role="tabpanel" aria-labelledby="attachments-tab">
            <div class="row itembox">
              <div class="col-12 col-md-8 col-lg-8"><h2>Attachment</h2></div>
              <button id="add" class="btn btn-primary col-3" type="button">+ attachment</button>
            </div>
          </div>
          <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
            <div class="row">
              <div class="col-5"><h2>Edit</h2></div>
              <div class="col-7"><a class="btn btn-primary" href="#" role="button">Edit</a></div>
            </div>
            <div class="row justify-content-center">
              <div class="col-12">
                <iframe class="embed-responsive-item" src="https://docs.google.com/document/d/1QOHMm1eeaVlcAjwuBEODbJ1d5g27nXvxPcygGuaDTaM/edit"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>