<?php
    require_once('configuration/db_connection.php');
    require_once('model/database.php');
    require_once('model/user.php');

    $connection = new Database($host,$user,$pass,$dbName);
    $users = new User($connection);
    $result = $users->CheckTable();

    session_start();
    if(!isset($_SESSION['login'])){
        header('LOCATION: view/login/login.php');
        exit;
    } else{
        header('LOCATION: view/home/contribution_list.php');
    }

?>