<?php
    class Contact{
        private $mysqli;
        
        function __construct($con){
            $this->mysqli = $con;
        }
        
        //get contact data for contact list
        public function ShowContact($id=null, $fullname=null){
            $db = $this->mysqli->con;
            $sql = "SELECT contacts.id, contacts.full_name, contacts.nick_name, contacts.birthdate, contacts.phone, contacts.address, contacts.gender, cities.city_name, contacts.email, contacts.bio, contacts.created_time FROM contacts 
            LEFT JOIN cities ON contacts.city = cities.id";
            if($id != null){
                $sql .= " WHERE contacts.id = $id";
            } else if($fullname != null){
                $sql .= " WHERE contacts.full_name = '$fullname'";
                $query = $db->query($sql) or die($db->error);
                $singleRow = mysqli_fetch_assoc($query);
                return $singleRow;
            }
            $sql .= " ORDER BY contacts.id DESC";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        //insert new contact to db
        public function InsertNewContact($full_name, $nick_name, $gender, $email, $bio, $birthdate, $phone, $address, $city, $createdBy){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO contacts (full_name, nick_name, gender, email, birthdate, bio, phone, address, city, status, created_time, created_by, last_modified_time, last_modified_by) VALUES ('$full_name', '$nick_name', '$gender', '$email', '$birthdate', '$bio', '$phone', '$address', '$city', 'active', '$date', '$createdBy', '$date', '$createdBy')";
            $query = $db->query($sql) or die($db->error);
        }

        //update contact data to db
        public function UpdateContact($id, $full_name, $nick_name, $gender, $email, $bio, $birthdate, $phone, $address, $city, $editor){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "UPDATE contacts 
            SET full_name = '$full_name',
            nick_name = '$nick_name', 
            gender = '$gender',
            email = '$email',
            birthdate = '$birthdate',
            bio = '$bio',
            phone = '$phone',
            address = '$address',
            last_modified_time = '$date',
            last_modified_by = '$editor',
            city = '$city'
            WHERE id = $id";
            $query = $db->query($sql) or die($db->error);
        }

        //DElete contact by id from contact list
        public function DeleteContact($id){
            $db = $this->mysqli->con;
            $sql = "DELETE FROM contacts WHERE id = $id";
            $query = $db->query($sql) or die($db->error);
        }
    }
?>