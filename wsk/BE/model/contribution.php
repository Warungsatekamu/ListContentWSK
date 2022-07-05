<?php
    
    class Contribution{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllContributions($id=null, $contributor=null){
            $db = $this->mysqli->con;
            $sql = "SELECT contributions.id, contributions.title, contributions.received_date, contributions.message, contributions.content, contributions.language, contribution_receive_channels.channel_name, contribution_types.contribution_type_name, contacts.full_name, contributions.edit_link_url, contribution_source_types.contribution_source_type_name, contribution_statuses.contribution_status_name, contributions.published_link_url, contributions.content_link FROM contributions 
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
            } else{
                $query = $db->query($sql) or die($db->error);
                return $query;
            }
        }

        //insert new contribution to db
        public function InsertNewContribution($contributor, $title, $type, $message, $content, $contentLink, $language, $receivedDate, $receivedVia, $contributionSourceType, $contributionStatus, $editLink, $publishedLink){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO contributions VALUES ('', '', '$contributor', '$title', '$type', '$message', '$content', '$contentLink', '$language', '$receivedDate', '$receivedVia', '$contributionSourceType', '$contributionStatus', '$editLink', '', '', '$publishedLink', 'active', '$date', '', '$date', '')";
            $query = $db->query($sql) or die($db->error);
        }

        //update contact data to db
        public function UpdateContribution($id, $contributor, $title, $type, $message, $content, $contentLink, $language, $receivedDate, $receivedVia, $contributionSourceType, $contributionStatus, $editLink, $publishedLink){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "UPDATE contributions 
            SET contributor = '$contributor',
            title = '$title', 
            type = '$type',
            message = '$message',
            content = '$content',
            content_link = '$contentLink',
            language = '$language',
            received_date = '$receivedDate',
            received_via = '$receivedVia',
            contribution_source_type = '$contributionSourceType',
            contribution_status = '$contributionStatus',
            edit_link_url = '$editLink',
            published_link_url = '$publishedLink',
            last_modified_time = '$date'
            WHERE id = $id";
            $query = $db->query($sql) or die($db->error);
        }

        //update contribution status after get remarked
        public function UpdateStatusContribution($id, $contributionStatus){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "UPDATE contributions 
            SET contribution_status = '$contributionStatus',
            last_modified_time = '$date'
            WHERE id = $id";
            $query = $db->query($sql) or die($db->error);
        }

        //Delete contribution by id from hasil karya page
        public function DeleteContribution($id){
            $db = $this->mysqli->con;
            $sql = "DELETE FROM contributions WHERE id = $id";
            $query = $db->query($sql) or die($db->error);
        }
    }
?>