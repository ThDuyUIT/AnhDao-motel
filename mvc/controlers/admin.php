<?php
    class admin extends controler
    {
        public $doituong;
        public $doituong2;

        public function __construct(){
            $this->doituong = $this->model("adminModel");
            $this->doituong2 = $this->model("homeModel");
        }

        public function home(){
            if(isset($_SESSION["username"])){
                $this->view("admin_index",["page"=>"index",
                "list_sv"=> $this->doituong->getListSV(),
                "count_rooms" => $this->doituong->countRooms(),
                "count_bookedrooms" =>  $this->doituong->countBookedRooms(),
                "count_students" =>  $this->doituong->countStudents(),
                "count_newmessage" => $this->doituong->countNewMessage()
                ]);
            }else{
                if(isset($_POST["btnLogin"])){
                    $username = $_POST["txtUsername"];
                    $password = $_POST["txtPass"];

                    $result = $this->doituong->check_login($username, $password);
                    
                    if($result == false){
                        $this->view("admin_login",["page"=>"login"]);
                    }else{
                        foreach ($result as $row) {
                            $_SESSION["username"] = $row["username"];
                        }

                        $this->view("admin_index",["page"=>"index",
                        "list_sv"=> $this->doituong->getListSV(),
                        "count_rooms" => $this->doituong->countRooms(),
                        "count_bookedrooms" =>  $this->doituong->countBookedRooms(),
                        "count_students" =>  $this->doituong->countStudents(),
                        "count_newmessage" => $this->doituong->countNewMessage()
                        ]);
                    }
                }else{
                    $this->view("admin_login",["page"=>"login"]);
                }
            }
        }

        public function logout(){
            if(isset($_SESSION["username"])){
                unset($_SESSION["username"]);
                $this->view("admin_login",["page"=>"login"]);
            }
        }

        public function change_pass(){
            if(isset($_POST["btnChangepass"])){
                $username = $_POST["txtUsername"];
                $newpass = $_POST["txtNewPass"];
                $confirmcode = $_POST["txtCodeConform"];

                $result = $this->doituong->newpass($username, $newpass, $confirmcode);
                $this->view("admin_login",["page"=>"login"]);
            }
        }

        public function validate_reservation($masv){
            $this->view("admin_index",["page"=>"index",
            "result_valid" => $this->doituong->validation($masv),
            "list_sv"=> $this->doituong->getListSV(),
            "count_rooms" => $this->doituong->countRooms(),
            "count_bookedrooms" =>  $this->doituong->countBookedRooms(),
            "count_students" =>  $this->doituong->countStudents(),
            "count_newmessage" => $this->doituong->countNewMessage()
            ]);
        }

        public function invalidate_reservation($masv, $sophong){
            $this->view("admin_index",["page"=>"index",
            "result_invalid" => $this->doituong->invalidation($masv),
            "list_sv"=> $this->doituong->getListSV(),
            "count_rooms" => $this->doituong->countRooms(),
            "count_bookedrooms" =>  $this->doituong->countBookedRooms(),
            "count_students" =>  $this->doituong->countStudents(),
            "count_newmessage" => $this->doituong->countNewMessage()
            ]);

            $num_people_room = $this->doituong->count_Roomer($sophong);
            if($num_people_room == true){
                $update_Room_Status = $this->doituong->updateStatusRoom($sophong);
            }
        }

        public function getallNewMessage(){
            $this->view("admin_index",["page"=>"newmessage",
            "get_NewMessage" => $this->doituong->getNewMessage(),
            "count_newmessage" => $this->doituong->countNewMessage()
            ]);
        }

        public function detailMessage($maTN){
            $this->view("admin_index",["page"=>"view_Message",
            "update_MessStatus" => $this->doituong-> updateMessStatus($maTN),
            "get_oneMess" => $this->doituong-> getoneMess($maTN),
            "count_newmessage" => $this->doituong->countNewMessage()
            ]);
        }

        public function deleteMess($maTN){
            $this->view("admin_index",["page"=>"oldmessage",
            "delete_Mess" => $this->doituong->deleteMessage($maTN),
            "get_OldMessage" => $this->doituong->getOldMessage(),
            "count_newmessage" => $this->doituong->countNewMessage()
            ]);
        }

        public function getallOldMessage(){
            $this->view("admin_index",["page"=>"oldmessage",
            "get_OldMessage" => $this->doituong->getOldMessage(),
            "count_newmessage" => $this->doituong->countNewMessage()
            ]);
        }

        public function interface_addNewStudent(){
            $this->view("admin_index",["page"=>"add_student",
            "list_AvailableRooms" => $this->doituong->listAvailableRooms(),
            "count_newmessage" => $this->doituong->countNewMessage()
            ]);
        }

        public function addNewStudent (){
            if(isset($_POST["btnSave"])){
                echo "<script>console.log(1)</script>";
                $name = $_POST["txtName"];
                $Phone = $_POST["txtNumPhone"];
                $Id = $_POST["txtId"];
                $Home = $_POST["txtHomeTown"];
                $Address = $_POST["txtAddress"];
                $School = $_POST["txtSchool"];
                $Room = $_POST["sltNumRoom"];
                $Checkin = $_POST['dateCheckin'];
                if(empty($name)||empty($Phone)||empty($Address)||empty($Home)||empty($School)||empty($Checkin)||empty($Id)){
                    $result = false;
                }
                else{
                    $arrNgayNhan = explode("-", $Checkin);
                    $Checkin = $arrNgayNhan[2]."/".$arrNgayNhan[1]."/".$arrNgayNhan[0];
                    $SoSV = $this->doituong2->countSV();
                    //echo $SoPhong;
                    $SoSV = chop($SoSV,'"}]');
                    $SoSV = ltrim($SoSV,'[{"SoSV":"');
                    $SoSV = (int)$SoSV;
                    $MaSV = '';
                    if($SoSV < 9){
                        $MaSV = "SV00".''.($SoSV+1);
                    }
                    else{
                        $MaSV = "SV0".''.($SoSV+1);
                    }
                
                    $result = $this->doituong->add_NewStudent($MaSV, $name, $Phone, $Id, $Home, $Address, $School, $Room, $Checkin);
                //echo '<script>console.log('.$name.')</script>';
                }
                $this->view("admin_index",["page"=>"add_student",
                "count_newmessage" => $this->doituong->countNewMessage(),
                "list_AvailableRooms" => $this->doituong->listAvailableRooms(),
                "result"=>$result
                ]);
            }
        }

        public function interface_listStudents(){
            $this->view("admin_index",["page"=>"list_students",
            "count_newmessage" => $this->doituong->countNewMessage(),
            "list_students" => $this->doituong->getValidedStutents()
            ]);
        }

        public function view_Student($maSV){
            $this->view("admin_index",["page"=>"view_detailstudents",
            "count_newmessage" => $this->doituong->countNewMessage(),
            "list_AvailableRooms" => $this->doituong->listAvailableRooms(),
            "get_detailStudent" => $this->doituong->getdetailStudent($maSV)
            ]);
        }

        public function updateStudent($maSV){
            if(isset($_POST["btnSave"])){
                $HoTen = $_POST['txtName'];
                $SDT = $_POST['txtNumPhone'];
                $CCCD = $_POST['txtId'];
                $DC = $_POST['txtAddress'];
                $QueQuan = $_POST['txtHomeTown'];
                $Truong = $_POST['txtSchool'];
                $SoPhong = $_POST['sltNumRoom'];
                $NgayNhan = $_POST['dateCheckin'];
                $result='';
                if(empty($HoTen)||empty($SDT)||empty($DC)||empty($QueQuan)||empty($Truong)||empty($NgayNhan)||empty($CCCD)){
                    $result = false;
                }
                else{
                    if (strpos($NgayNhan, '-') != false) {
                        $arrNgayNhan = explode("-", $NgayNhan);
                        $NgayNhan = $arrNgayNhan[2]."/".$arrNgayNhan[1]."/".$arrNgayNhan[0];
                    }
                    
                    $result = $this->doituong->updateInfoStudent($maSV, $HoTen, $SDT, $CCCD, $DC, $QueQuan, $Truong, $SoPhong, $NgayNhan);

                    $ChangeSttRoom = $this->doituong2->BookedRoom($SoPhong);
                }
                $this->view("admin_index",["page"=>"list_students",
                "count_newmessage" => $this->doituong->countNewMessage(),
                "list_students" => $this->doituong->getValidedStutents(),
                "result_update"=>$result
            ]);
            }
        }

        public function delete_student($maSV, $soPhong){
            $result = $this->doituong->deleteStudent($maSV);

            $this->view("admin_index",["page" => "list_students",
            "count_newmessage" => $this->doituong->countNewMessage(),
            "list_students" => $this->doituong->getValidedStutents(),
            "result_remove"=> $result
            ]);
            $num_people_room = $this->doituong->count_Roomer($soPhong);
            if($num_people_room == true){
                $update_Room_Status = $this->doituong->updateStatusRoom($soPhong);
            }
        }

        public function interface_addNewRoom(){
            $this->view("admin_index",["page"=>"add_room",
            "count_newmessage" => $this->doituong->countNewMessage(),
            "count_numberRooms" => $this->doituong->countNumberRooms()
            ]);
        }

        public function add_NewRoom(){
            if(isset($_POST["btnAdd"])){
                $sophong = $_POST["numRoom"];
                $succhua = $_POST["sltAccommodation"];
                $kindroom = $_POST["sltKindroom"];
                $stt = $_POST["sltStt"];
                $price = $_POST["txtPrice"];
                $string = $_POST["sltString"];
                $result='';
                if(empty($price)){
                    $result = false;
                }
                else{
                    //echo $soPhong;
                    $result = $this->doituong->addNewRoom($sophong, $succhua, $kindroom, $stt, $price, $string);
                }
                $this->view("admin_index",["page"=> "add_room",
                "result"=>$result,
                "count_newmessage" => $this->doituong->countNewMessage(),
                "count_numberRooms" => $this->doituong->countNumberRooms()
                ]);
            }
        }

        public function interface_listRooms(){
            $this->view("admin_index",["page"=>"list_rooms",
            "count_newmessage" => $this->doituong->countNewMessage(),
            "list_rooms" => $this->doituong->listRooms()
            ]);
        }

        public function view_Room($soPhong)
        {
            $this->view("admin_index",["page"=>"view_detailrooms",
            "count_newmessage" => $this->doituong->countNewMessage(),
            "get_detailRoom" => $this->doituong->getdetailRoom($soPhong)
            ]);
        }

        public function update_InfoRoom(){
            if(isset($_POST["btnSave"])){
                $sophong = $_POST["numRoom"];
                $succhua = $_POST["sltAccommodation"];
                $kindroom = $_POST["sltKindroom"];
                $stt = $_POST["sltStt"];
                $price = $_POST["txtPrice"];
                $string = $_POST["sltString"];
                $result='';
                if(empty($price)){
                    $result = false;
                }
                else{
                    $result = $this->doituong->updateInfoRoom($sophong, $succhua, $kindroom, $stt, $price, $string);
                }
                $this->view("admin_index",["page"=>"list_rooms",
                "count_newmessage" => $this->doituong->countNewMessage(),
                "list_rooms" => $this->doituong->listRooms(),
                "result_update"=>$result
            ]);
            }
        }
        
        public function delete_room($soPhong){
            $result = $this->doituong->deleteRoom($soPhong);
            $this->view("admin_index",["page"=>"list_rooms",
            "count_newmessage" => $this->doituong->countNewMessage(),
            "list_rooms" => $this->doituong->listRooms(),
            "result_delete"=>$result
            ]);
        }

        public function interface_listReceipts(){
            $result = '';
            $get_Year = $this->doituong->getYear();
            $Years = json_decode($get_Year, true);
            $current_Year = date('Y');  
            foreach ($Years as $row) {
                if($current_Year == ($row['Nam']+1)){
                    $ma = 'HD01'.date('Y');
                    $month = 1;
                    $name = 'Hóa đơn tháng 1';
                    $year = date('Y');
                    $result = $this->doituong->addNewRecript($ma, $month, $name, $year);
                    break;
                }
                if($current_Year == $row['Nam']){
                    $current_Month = date('n');
                    if($current_Month ==  ($row['Thang']+1)){
                        $ma = 'HD'.date('m').date('Y');
                        $month = date('n');
                        $name = 'Hóa đơn tháng '.date('n');
                        $year = date('Y');
                        $result = $this->doituong->addNewRecript($ma, $month, $name, $year);
                        break;
                    }
                }
            }

             $this->view('admin_index',['page'=>'list_receipt',
            "count_newmessage" => $this->doituong->countNewMessage(),
            "list_receipts" => $this->doituong->listReceipts()]);
        }

        public function interface_detail_listReceipts(){
            $this->view('admin_index',["page"=>"list_detailreceipts",
            "count_newmessage" => $this->doituong->countNewMessage(),
            "detail_receipts" => $this->doituong->detailReceipts()
            ]);
        }

        public function view_Receipt($ma){
            $this->view('admin_index',["page"=>"view_detailReceipt",
            "count_newmessage" => $this->doituong->countNewMessage(),
            "get_detailReceipt" => $this->doituong->getdetailReceipt($ma)
            ]);
        }

        public function update_InfoReceipt($ma)
        {
            if(isset($_POST["btnSave"])){
                $sophong = $_POST["numRoom"];
                $numelectric = $_POST["txtNumElectric"];
                $numwater = $_POST["txtNumWater"];
                $cleaning = $_POST["txtCleaning"];
                $safe = $_POST["txtSafe"];
                $debt = $_POST["txtDebt"];
                $note = $_POST["txtNote"];
                $result='';
                if(empty($numelectric)||empty($numwater)||empty($cleaning)||empty($safe)){
                    $result = false;
                }
                else{
                    $thangnam = $_POST["txtMonthYear"];
                    $arr_monthyear = [];
                    $arr_monthyear = explode('/',$thangnam);
                    $thang = $arr_monthyear[0];
                    $nam = $arr_monthyear[1];
                    $result = $this->doituong->updateInfoReceipt($ma, $sophong, $numelectric, $numwater, $cleaning, $safe, $debt, $note);
                }
                $this->view("admin_index",["page"=>"list_detailreceipts",
                "count_newmessage" => $this->doituong->countNewMessage(),
                "detail_receipts" => $this->doituong->detailReceipts(),
                "result_update"=>$result
            ]);
            }
        }

        public function delete_receipt($ma){
            $result = $this->doituong->deleteReceipt($ma);
            $this->view("admin_index",["page"=>"list_detailreceipts",
            "count_newmessage" => $this->doituong->countNewMessage(),
            "detail_receipts" => $this->doituong->detailReceipts(),
            "result_delete"=>$result
            ]);
        }

        public function interface_add_detail_listReceipts(){
            $this->view("admin_index",["page"=>"add_cthd",
            "count_newmessage" => $this->doituong->countNewMessage(),
            "get_receipts" => $this->doituong->getReceipts(),
            "get_rooms" => $this->doituong->listRooms()
            ]);
        }

        public function add_NewdetailReceipt(){
            if(isset($_POST["btnAdd"])){
                $sophong = $_POST["sltNumroom"];
                $numelectric = $_POST["txtNumElectric"];
                $numwater = $_POST["txtNumWater"];
                $cleaning = $_POST["txtClean"];
                $safe = $_POST["txtSafe"];
                $price = $_POST["txtPrice"];
                $debt = $_POST["txtDebt"];
                $note = $_POST["txtNote"];
                $result='';
                
                if(empty($numelectric)||empty($numwater)||empty($cleaning)||empty($safe)){
                    $result = false;
                }
                else{
                    $arrsophong = explode("/", $sophong);
                    $sophong = $arrsophong[0];
                    $ma = $_POST["sltMa"];
                    echo $debt;
                    $result = $this->doituong->addNewdetailReceipt($ma, $sophong, $numelectric, $numwater, $cleaning, $price, $safe, $debt, $note);
                }
                $this->view("admin_index",["page"=>"list_detailreceipts",
                "count_newmessage" => $this->doituong->countNewMessage(),
                "detail_receipts" => $this->doituong->detailReceipts(),
                "result_add"=>$result
            ]);
            }
        }

        public function interface_export_exl_file_Receipts(){
            $this->view('admin_index',['page'=>'export_receipts',
            "count_newmessage" => $this->doituong->countNewMessage(),
            "get_years"=> $this->doituong->getYears()]);
        }

        public function export_receipts(){
            $result_ck = '';
            $k = false;
            if(isset($_POST["btnDownload"])){
                $month = $_POST["sltMonths"];
                $year = $_POST["sltYears"];
                if($month < 10){
                    $ma1 = 'HD'.'0'.$month.$year;
                    $ma2 = 'HD'.'0'.($month-1).$year;
                }
                else{ 
                    $ma1 = 'HD'.$month.$year;
                    $ma2 = 'HD'.($month-1).$year;
                }
                $result_ck = $this->doituong->check_time($year, $month);
                // echo $ma1;
                // echo $ma2;
                try {
                if($result_ck == false){
                    $this->view('admin_index',['page'=>'export_receipts',
                    "count_newmessage" => $this->doituong->countNewMessage(),
                    "get_years"=> $this->doituong->getYears(),
                    "result_check_time"=> $result_ck]);
                }else{
                    
                    $k = true;
                    $objExcel = new PHPExcel;
                    $objExcel->setActiveSheetIndex(0);
                    $sheet = $objExcel->getActiveSheet()->setTitle('demo');

                    $rowCount = 0;
                    $result = $this->doituong->exportReceipt($ma1, $ma2);
                    $data = json_decode($result, true);
                    foreach ($data as $row) {
                        $rowCount++;
                        $sheet->setCellValue('A'.$rowCount, 'Các khoảng thu');
                        $sheet->setCellValue('B'.$rowCount, 'Chỉ số cũ');
                        $sheet->setCellValue('C'.$rowCount, 'Chỉ số mới');
                        $sheet->setCellValue('D'.$rowCount, 'Mức tiêu thụ');
                        $sheet->setCellValue('E'.$rowCount, 'Đơn giá');
                        $sheet->setCellValue('F'.$rowCount, 'Thành tiền');

                        $rowCount++;
                        $sheet->setCellValue('A'.$rowCount, 'Điện(Kg)');
                        $sheet->setCellValue('B'.$rowCount, $row['ChiSoDienCu']);
                        $sheet->setCellValue('C'.$rowCount, $row['ChiSoDienMoi']);
                        $sheet->setCellValue('D'.$rowCount, $row['ChiSoDienMoi']-$row['ChiSoDienCu']);
                        $sheet->setCellValue('E'.$rowCount, '2200');
                        $sheet->setCellValue('F'.$rowCount, ($row['ChiSoDienMoi']-$row['ChiSoDienCu'])*2200);

                        $rowCount++;
                        $sheet->setCellValue('A'.$rowCount, 'Nước(M3)');
                        $sheet->setCellValue('B'.$rowCount, $row['ChiSoNuocCu']);
                        $sheet->setCellValue('C'.$rowCount, $row['ChiSoNuocMoi']);
                        $sheet->setCellValue('D'.$rowCount, $row['ChiSoNuocMoi']-$row['ChiSoNuocCu']);
                        $sheet->setCellValue('E'.$rowCount, '12000');
                        $sheet->setCellValue('F'.$rowCount, ($row['ChiSoNuocMoi']-$row['ChiSoNuocCu'])*12000);

                        $rowCount++;
                        $sheet->setCellValue('A'.$rowCount, 'Dân phòng');
                        $sheet->setCellValue('B'.$rowCount, '');
                        $sheet->setCellValue('C'.$rowCount, '');
                        $sheet->setCellValue('D'.$rowCount, '');
                        $sheet->setCellValue('E'.$rowCount, '');
                        $sheet->setCellValue('F'.$rowCount, $row['danphong']);

                        $rowCount++;
                        $sheet->setCellValue('A'.$rowCount, 'Vệ sinh');
                        $sheet->setCellValue('B'.$rowCount, '');
                        $sheet->setCellValue('C'.$rowCount, '');
                        $sheet->setCellValue('D'.$rowCount, '');
                        $sheet->setCellValue('E'.$rowCount, '');
                        $sheet->setCellValue('F'.$rowCount, $row['vesinh']);

                        $rowCount++;
                        $sheet->setCellValue('A'.$rowCount, 'Tiền nợ');
                        $sheet->setCellValue('B'.$rowCount, '');
                        $sheet->setCellValue('C'.$rowCount, '');
                        $sheet->setCellValue('D'.$rowCount, '');
                        $sheet->setCellValue('E'.$rowCount, '');
                        $sheet->setCellValue('F'.$rowCount, $row['tienno']);

                        $rowCount++;
                        $sheet->setCellValue('A'.$rowCount, 'Tổng cộng');
                        $sheet->setCellValue('B'.$rowCount, '');
                        $sheet->setCellValue('C'.$rowCount, '');
                        $sheet->setCellValue('D'.$rowCount, '');
                        $sheet->setCellValue('E'.$rowCount, '');
                        $sheet->setCellValue('F'.$rowCount, ($row['ChiSoDienMoi']-$row['ChiSoDienCu'])*2200
                        + ($row['ChiSoNuocMoi']-$row['ChiSoNuocCu'])*12000 + $row['danphong'] + $row['vesinh']);
                    }
                    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
                    $filename = 'Hoa_don_nha_tro_thang_'.$month.'.xlsx';
                    $objWriter->save($filename);

                    // header('Content-Disposition: attachment;filename="export.xlsx"'); // Trả về file đính kèm
                    // header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet'); // Trả về file excel 2007 trở lên
                    // header('Content-Length: '.filesize('export.xlsx')); // Trả về dung lượng file
                    // header('Content-Transfer-Encoding: binary');
                    // header('Cache-Control: must-revalidate');
                    // header('Pragma: no-cache');
                    // readfile('export.xlsx');

                    $this->view('admin_index',[
                    "count_newmessage" => $this->doituong->countNewMessage(),
                    "get_years"=> $this->doituong->getYears(),
                    "check"=> $k,
                    "thang"=>$month
                    ]);
                    
                }
                } catch (Exception $e) {
                    echo 'Message: ' .$e->getMessage();
                }
            }
        }
    }
    
?>