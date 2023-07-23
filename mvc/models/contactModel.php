<?php
    class contactModel extends connectDB{
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

        function sendMessage($MaTN, $HoTen, $SDT, $Email, $NoiDung){
            $sql = "INSERT INTO tinnhan(MaTN, HoTen, SDT, Email, NoiDung) 
            VALUES('$MaTN', '$HoTen', '$SDT', '$Email', '$NoiDung')";
            $result = $this->connect->query($sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>