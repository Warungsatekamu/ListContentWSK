<?php
    class ContributionRemark{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllContributionRemark(){
            $db = $this->mysqli->con;
            $sql = "SELECT * FROM contribution_remarks";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
    }
?>