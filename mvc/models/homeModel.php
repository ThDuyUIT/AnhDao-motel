<?php
    class homeModel extends connectDB{
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

        function countSV()
        {
            $sql = "SELECT COUNT(*) SoSV FROM sinhvien";
            $result = $this->connect->query($sql);
            $SoSV = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $SoSV [] = $row;
                }
            }else{
                echo "0 results";
            }
            return json_encode($SoSV);
        }

        function Booking($MaSV, $HoTen, $SDT, $DC, $QueQuan, $Truong, $SoNguoi, $SoPhong, $NgayNhan){
            $sql = "INSERT INTO sinhvien(MaSV, TenSV, SDT, QueQuan, DiaChiThuongTru, Truong, SoPhong, NgayNhanPhong)
            VALUES('$MaSV', '$HoTen', '$SDT', '$QueQuan', '$DC', '$Truong', '$SoPhong', '$NgayNhan')";

            $result = $this->connect->query($sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        function BookedRoom($SoPhong){
            $sql = "UPDATE phong SET TrangThai = 1 WHERE SoPhong = '$SoPhong'";
            $result = $this->connect->query($sql);
            if($result){
                return true;
            }else{
                return false;
            }
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