<?php
    try {
        if(isset($data["check"])){
            if($data["check"] == true){
                $filename = 'Hoa_don_nha_tro_thang_'.$data["thang"].'.xlsx';
                header('Content-Disposition: attachment;filename="' . $filename . '"'); // Trả về file đính kèm
                header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet'); // Trả về file excel 2007 trở lên
                header('Content-Length: '.filesize($filename)); // Trả về dung lượng file
                header('Content-Transfer-Encoding: binary');
                header('Cache-Control: must-revalidate');
                header('Pragma: no-cache');
                readfile($filename);
                return;
            }
        }
    } catch (Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }

    // $SQL = new mysqli('localhost','root','','AnhDaoMotel');
    // $SQL->set_charset('utf8');
    // if(mysqli_connect_errno()){
    //     echo 'Connection failed.';
    // }
    //         $result_ck = '';
    //         $k = false;
    //         if(isset($_POST["btnDownload"])){
    //             $month = $_POST["sltMonths"];
    //             $year = $_POST["sltYears"];
    //             if($month < 10){
    //                 $ma1 = 'HD'.'0'.$month.$year;
    //                 $ma2 = 'HD'.'0'.($month-1).$year;
    //             }
    //             else{ 
    //                 $ma1 = 'HD'.$month.$year;
    //                 $ma2 = 'HD'.($month-1).$year;
    //             }
    //             $result_ck = $SQL->query("SELECT * FROM hoadon WHERE Nam = '$year' AND Thang = '$month'");
    //             // while($row = mysqli_fetch_array($result_ck)){
    //             //     echo $row['Thang'];
    //             // }
    //             //echo $result_ck->num_rows;
    //             // echo $ma1;
    //             // echo $ma2;
    //             if($result_ck->num_rows <= 0){
    //                 $this->view('admin_index',['page'=>'export_receipts',
    //                 "count_newmessage" => $this->doituong->countNewMessage(),
    //                 "get_years"=> $this->doituong->getYears(),
    //                 "result_check_time"=> $result_ck]);
    //             }else{
    //                 $objExcel = new PHPExcel;
    //                 $objExcel->setActiveSheetIndex(0);
    //                 $sheet = $objExcel->getActiveSheet()->setTitle('demo');

    //                 $rowCount = 0;
    //                 $result = $SQL->query("SELECT ct1.ChiSoDien as ChiSoDienMoi, ct1.ChiSoNuoc as ChiSoNuocMoi, ct1.TienPhong as tienphong
    //                 , ct1.VeSinh as vesinh, ct1.DanPhong as danphong, ct1.TienNo as tienno, 
    //                 ct2.ChiSoDien as ChiSoDienCu, ct2.ChiSoNuoc as ChiSoNuocCu
    //                 FROM cthd ct1 join cthd ct2 WHERE ct1.SoPhong = ct2.SoPhong AND ct1.MaHD = '$ma1'
    //                 AND ct2.MaHD = '$ma2'");
    //                 //$data = json_decode($result, true);
    //                 while ($row = mysqli_fetch_array($result)) {
    //                     //$rowCount++;
    //                     $sheet->setCellValue('A'.$rowCount, 'Các khoảng thu');
    //                     $sheet->setCellValue('B'.$rowCount, 'Chỉ số cũ');
    //                     $sheet->setCellValue('C'.$rowCount, 'Chỉ số mới');
    //                     $sheet->setCellValue('D'.$rowCount, 'Mức tiêu thụ');
    //                     $sheet->setCellValue('E'.$rowCount, 'Đơn giá');
    //                     $sheet->setCellValue('F'.$rowCount, 'Thành tiền');

    //                     $rowCount++;
    //                     $sheet->setCellValue('A'.$rowCount, 'Điện(Kg)');
    //                     $sheet->setCellValue('B'.$rowCount, $row['ChiSoDienCu']);
    //                     $sheet->setCellValue('C'.$rowCount, $row['ChiSoDienMoi']);
    //                     $sheet->setCellValue('D'.$rowCount, $row['ChiSoDienMoi']-$row['ChiSoDienCu']);
    //                     $sheet->setCellValue('E'.$rowCount, '2200');
    //                     $sheet->setCellValue('F'.$rowCount, ($row['ChiSoDienMoi']-$row['ChiSoDienCu'])*2200);

    //                     $rowCount++;
    //                     $sheet->setCellValue('A'.$rowCount, 'Nước(M3)');
    //                     $sheet->setCellValue('B'.$rowCount, $row['ChiSoNuocCu']);
    //                     $sheet->setCellValue('C'.$rowCount, $row['ChiSoNuocMoi']);
    //                     $sheet->setCellValue('D'.$rowCount, $row['ChiSoNuocMoi']-$row['ChiSoNuocCu']);
    //                     $sheet->setCellValue('E'.$rowCount, '12000');
    //                     $sheet->setCellValue('F'.$rowCount, ($row['ChiSoNuocMoi']-$row['ChiSoNuocCu'])*12000);

    //                     $rowCount++;
    //                     $sheet->setCellValue('A'.$rowCount, 'Dân phòng');
    //                     $sheet->setCellValue('B'.$rowCount, '');
    //                     $sheet->setCellValue('C'.$rowCount, '');
    //                     $sheet->setCellValue('D'.$rowCount, '');
    //                     $sheet->setCellValue('E'.$rowCount, '');
    //                     $sheet->setCellValue('F'.$rowCount, $row['danphong']);

    //                     $rowCount++;
    //                     $sheet->setCellValue('A'.$rowCount, 'Vệ sinh');
    //                     $sheet->setCellValue('B'.$rowCount, '');
    //                     $sheet->setCellValue('C'.$rowCount, '');
    //                     $sheet->setCellValue('D'.$rowCount, '');
    //                     $sheet->setCellValue('E'.$rowCount, '');
    //                     $sheet->setCellValue('F'.$rowCount, $row['vesinh']);

    //                     $rowCount++;
    //                     $sheet->setCellValue('A'.$rowCount, 'Tiền nợ');
    //                     $sheet->setCellValue('B'.$rowCount, '');
    //                     $sheet->setCellValue('C'.$rowCount, '');
    //                     $sheet->setCellValue('D'.$rowCount, '');
    //                     $sheet->setCellValue('E'.$rowCount, '');
    //                     $sheet->setCellValue('F'.$rowCount, $row['tienno']);

    //                     $rowCount++;
    //                     $sheet->setCellValue('A'.$rowCount, 'Tổng cộng');
    //                     $sheet->setCellValue('B'.$rowCount, '');
    //                     $sheet->setCellValue('C'.$rowCount, '');
    //                     $sheet->setCellValue('D'.$rowCount, '');
    //                     $sheet->setCellValue('E'.$rowCount, '');
    //                     $sheet->setCellValue('F'.$rowCount, ($row['ChiSoDienMoi']-$row['ChiSoDienCu'])*2200
    //                     + ($row['ChiSoNuocMoi']-$row['ChiSoNuocCu'])*12000 + $row['danphong'] + $row['vesinh']);
    //                 }
    //                 $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    //                 $filename = 'export.xlsx';
    //                 $objWriter->save($filename);

    //                 header('Content-Disposition: attachment;filename="' . $filename . '"'); // Trả về file đính kèm
    //                 header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet'); // Trả về file excel 2007 trở lên
    //                 header('Content-Length: ' . filesize($filename)); // Trả về dung lượng file
    //                 header('Content-Transfer-Encoding: binary');
    //                 header('Cache-Control: must-revalidate');
    //                 header('Pragma: no-cache');
    //                 readfile($filename);
    //                 return;
    //             }
    //         }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="http://localhost:8000/NhatroAnhDao/admin">
    <link rel="stylesheet" href="/NhatroAnhDao/public/assets/css/phancodinhAdmin.css">
    <link rel="stylesheet" href="/NhatroAnhDao/public/assets/css/phanthaydoiAdmin.css">
    <link rel="stylesheet" href="/NhatroAnhDao/public/assets/fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <!-- include datatable -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bulma.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bulma.min.css">
    <script src="public/assets/js/table_data.js"></script>
    <!-- end include datatable -->
    <!-- include sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- end include sweetalert -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- header admin -->
    <?php //require_once("./mvc/views/admin/phancodinh/headerAdmin.php");?>
    <!-- end header amin -->

    <div class="columns is-mobile" style="margin:0px">
        <div class="column is-2" style="padding: 0px">
        <!-- menu admin -->
        <?php require_once("./mvc/views/admin/phancodinh/menuAdmin.php");?>
        <!-- end menu admin -->
        </div>

        <div class="column container_main_content">
        <?php require_once("./mvc/views/admin/phanthaydoi/".$data["page"].".php");?>
        </div>
    </div>
    
    
    <!-- footer admin -->
    <?php require_once("./mvc/views/admin/phancodinh/footerAdmin.php");?>
    <!-- end footer admin -->
</body>
</html>