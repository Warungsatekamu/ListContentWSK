<?php
    class Contact{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllContact(){
            $db = $this->mysqli->con;
            $sql = "SELECT * FROM contacts";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
    }
?>