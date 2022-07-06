<?php
    class User{
        private $mysqli;
        
        function __construct($con){
            $this->mysqli = $con;
        }
        
        //get contact data for contact list
        public function ShowUser($id=null, $username=null){
            $db = $this->mysqli->con;
            $sql = "SELECT user.id, user.username, user.nama, user.password, user.level FROM user 
            if($id != null){
                $sql .= " WHERE user.id = $id";
            } else if($username != null){
                $sql .= " WHERE user.username= '$fusername'";
                $query = $db->query($sql) or die($db->error);
                $singleRow = mysqli_fetch_assoc($query);
                return $singleRow;
            }
            $sql .= " ORDER BY user.id DESC";
            $query = $db->query($sql) or die($db->error);
            return $query;
        }

        
    }
?>