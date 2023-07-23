<?php
class adminModel extends connectDB{
    public function check_login($username, $pass){
        $sql = "SELECT * FROM administrator WHERE username = '$username' AND pass = '$pass'";
        $result = $this->connect->query($sql);
        $User = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $User[] = $row;
            }
        }else{
            return false;
        }
        return $User;
    }

    public function newpass($username, $newpass, $confirmcode){
        $sql = "UPDATE administrator SET pass = $newpass WHERE username = '$username' AND conformcode = '$confirmcode'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function getListSV(){
        $sql = "SELECT * FROM SINHVIEN WHERE XacNhan = 0";
        $result = $this->connect->query($sql);
        $sv = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $sv[] = $row;
            }
        }else{
            return false;
        }
        return json_encode($sv);
    }

    public function validation($masv){
        $sql = "UPDATE sinhvien SET XacNhan = 1 WHERE MaSV = '$masv'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function invalidation($masv){
        $sql = "DELETE FROM sinhvien WHERE MaSV = '$masv'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function count_Roomer($sophong){
        $sql = "SELECT COUNT(*) SoNguoiThue FROM sinhvien GROUP BY SoPhong HAVING SoPhong ='$sophong'";
        $result = $this->connect->query($sql);
        if($result->num_rows>0){
            return false;
        }
        return true;
    }

    public function updateStatusRoom($sophong)
    {
        $sql = "UPDATE phong SET TrangThai = 0 WHERE SoPhong = '$sophong'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function countRooms(){
        $sql = "SELECT COUNT(*) TongSP FROM phong";
        $result = $this->connect->query($sql);
        $totalRooms = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $totalRooms [] = $row;
            }
        }else{
            return false;
        }
        return json_encode($totalRooms);
    }

    public function countBookedRooms(){
        $sql = "SELECT COUNT(*) SPThue FROM phong WHERE TrangThai = 1";
        $result = $this->connect->query($sql);
        $totalBookedRooms = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $totalBookedRooms [] = $row;
            }
        }else{
            return false;
        }
        return json_encode($totalBookedRooms);
    }

    public function countStudents(){
        $sql = "SELECT COUNT(*) TongSV FROM sinhvien WHERE XacNhan = 1";
        $result = $this->connect->query($sql);
        $totalConformedStudent = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $totalConformedStudent [] = $row;
            }
        }else{
           return false;
        }
        return json_encode($totalConformedStudent);
    }

    public function getNewMessage(){
        $sql = "SELECT * FROM tinnhan WHERE TrangThai = 0";
        $result = $this->connect->query($sql);
        $listMessage = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $listMessage [] = $row;
            }
        }else{
           return false;
        }
        return json_encode($listMessage);
    }

    public function countNewMessage(){
        $sql = "SELECT COUNT(*) TinNhanMoi FROM tinnhan WHERE TrangThai = 0";
        $result = $this->connect->query($sql);
        $newMessage = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $newMessage [] = $row;
            }
        }else{
            echo false;
        }
        return json_encode($newMessage);
    }

    public function updateMessStatus($maTN){
        $sql = "UPDATE tinnhan SET TrangThai = 1 WHERE MaTN = '$maTN'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function getoneMess($maTN){
        $sql = "SELECT * FROM tinnhan WHERE MaTN = '$maTN'";
        $result = $this->connect->query($sql);
        $Mess = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $Mess [] = $row;
            }
        }else{
            echo false;
        }
        return json_encode($Mess);
    }

    public function deleteMessage($maTN){
        $sql = "DELETE FROM tinnhan WHERE MaTN = '$maTN'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function getOldMessage(){
        $sql = "SELECT * FROM tinnhan WHERE TrangThai = 1";
        $result = $this->connect->query($sql);
        $listMessage = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $listMessage [] = $row;
            }
        }else{
            return false;
        }
        return json_encode($listMessage);
    }

    public function add_NewStudent($MaSV, $name, $Phone, $Id, $Home, $Address, $School, $Room, $Checkin){
        $sql = "INSERT INTO sinhvien(MaSV, TenSV, SDT, CCCD, QueQuan, DiaChiThuongTru, Truong, SoPhong, NgayNhanPhong) 
        VALUES ('$MaSV', '$name', '$Phone', '$Id', '$Home', '$Address', '$School', '$Room', '$Checkin')";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function listAvailableRooms(){
        $sql = "SELECT room.SoPhong FROM phong room 
        JOIN sinhvien sv WHERE room.SoPhong = sv.SoPhong 
        GROUP BY room.SoPhong, room.SucChua 
        HAVING COUNT(sv.MaSV) < room.SucChua 
        UNION 
        SELECT SoPhong FROM phong WHERE TrangThai = 0";
        $result = $this->connect->query($sql);
        $listRooms = [];
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $listRooms [] = $row;       
            }
        }else{
            return false;
        }
        return json_encode($listRooms);
    }

    public function getValidedStutents(){
        $sql = "SELECT * FROM SINHVIEN WHERE XacNhan = 1";
        $result = $this->connect->query($sql);
        $sv = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $sv[] = $row;
            }
        }else{
            return false;
        }
        return json_encode($sv);
    }

    public function getdetailStudent($maSV){
        $sql = "SELECT * FROM SINHVIEN WHERE MaSV = '$maSV'";
        $result = $this->connect->query($sql);
        $sv = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $sv[] = $row;
            }
        }else{
            return false;
        }
        return json_encode($sv);
    }

    public function updateInfoStudent($MaSV, $HoTen, $SDT, $CCCD, $DC, $QueQuan, $Truong, $SoPhong, $NgayNhan){
        $sql = "UPDATE sinhvien SET TenSV ='$HoTen', SDT='$SDT',CCCD='$CCCD',QueQuan='$QueQuan', DiaChiThuongTru='$DC',Truong='$Truong',SoPhong='$SoPhong', NgayNhanPhong='$NgayNhan' WHERE MaSV = '$MaSV'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function deleteStudent($maSV){
        $sql = "DELETE FROM sinhvien WHERE MaSV = '$maSV'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function countNumberRooms(){
        $sql = "SELECT COUNT(*) TongSP FROM phong";
        $result = $this->connect->query($sql);
        $totalNumberRooms = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $totalNumberRooms [] = $row;
            }
        }else{
           return 0;
        }
        return json_encode($totalNumberRooms);
    }

    public function addNewRoom($sophong, $succhua, $kindroom, $stt, $price, $string){
        $sql = "INSERT INTO phong(SoPhong, SucChua, LoaiPhong, TrangThai, Gia, DayPhong) 
        VALUES('$sophong', '$succhua', '$kindroom', '$stt', '$price', '$string')";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function listRooms(){
        $sql = "SELECT * FROM phong";
        $result = $this->connect->query($sql);
        $list = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $list[] = $row;
            }
        }else{
            return false;
        }
        return json_encode($list);
    }

    public function getdetailRoom($soPhong){
        $sql = "SELECT * FROM phong WHERE SoPhong = '$soPhong'";
        $result = $this->connect->query($sql);
        $room = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $room[] = $row;
            }
        }else{
            return false;
        }
        return json_encode($room);
    }

    public function updateInfoRoom($sophong, $succhua, $kindroom, $stt, $price, $string){
        $sql = "UPDATE phong SET SucChua='$succhua', LoaiPhong='$kindroom', TrangThai='$stt',
        Gia='$price', DayPhong = '$string'
        WHERE SoPhong = '$sophong'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function deleteRoom($soPhong){
        $sql = "DELETE FROM phong WHERE SoPhong = '$soPhong'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function getYear(){
        $sql = "SELECT Nam, Thang FROM hoadon GROUP BY Nam, Thang";
        $result = $this->connect->query($sql);
        $list_year = [];
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $list_year [] = $row;
            }
        }else{
            return false;
        }
        return json_encode($list_year);

    }

    public function addNewRecript($ma, $month, $name, $year){
        $sql = "INSERT INTO hoadon(MaHD, Thang, TenHD, Nam) VALUES('$ma', '$month', '$name', '$year')";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function listReceipts(){
        $sql = "SELECT * FROM hoadon";
        $result = $this->connect->query($sql);
        $list = [];
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $list [] = $row;
            }
        }else{
            return false;
        }
        return json_encode($list);
    }

    public function detailReceipts(){
        $sql = "SELECT * FROM cthd JOIN hoadon HD WHERE cthd.MaHD = HD.MaHD";
        $result = $this->connect->query($sql);
        $list = [];
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $list [] = $row;
            }
        }else{
            return false;
        }
        return json_encode($list);
    }

    public function getdetailReceipt($ma){
        $sql = "SELECT * FROM cthd JOIN hoadon HD WHERE cthd.MaHD = HD.MaHD AND cthd.MaHD = '$ma'";
        $result = $this->connect->query($sql);
        $list = [];
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $list [] = $row;
            }
        }else{
            return false;
        }
        return json_encode($list);
    }

    public function updateInfoReceipt($ma, $sophong, $numelectric, $numwater, $cleaning, $safe, $debt, $note){
        $sql = "UPDATE cthd SET ChiSoDien = '$numelectric', ChiSoNuoc = '$numwater', VeSinh = '$cleaning', 
        DanPhong = '$safe', TienNo = '$debt', GhiChu = '$note' WHERE MaHD = '$ma'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function deleteReceipt($ma){
        $sql = "DELETE FROM cthd WHERE MaHD = '$ma'";
        $result = $this->connect->query($sql);
        if($result){
            return true;
        }
        return false;
    }

    public function getReceipts(){
        $sql = "SELECT * FROM hoadon ";
        $result = $this->connect->query($sql);
        $list = [];
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $list [] = $row;
            }
        }else{
            return false;
        }
        return json_encode($list);
    }

    public function addNewdetailReceipt($ma, $sophong, $numelectric, $numwater, $cleaning, $price, $safe, $debt, $note){
        $sql = "INSERT INTO cthd(MaHD, SoPhong, ChiSoDien, ChiSoNuoc, TienPhong, VeSinh, DanPhong, TienNo, GhiChu)
        VALUES ('$ma', '$sophong', '$numelectric', '$numwater', '$price', '$cleaning', '$safe', '$debt', '$note')";
        $result = $this->connect->query($sql);
        if($result)
            return true;
        else 
            return false;
    }

    public function getYears(){
        $sql = "SELECT Nam FROM hoadon GROUP BY Nam";
        $result = $this->connect->query($sql);
        $list = [];
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $list [] = $row;
            }
        }else{
            return false;
        }
        return json_encode($list);
    }

    public function check_time($year, $month){
        $sql = "SELECT * FROM hoadon WHERE Nam = '$year' AND Thang = '$month'";
        $result = $this->connect->query($sql);
        $list = [];
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $list [] = $row;
            }
        }else{
            return false;
        }
        return json_encode($list);
    }

    public function exportReceipt($ma1, $ma2){
        $sql = "SELECT ct1.ChiSoDien as ChiSoDienMoi, ct1.ChiSoNuoc as ChiSoNuocMoi, ct1.TienPhong as tienphong
        , ct1.VeSinh as vesinh, ct1.DanPhong as danphong, ct1.TienNo as tienno, 
        ct2.ChiSoDien as ChiSoDienCu, ct2.ChiSoNuoc as ChiSoNuocCu
        FROM cthd ct1 join cthd ct2 WHERE ct1.SoPhong = ct2.SoPhong AND ct1.MaHD = '$ma1'
        AND ct2.MaHD = '$ma2'";
        $result = $this->connect->query($sql);
        $list = [];
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                $list [] = $row;
            }
        }else{
            return false;
        }
        return json_encode($list);
    }
}
?>