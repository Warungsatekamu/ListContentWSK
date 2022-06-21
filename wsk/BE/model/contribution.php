<?php
    class Contribution{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllContributions(){
            $db = $this->mysqli->con;
            $sql = "SELECT * FROM contributions 
            JOIN contribution_types on contributions.type = contribution_types.id 
            JOIN contacts ON contributions.contributor=contacts.id 
            JOIN contribution_statuses ON contributions.contribution_status=contribution_statuses.id 
            JOIN contribution_source_types ON contributions.contribution_source_type = contribution_source_types.id";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
    }
?>