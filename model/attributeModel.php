<?php
    
    class Atribute{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllAttribute($idContact=null, $idContribution=null, $category=null){
            $db = $this->mysqli->con;
            if($idContribution != null){
                $sql = "SELECT attributes.id, attribute_types.attribute_type_name, attribute_generic_values.attribute_generic_value_name, attributes.attribute_value FROM attributes
                LEFT JOIN contacts ON attributes.data_id=contacts.id 
                LEFT JOIN attribute_types on attributes.attribute_type = attribute_types.id 
                LEFT JOIN attribute_generic_values ON attributes.attribute_generic_value=attribute_generic_values.id
                WHERE attributes.attribute_for='contribution' AND attributes.data_id='$idContribution'
                ";
            } else if($idContact != null){
                $sql = "SELECT attributes.id, attribute_types.attribute_type_name, attribute_generic_values.attribute_generic_value_name, attributes.attribute_value FROM attributes
                LEFT JOIN contacts ON attributes.data_id=contacts.id 
                LEFT JOIN attribute_types on attributes.attribute_type = attribute_types.id 
                LEFT JOIN attribute_generic_values ON attributes.attribute_generic_value=attribute_generic_values.id
                WHERE attributes.attribute_for='contact' AND attributes.data_id='$idContact'
                ";
            } else if($category != null){
                if($category == 'contact'){
                    $sql = "SELECT attributes.id, attributes.data_id, contacts.full_name, attribute_types.attribute_type_name, attribute_generic_values.attribute_generic_value_name, attributes.attribute_value FROM attributes
                    LEFT JOIN contacts ON attributes.data_id=contacts.id 
                    LEFT JOIN attribute_types on attributes.attribute_type = attribute_types.id 
                    LEFT JOIN attribute_generic_values ON attributes.attribute_generic_value=attribute_generic_values.id 
                    WHERE attributes.attribute_for='$category'
                    ORDER BY contacts.full_name ASC
                    ";
                } else if($category == 'contribution'){
                    $sql = "SELECT attributes.id, attributes.data_id, contributions.title, contributions.contributor, contacts.full_name, attribute_types.attribute_type_name, attribute_generic_values.attribute_generic_value_name, attributes.attribute_value FROM attributes
                    LEFT JOIN contributions ON attributes.data_id=contributions.id 
                    LEFT JOIN contacts ON contributions.contributor=contacts.id 
                    LEFT JOIN attribute_types on attributes.attribute_type = attribute_types.id 
                    LEFT JOIN attribute_generic_values ON attributes.attribute_generic_value=attribute_generic_values.id
                    WHERE attributes.attribute_for='$category'
                    ";
                }
            }
            $query = $db->query($sql) or die($db->error);
            return $query;
        }


        public function ShowAllAttributeType($attributeFor=null, $type = null){
            $db = $this->mysqli->con;
            $sql ="SELECT id, attribute_type_name from attribute_types";
            if($type != null){
                $sql .= " WHERE attribute_type_name = '$type'";
                $query = $db->query($sql) or die($db->error);
                $singleRow = mysqli_fetch_assoc($query);
                return $singleRow;
            }else{
                $sql .= " WHERE attribute_for = '$attributeFor' ORDER BY attribute_type_name ASC";
                $query = $db->query($sql) or die($db->error);
                return $query;
            }
        }

        public function ShowAllAttributeCategory($category = null){
            $db = $this->mysqli->con;
            $sql ="SELECT id, attribute_generic_value_name from attribute_generic_values";
            if($category != null){
                $sql .= " WHERE attribute_generic_value_name = '$category'";
                $query = $db->query($sql) or die($db->error);
                $singleRow = mysqli_fetch_assoc($query);
                return $singleRow;
            }else{
                $sql .= " ORDER BY attribute_generic_value_name ASC";
                $query = $db->query($sql) or die($db->error);
                return $query;
            }
        }

        public function ShowAllAttributeCategoryType($categoryType = null){
            $db = $this->mysqli->con;
            $sql ="SELECT id, attribute_generic_value_type_name from attribute_generic_value_types";
            if($categoryType != null){
                $sql .= " WHERE attribute_generic_value_type_name = '$categoryType'";
                $query = $db->query($sql) or die($db->error);
                $singleRow = mysqli_fetch_assoc($query);
                return $singleRow;
            }else{
                $sql .= " ORDER BY attribute_generic_value_type_name ASC";
                $query = $db->query($sql) or die($db->error);
                return $query;
            }
        }

        //insert new attribute to db
        public function InsertNewAttribute($attributeFor, $dataId, $attributeType, $attributeGenericValue, $attributeValue, $createdBy){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO attributes (attribute_for, data_id, attribute_type, attribute_generic_value, attribute_value, status, created_time, created_by, last_modified_time, last_modified_by) VALUES ('$attributeFor', '$dataId', '$attributeType', '$attributeGenericValue', '$attributeValue','active', '$date', '$createdBy', '$date', '$createdBy')";
            $query = $db->query($sql) or die($db->error);
        }

        //insert new attribute type to db
        public function InsertNewAttributeType($attributeTypeName, $attributeFor, $attributeGenericValueType, $createdBy){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO attribute_types (attribute_type_name, attribute_for, attribute_generic_value_type, status, created_time, created_by, last_modified_time, last_modified_by) VALUES ('$attributeTypeName', '$attributeFor', '$attributeGenericValueType', 'active', '$date', '$createdBy', '$date', '$createdBy')";
            $query = $db->query($sql) or die($db->error);
        }

        //insert new attribute type to db
        public function InsertNewAttributeGenericValueType($attributeGenericValueTypeName, $createdBy){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO attribute_generic_value_types (attribute_generic_value_type_name, status, created_time, created_by, last_modified_time, last_modified_by) VALUES ('$attributeGenericValueTypeName', 'active', '$date', '$createdBy', '$date', '$createdBy')";
            $query = $db->query($sql) or die($db->error);
        }

        //update contact data to db
        public function UpdateAttribute($id, $attributeType, $attributeGenericValue, $attributeValue, $editor){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "UPDATE attributes 
            SET attribute_type = '$attributeType',
            attribute_generic_value = '$attributeGenericValue', 
            attribute_value = '$attributeValue', 
            last_modified_time = '$date',
            last_modified_by = '$editor'
            WHERE id = $id";
            $query = $db->query($sql) or die($db->error);
        }

        //Delete contribution by id from hasil karya page
        public function DeleteAttribute($id){
            $db = $this->mysqli->con;
            $sql = "DELETE FROM attributes WHERE id = $id";
            $query = $db->query($sql) or die($db->error);
        }
    }
?>