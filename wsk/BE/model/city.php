<?php
    class City{
        private $mysqli;
        function __construct($con){
            $this->mysqli = $con;
        }

        public function ShowAllCityName(){
            $db = $this->mysqli->con;
            $sql = "SELECT id, city_name FROM cities ORDER BY city_name ASC";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        public function InsertNewCity($cityName, $province){
            $date = date('Y-m-d H:i:s');
            $db = $this->mysqli->con;
            $sql = "INSERT INTO cities VALUES ('', '$cityName', '$province', 'Indonesia', 'active' , '$date', '', '$date', '')";
            $query = $db->query($sql) or die($db->error);
        }

        public function selectCityId($id){
            $db = $this->mysqli->con;
            $sql = "SELECT id FROM cities WHERE city_name='$id'";
            $query = $db->query($sql) or die($db->error);
            $singleRow = mysqli_fetch_assoc($query);
            return $singleRow;
        }

    }
?>