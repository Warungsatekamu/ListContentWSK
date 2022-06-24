<?php
    class Contact{
        private $mysqli;

        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllContact(){
            $db = $this->mysqli->con;
            $sql = "SELECT * FROM contacts 
            LEFT JOIN cities ON contacts.city = cities.id 
            ORDER BY contacts.id DESC";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function InsertNewContact($full_name, $nick_name, $gender, $email, $bio, $birthdate, $phone, $address, $city){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO contacts VALUES ('', '$full_name', '$nick_name', '$gender', '$email', '$birthdate', '$bio', '$phone', '$address', '$city', 'active', '$date', '', '$date', '')";
            $query = $db->query($sql) or die($db->error);
        }
    }
?>