<?php
    class ContributionRemark{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllContributionRemark(){
            $db = $this->mysqli->con;
            $sql = "SELECT * FROM contribution_remarks 
            JOIN contributions ON contribution_remarks.contribution=contributions.id 
            JOIN contribution_remark_types ON contribution_remarks.remark_type=contribution_remark_types.id
            -- JOIN contacts ON contribution_remarks.created_by=contacts.id
            ";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
    }
?>