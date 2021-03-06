<?php
  include('navbar.php');
  require_once('../../configuration/db_connection.php');
  require_once('../../model/database.php');
  include('../../model/contact.php');
  include('../../model/city.php');


  
?>

<!DOCTYPE html>
    <html lang="en">
    <body class="jumbotron">
        <!-- form user data -->
        <form method="post" class="mx-auto mb-3" style="width: 800px" enctype="multipart/form-data">
        <h2 class="mb-4">Edit Admin</h2>

        <!-- username -->
        <div class="mx-auto mb-3" style="width: 800px">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" required/>
        </div>

        <!-- name -->
        <div class="mx-auto mb-3" style="width: 800px">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama"/>
        </div>
        <!-- pass and conf -->
        <div class="mx-auto mb-3" style="width: 800px">
            <label for="password" class="form-label">Update Password</label>
            <input type="password" name="password" class="form-control" id="password" required/>
            <i class="bi bi-eye-slash" id="password"></i>
        </div>
        <div class="mx-auto mb-3" style="width: 800px">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required/>
        </div>
        <!-- level (dropdown)-->
        <!-- <div class="mx-auto mb-3" style="width: 800px">
            <label for="gender" class="form-label">Level</label>
            <select id="gender" class="form-select" name="gender">
            <option>Super Admin</option>
            <option>Admin</option>
            </select>
        </div> -->
        <div class="mx-auto mb-3" style="width: 800px">
            <label for="level" class="form-label">Level</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Super Admin
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Admin
                </label>
            </div>
        </div>

        <input type="submit" name="submitNewAdmin" class="btn btn-primary">

    </body>
    
    </html>