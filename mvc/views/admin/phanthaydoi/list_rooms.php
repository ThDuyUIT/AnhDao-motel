<div class="container_homepage">
    <h3 class="title">Danh sách phòng.</h3>
    <table class="table is-fullwidth main_content has-text-centered" id="tbl_data">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Số phòng</th>
                    <th>Loại phòng</th>
                    <th>Dãy phòng</th>
                    <th>Sức chứa</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                </tr>
            </thead>
                
                <?php
                    if(isset($data["list_rooms"])){ 
                        $listRooms = json_decode($data["list_rooms"], true); 
                        $stt = 1;
                ?>
            <tbody>
                <?php
                    if(!empty($listRooms)){ 
                        foreach ($listRooms as $row) {
                            if($row['TrangThai'] == 0)
                                $row['TrangThai'] = "còn trống";
                            else
                                $row['TrangThai'] = "đã thuê";
                            echo '<tr>
                                <td>'.$stt.'</td>
                                <td>'.$row['SoPhong'].'</td>
                                <td>'.$row['LoaiPhong'].'</td>
                                <td>'.$row['DayPhong'].'</td>
                                <td>'.$row['SucChua'].'</td>
                                <td>'.$row['Gia'].'</td>
                                <td>'.$row['TrangThai'].'</td>
                                <td><a href="./admin/view_Room/'.$row['SoPhong'].'" class="ti-pencil-alt"></a></td>
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
                'Bạn có thể chỉnh sửa thông tin trong danh sách phòng',
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
?>