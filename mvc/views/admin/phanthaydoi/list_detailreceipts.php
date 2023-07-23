<div class="container_homepage">
    <h3 class="title">Chi tiết hóa đơn.</h3>
    <table class="table is-fullwidth main_content has-text-centered" id="tbl_data">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tháng/năm</th>
                    <th>Số phòng</th>
                    <th>Chỉ số điện</th>
                    <th>Chỉ số nước</th>
                    <th>Tiền phòng</th>
                    <th>Vệ sinh</th>
                    <th>Dân phòng</th>
                    <th>Nợ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
                
                <?php
                    if(isset($data["detail_receipts"])){ 
                        $listdetailReceipts = json_decode($data["detail_receipts"], true); 
                        $stt = 1;
                ?>
            <tbody>
                <?php
                    if(!empty($listdetailReceipts)){ 
                        foreach ($listdetailReceipts as $row) {
                            echo '<tr>
                                <td>'.$stt.'</td>
                                <td>'.$row['Thang'].'/'.$row['Nam'].'</td>
                                <td>'.$row['SoPhong'].'</td>
                                <td>'.$row['ChiSoDien'].'</td>
                                <td>'.$row['ChiSoNuoc'].'</td>
                                <td>'.$row['TienPhong'].'</td>
                                <td>'.$row['VeSinh'].'</td>
                                <td>'.$row['DanPhong'].'</td>
                                <td>'.$row['TienNo'].'</td>
                                <td>
                                    <a href="./admin/view_Receipt/'.$row['MaHD'].'" 
                                    class="ti-pencil-alt"></a>
                                </td>
                            </tr>';
                            $stt++;
                        }
                    }else{
                        echo '<tr>
                            <td colspan="7">Hiện không có dữ liệu tương ứng để hiện thị.</td>
                        </tr>';
                    }
                }
                ?>
               
            </tbody>
    </table>
</div>

<script>
    function Successful(){
        swal(
                'Lưu thông tin thành công',
                '',
                'success'
        );
    }

    function Fail(){
        swal(
            'Lưu thông tin thất bại',
            'Hãy đảm bảo các trường thông tin không bị bỏ trống',
            'warning'
        );
    }

    function Successful_dlt(){
        swal(
            'Xóa thông tin thành công',
            '',
            'success'
        );
    }

    function Fail_dlt(){
        swal(
            'Xóa thông tin thất bại',
            'Hãy đảm bảo phòng này không có ai thuê',
            'warning'
        );
    }

    function Successful_add(){
        swal(
            'Thêm thông tin thành công',
            '',
            'success'
        );
    }

    function Fail_add(){
        swal(
            'Thêm thông tin thất bại',
            'Hãy đảm bảo các thông tin không bị bỏ trống hoặc thông tin này đã chưa được tạo trước đó',
            'warning'
        );
    }
</script>


<?php
     if(isset($data["result_update"])){
        if($data["result_update"]){
            echo '<script type="text/javascript">Successful();</script>';
        }else{
            echo '<script type="text/javascript">Fail();</script>';
        }
    }

    if(isset($data["result_delete"])){
        if($data["result_delete"]){
            echo '<script type="text/javascript">Successful_dlt();</script>';
        }else{
            echo '<script type="text/javascript">Fail_dlt();</script>';
        }
    }

    if(isset($data["result_add"])){
        if($data["result_add"]){
            echo '<script type="text/javascript">Successful_add();</script>';
        }else{
            echo '<script type="text/javascript">Fail_add();</script>';
        }
    }
?>