<?php

class Database{
    // database connection 
    private $host;
    private $user;
    private $pass;
    private $dbName;
    public $con;
    
    function __construct($host, $user, $pass, $dbName){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbName = $dbName;
        
        $this->con = new mysqli($this->host, $this->user, $this->pass, $this->dbName) or die (mysqli_error());
        if($this->con == false){
            return false;
        } else {
            return true;
        }
        
    }
}

?>