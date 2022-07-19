<?php
    class City{
        private $mysqli;
        function __construct($con){
            $this->mysqli = $con;
        }

        //get all city name from db
        public function ShowAllCityName(){
            $db = $this->mysqli->con;
            $sql = "SELECT id, city_name FROM cities ORDER BY city_name ASC";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }
        
        //insert new city to db
        public function InsertNewCity($cityName, $province, $createdBy){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO cities (city_name. province, country, status, created_time, created_by, last_modified_time, last_modified_by) VALUES ('$cityName', '$province', 'Indonesia', 'active' , '$date', '$createdBy', '$date', '$createdBy')";
            $query = $db->query($sql) or die($db->error);
        }

        //get city id by name
        public function selectCityId($name){
            $db = $this->mysqli->con;
            $sql = "SELECT id FROM cities WHERE city_name='$name'";
            $query = $db->query($sql) or die($db->error);
            $singleRow = mysqli_fetch_assoc($query);
            return $singleRow;
        }

    }
?>