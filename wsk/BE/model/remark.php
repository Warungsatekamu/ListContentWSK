<?php
    

    class ContributionRemark{
        private $mysqli;
        
        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllContributionRemark($idContribution=null){
            require_once('contribution.php');
            $db = $this->mysqli->con;
            $sql = "SELECT contribution_remarks.id, contributions.title, contribution_remark_types.remark_type_name, contribution_remarks.action_time, contribution_remarks.remark, contacts.nick_name FROM contribution_remarks 
            LEFT JOIN contributions ON contribution_remarks.contribution = contributions.id 
            LEFT JOIN contribution_remark_types ON contribution_remarks.remark_type=contribution_remark_types.id
            LEFT JOIN contacts ON contribution_remarks.created_by=contacts.id";
            if($idContribution != null){
                $sql .= " WHERE contribution = '$idContribution'";
                $sql .= " ORDER BY action_time ASC";
                $query = $db->query($sql) or die($db->error);
                return $query;
            }
            $sql .= " ORDER BY contribution_remarks.id DESC";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function InsertNewContributionRemark($idContribution, $actionTime, $remarkType, $remark){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO contribution_remarks VALUES ('', '$idContribution', '$remarkType', '$remark', '$actionTime', 'active', '$date', '', '$date', '')";
            $query = $db->query($sql) or die($db->error);
            $contributionStatus = $this->ShowAllRemarkType(null, $remarkType);
            $contributionStatusId=$contributionStatus['linked_status']; 
            $contribution = new Contribution($this->mysqli);
            $contribution->UpdateStatusContribution($idContribution, $contributionStatusId);
        }
        
        //Delete Contribuion remark by id
        public function DeleteContributionRemark($id){
            $db = $this->mysqli->con;
            $sql = "DELETE FROM contribution_remarks WHERE id = $id";
            $query = $db->query($sql) or die($db->error);
        }

        public function ShowAllRemarkType($name=null, $remarkType=null){
            $db = $this->mysqli->con;
            if($remarkType != null){
                $sql = "SELECT linked_status FROM contribution_remark_types WHERE id = $remarkType";
                $query = $db->query($sql) or die($db->error);
                $singleRow = mysqli_fetch_assoc($query);
                return $singleRow;
            } else if($name != null){
                $sql = "SELECT id FROM contribution_remark_types WHERE remark_type_name = '$name'";
                $query = $db->query($sql) or die($db->error);
                $singleRow = mysqli_fetch_assoc($query);
                return $singleRow;
            } else {
                $sql = "SELECT id, remark_type_name FROM contribution_remark_types 
                ORDER BY id ASC";
                $query = $db->query($sql) or die($db->error);
                return $query;
            }
        }

        public function InsertNewRemarkType($remarkType, $linkedStatus){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO contribution_remark_types VALUES ('', '$remarkType', '$linkedStatus', '', '', '', 'active', '$date', '', '$date', '')";
            $query = $db->query($sql) or die($db->error);
        }

        //Delete remark Type by id
        public function DeleteRemarkType($id){
            $db = $this->mysqli->con;
            $sql = "DELETE FROM contribution_remark_types WHERE id = $id";
            $query = $db->query($sql) or die($db->error);
        }
    }
?>