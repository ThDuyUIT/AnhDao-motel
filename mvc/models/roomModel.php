<?php
    class roomModel extends connectDB
    {
        function getListRoom(){
            $sql = "SELECT * FROM PHONG WHERE TrangThai = '0'";
            $result = $this->connect->query($sql);
            $listroom = array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $listroom [] = $row;
                }
            }
            else {
                echo "0 results";
            }
            return json_encode($listroom);
        }

        function getListRoomLine1(){
            $sql = "SELECT * FROM PHONG WHERE DayPhong = '1'";
            $result = $this->connect->query($sql);
            $listroom = array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $listroom [] = $row;
                }
            }
            else {
                echo "0 results";
            }
            return json_encode($listroom);
        }

        function getListRoomLine2(){
            $sql = "SELECT * FROM PHONG WHERE DayPhong = '2'";
            $result = $this->connect->query($sql);
            $listroom = array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $listroom [] = $row;
                }
            }
            else {
                echo "0 results";
            }
            return json_encode($listroom);
        }

        function getListRoomLine3(){
            $sql = "SELECT * FROM PHONG WHERE DayPhong = '3'";
            $result = $this->connect->query($sql);
            $listroom = array();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $listroom [] = $row;
                }
            }
            else {
                echo "0 results";
            }
            return json_encode($listroom);
        }
    }
    
?>