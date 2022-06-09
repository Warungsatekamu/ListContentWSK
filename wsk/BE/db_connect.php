<?php

class database{
    // database connection 
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db_name="db_wsk";
    protected $con;
    public function _construct(){
        $this->con = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
        if($this->con == false)die("can't connect to database".$this->con->connect_error());
        return $this->con;
    }
}

?>