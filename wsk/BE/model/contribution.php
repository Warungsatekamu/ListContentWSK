<?php
    class Contribution{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllContributions(){
            $db = $this->mysqli->con;
            $sql = "SELECT * FROM contributions 
            LEFT JOIN contribution_types on contributions.type = contribution_types.id 
            LEFT JOIN contacts ON contributions.contributor=contacts.id 
            LEFT JOIN contribution_statuses ON contributions.contribution_status=contribution_statuses.id 
            LEFT JOIN contribution_source_types ON contributions.contribution_source_type = contribution_source_types.id
            ORDER BY contributions.id DESC";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
    }
?>