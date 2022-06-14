<?php
    class Contribution{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllContributions(){
            $db = $this->mysqli->con;
            $sql = "SELECT * FROM contributions";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
    }
?>