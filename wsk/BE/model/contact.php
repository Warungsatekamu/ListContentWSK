<?php
    class Contact{
        private $mysqli;
        
        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowContact($id=null){
            $db = $this->mysqli->con;
            $sql = "SELECT contacts.id, contacts.full_name, contacts.nick_name, contacts.birthdate, contacts.phone, contacts.address, contacts.gender, cities.city_name, contacts.email, contacts.bio, contacts.created_time FROM contacts 
            LEFT JOIN cities ON contacts.city = cities.id";
            if($id != null){
                $sql .= " WHERE contacts.id = $id";
            }
            $sql .= " ORDER BY contacts.id DESC";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function InsertNewContact($full_name, $nick_name, $gender, $email, $bio, $birthdate, $phone, $address, $city){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO contacts VALUES ('', '$full_name', '$nick_name', '$gender', '$email', '$birthdate', '$bio', '$phone', '$address', '$city', 'active', '$date', '', '$date', '')";
            $query = $db->query($sql) or die($db->error);
        }

        public function UpdateContact(){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "UPDATE contacts SET ";
            $query = $db->query($sql) or die($db->error);
        }

        public function DeleteContact($id){
            $db = $this->mysqli->con;
            $sql = "DELETE FROM contacts WHERE id = $id";
            $query = $db->query($sql) or die($db->error);
        }
    }
?>