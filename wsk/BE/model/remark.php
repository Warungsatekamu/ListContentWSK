<?php
    class ContributionRemark{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllContributionRemark(){
            $db = $this->mysqli->con;
            $sql = "SELECT * FROM contribution_remarks 
            LEFT JOIN contributions ON contribution_remarks.contribution = contributions.id 
            LEFT JOIN contribution_remark_types ON contribution_remarks.remark_type=contribution_remark_types.id
            LEFT JOIN contacts ON contribution_remarks.created_by=contacts.id
            ORDER BY contribution_remarks.id DESC";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
    }
?>