<?php
    class home_index extends controler{
        public $doituong;
    
        public function __construct()
        {
            $this->doituong = $this->model("homeModel");
        }
    
        public function home(){
            $this->view("home_index",["page"=>"home_view",
            "listRooms"=> $this->doituong->getListRoom()
            ]);
        }


        public function booking(){
            if(isset($_POST['btnBooking'])){
                $HoTen = $_POST['txtFullName'];
                $SDT = $_POST['txtPhoneNum'];
                $DC = $_POST['txtAddress'];
                $QueQuan = $_POST['txtHomeTown'];
                $Truong = $_POST['txtSchool'];
                $SoNguoi = $_POST['sltPerson'];
                $numRoom = $_POST['sltRoom'];
                $array_split_sophong = str_split($numRoom);
                $dem = 0;
                foreach ($array_split_sophong as $row) {
                    if($row == "/"){
                        break;
                    }
                    $dem++;
                }
                $SoPhong = substr($numRoom, 0, $dem);
                $NgayNhan = $_POST['txtCheckin'];
                if(empty($HoTen)||empty($SDT)||empty($DC)||empty($QueQuan)||empty($Truong)||empty($NgayNhan)){
                    $result = false;
                }
                else{
                    $arrNgayNhan = explode("-", $NgayNhan);
                    $NgayNhan = $arrNgayNhan[2]."/".$arrNgayNhan[1]."/".$arrNgayNhan[0];
                    $SoSV = $this->doituong->countSV();
                    //echo $SoPhong;
                    $SoSV = chop($SoSV,'"}]');
                    $SoSV = ltrim($SoSV,'[{"SoSV":"');
                    $SoSV = (int)$SoSV;
                    $MaSV = '';
                    if($SoSV <= 9){
                        $MaSV = "SV00".''.($SoSV+1);
                    }
                    else{
                        $MaSV = "SV0".''.($SoSV+1);
                    }
                    
                    $result = $this->doituong->Booking($MaSV, $HoTen, $SDT, $DC, $QueQuan, $Truong, $SoNguoi, 
                    $SoPhong, $NgayNhan);

                    $ChangeSttRoom = $this->doituong->BookedRoom($SoPhong);
                }
                $this->view("home_index",["page"=>"room_view",
                "result"=>$result,
                "listRooms"=> $this->doituong->getListRoom(),
                "listRoomsLine1"=> $this->doituong->getListRoomLine1(),
                "listRoomsLine2"=> $this->doituong->getListRoomLine2(),
                "listRoomsLine3"=> $this->doituong->getListRoomLine3()
                ]);
            }
        }
    }
?>