<?php
    class Contribution{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllContributions($id=null, $contributor=null){
            $db = $this->mysqli->con;
            $sql = "SELECT contributions.id, contributions.title, contributions.received_date, contributions.message, contributions.content, contributions.language, contribution_receive_channels.channel_name, contribution_types.contribution_type_name, contacts.full_name, contributions.edit_link_url, contribution_source_types.contribution_source_type_name, contribution_statuses.contribution_status_name FROM contributions 
            LEFT JOIN contribution_types on contributions.type = contribution_types.id 
            LEFT JOIN contacts ON contributions.contributor=contacts.id 
            LEFT JOIN contribution_receive_channels ON contributions.received_via=contribution_receive_channels.id
            LEFT JOIN contribution_statuses ON contributions.contribution_status=contribution_statuses.id 
            LEFT JOIN contribution_source_types ON contributions.contribution_source_type = contribution_source_types.id";
            if($id != null){
                $sql .= " WHERE contributions.id = $id";
            } else if($contributor != null){
                $sql .= " WHERE contributions.contributor = $contributor";
            }
            $sql .= " ORDER BY contributions.id DESC";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function ShowAllContributionType($type = null){
            $db = $this->mysqli->con;
            $sql ="SELECT id, contribution_type_name from contribution_types";
            if($type != null){
                $sql .= " WHERE contribution_type_name = '$type'";
                $query = $db->query($sql) or die($db->error);
                $singleRow = mysqli_fetch_assoc($query);
                return $singleRow;
            }
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function ShowAllReceiveType($type = null){
            $db = $this->mysqli->con;
            $sql ="SELECT id, channel_name from contribution_receive_channels";
            if($type != null){
                $sql .= " WHERE channel_name = '$type'";
                $query = $db->query($sql) or die($db->error);
                $singleRow = mysqli_fetch_assoc($query);
                return $singleRow;
            }
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function ShowAllContributionSourceType($type = null){
            $db = $this->mysqli->con;
            $sql ="SELECT id, contribution_source_type_name from contribution_source_types";
            if($type != null){
                $sql .= " WHERE contribution_source_type_name = '$type'";
                $query = $db->query($sql) or die($db->error);
                $singleRow = mysqli_fetch_assoc($query);
                return $singleRow;
            }
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function ShowAllContributionStatus($status = null){
            $db = $this->mysqli->con;
            $sql ="SELECT id, contribution_status_name from contribution_statuses";
            if($status != null){
                $sql .= " WHERE contribution_status_name = '$status'";
                $query = $db->query($sql) or die($db->error);
                $singleRow = mysqli_fetch_assoc($query);
                return $singleRow;
            }
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        //insert new contribution to db
        public function InsertNewContribution($contributor, $title, $type, $message, $content, $language, $receivedDate, $receivedVia, $contributionSourceType, $contributionStatus, $editLink, $publishedLink){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO contributions VALUES ('', '', '$contributor', '$title', '$type', '$message', '$content', '$language', '$receivedDate', '$receivedVia', '$contributionSourceType', '$contributionStatus', '$editLink', '', '', '$publishedLink', 'active', '$date', '', '$date', '')";
            $query = $db->query($sql) or die($db->error);
        }
    }
?>