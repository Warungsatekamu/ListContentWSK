<?php
    
    class Atribute{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllAttribute($idContact=null, $idContribution=null, $category=null){
            $db = $this->mysqli->con;
            if($idContribution != null){
                $sql = "SELECT attribute_types.attribute_type_name, attribute_generic_values.attribute_generic_value_name, attributes.attribute_value FROM attributes
                LEFT JOIN contacts ON attributes.data_id=contacts.id 
                LEFT JOIN attribute_types on attributes.attribute_type = attribute_types.id 
                LEFT JOIN attribute_generic_values ON attributes.attribute_generic_value=attribute_generic_values.id
                WHERE attributes.attribute_for='contribution' AND attributes.data_id='$idContribution'
                ";
            } else if($idContact != null){
                $sql = "SELECT attribute_types.attribute_type_name, attribute_generic_values.attribute_generic_value_name, attributes.attribute_value FROM attributes
                LEFT JOIN contacts ON attributes.data_id=contacts.id 
                LEFT JOIN attribute_types on attributes.attribute_type = attribute_types.id 
                LEFT JOIN attribute_generic_values ON attributes.attribute_generic_value=attribute_generic_values.id
                WHERE attributes.attribute_for='contact' AND attributes.data_id='$idContact'
                ";
            } else if($category != null){
                if($category == 'contact'){
                    $sql = "SELECT attributes.data_id, contacts.full_name, attribute_types.attribute_type_name, attribute_generic_values.attribute_generic_value_name, attributes.attribute_value FROM attributes
                    LEFT JOIN contacts ON attributes.data_id=contacts.id 
                    LEFT JOIN attribute_types on attributes.attribute_type = attribute_types.id 
                    LEFT JOIN attribute_generic_values ON attributes.attribute_generic_value=attribute_generic_values.id 
                    WHERE attributes.attribute_for='$category'
                    ORDER BY contacts.full_name ASC
                    ";
                } else if($category == 'contribution'){
                    $sql = "SELECT attributes.data_id, contributions.title, contributions.contributor, contacts.full_name, attribute_types.attribute_type_name, attribute_generic_values.attribute_generic_value_name, attributes.attribute_value FROM attributes
                    LEFT JOIN contributions ON attributes.data_id=contributions.id 
                    LEFT JOIN contacts ON contributions.contributor=contacts.id 
                    LEFT JOIN attribute_types on attributes.attribute_type = attribute_types.id 
                    LEFT JOIN attribute_generic_values ON attributes.attribute_generic_value=attribute_generic_values.id
                    WHERE attributes.attribute_for='$category'
                    ";
                }
            }
            // if($id != null){
            //     $sql .= " WHERE contributions.id = $id";
            // } else if($contributor != null){
            //     $sql .= " WHERE contributions.contributor = $contributor";
            // }
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function ShowAllAttributeContact(){
            $db = $this->mysqli->con;
            $sql = "SELECT attributes.data_id, contacts.full_name, attribute_types.attribute_type_name, attribute_generic_values.attribute_generic_value_name, attributes.attribute_value FROM attributes
            LEFT JOIN contacts ON attributes.data_id=contacts.id 
            LEFT JOIN attribute_types on attributes.attribute_type = attribute_types.id 
            LEFT JOIN attribute_generic_values ON attributes.attribute_generic_value=attribute_generic_values.id
            ";
            // if($id != null){
            //     $sql .= " WHERE contributions.id = $id";
            // } else if($contributor != null){
            //     $sql .= " WHERE contributions.contributor = $contributor";
            // }
            $sql .= " WHERE attributes.attribute_for='contact' ORDER BY contacts.full_name ASC";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function ShowAllAttributeContribution(){
            $db = $this->mysqli->con;
            $sql = "SELECT attributes.data_id, contributions.title, contributions.contributor, contacts.full_name, attribute_types.attribute_type_name, attribute_generic_values.attribute_generic_value_name, attributes.attribute_value FROM attributes
            LEFT JOIN contributions ON attributes.data_id=contributions.id 
            LEFT JOIN contacts ON contributions.contributor=contacts.id 
            LEFT JOIN attribute_types on attributes.attribute_type = attribute_types.id 
            LEFT JOIN attribute_generic_values ON attributes.attribute_generic_value=attribute_generic_values.id
            ";
            // if($id != null){
            //     $sql .= " WHERE contributions.id = $id";
            // } else if($contributor != null){
            //     $sql .= " WHERE contributions.contributor = $contributor";
            // }
            $sql .= " WHERE attributes.attribute_for='contribution'";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        // public function ShowAllContributionType($type = null){
        //     $db = $this->mysqli->con;
        //     $sql ="SELECT id, contribution_type_name from contribution_types";
        //     if($type != null){
        //         $sql .= " WHERE contribution_type_name = '$type'";
        //         $query = $db->query($sql) or die($db->error);
        //         $singleRow = mysqli_fetch_assoc($query);
        //         return $singleRow;
        //     }
        //     $query = $db->query($sql) or die($db->error);
        //     return $query;
        // }

        // public function ShowAllReceiveType($type = null){
        //     $db = $this->mysqli->con;
        //     $sql ="SELECT id, channel_name from contribution_receive_channels";
        //     if($type != null){
        //         $sql .= " WHERE channel_name = '$type'";
        //         $query = $db->query($sql) or die($db->error);
        //         $singleRow = mysqli_fetch_assoc($query);
        //         return $singleRow;
        //     }
        //     $query = $db->query($sql) or die($db->error);
        //     return $query;
        // }

        // public function ShowAllContributionSourceType($type = null){
        //     $db = $this->mysqli->con;
        //     $sql ="SELECT id, contribution_source_type_name from contribution_source_types";
        //     if($type != null){
        //         $sql .= " WHERE contribution_source_type_name = '$type'";
        //         $query = $db->query($sql) or die($db->error);
        //         $singleRow = mysqli_fetch_assoc($query);
        //         return $singleRow;
        //     }
        //     $query = $db->query($sql) or die($db->error);
        //     return $query;
        // }

        // public function ShowAllContributionStatus($status = null){
        //     $db = $this->mysqli->con;
        //     $sql ="SELECT id, contribution_status_name from contribution_statuses";
        //     if($status != null){
        //         $sql .= " WHERE contribution_status_name = '$status'";
        //         $query = $db->query($sql) or die($db->error);
        //         $singleRow = mysqli_fetch_assoc($query);
        //         return $singleRow;
        //     } else{
        //         $query = $db->query($sql) or die($db->error);
        //         return $query;
        //     }
        // }

        // //insert new contribution to db
        // public function InsertNewContribution($contributor, $title, $type, $message, $content, $contentLink, $receivedDate, $receivedVia, $contributionSourceType, $contributionStatus, $editLink, $publishedLink){
        //     $date = date('Y-m-d H:i:s');
        //     $db = $this->mysqli->con;
        //     $sql = "INSERT INTO contributions VALUES ('', '', '$contributor', '$title', '$type', '$message', '$content', '$contentLink', '1', '$receivedDate', '$receivedVia', '$contributionSourceType', '$contributionStatus', '$editLink', '', '', '$publishedLink', 'active', '$date', '', '$date', '')";
        //     $query = $db->query($sql) or die($db->error);
        // }

        // //update contact data to db
        // public function UpdateContribution($id, $contributor, $title, $type, $message, $content, $contentLink, $language, $receivedDate, $receivedVia, $contributionSourceType, $contributionStatus, $editLink, $publishedLink){
        //     $date = date('Y-m-d H:i:s');
        //     $db = $this->mysqli->con;
        //     $sql = "UPDATE contributions 
        //     SET contributor = '$contributor',
        //     title = '$title', 
        //     type = '$type',
        //     message = '$message',
        //     content = '$content',
        //     content_link = '$contentLink',
        //     language = '$language',
        //     received_date = '$receivedDate',
        //     received_via = '$receivedVia',
        //     contribution_source_type = '$contributionSourceType',
        //     contribution_status = '$contributionStatus',
        //     edit_link_url = '$editLink',
        //     published_link_url = '$publishedLink',
        //     last_modified_time = '$date'
        //     WHERE id = $id";
        //     $query = $db->query($sql) or die($db->error);
        // }

        // //update contribution status after get remarked
        // public function UpdateStatusContribution($id, $contributionStatus){
        //     $date = date('Y-m-d H:i:s');
        //     $db = $this->mysqli->con;
        //     $sql = "UPDATE contributions 
        //     SET contribution_status = '$contributionStatus',
        //     last_modified_time = '$date'
        //     WHERE id = $id";
        //     $query = $db->query($sql) or die($db->error);
        // }

        // //Delete contribution by id from hasil karya page
        // public function DeleteContribution($id){
        //     $db = $this->mysqli->con;
        //     $sql = "DELETE FROM contributions WHERE id = $id";
        //     $query = $db->query($sql) or die($db->error);
        // }
    }
?>