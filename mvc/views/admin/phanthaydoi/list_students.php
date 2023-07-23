<div class="container_homepage">
    <h3 class="title">Danh sách sinh viên.</h3>
    <table class="table is-fullwidth main_content has-text-centered" id="tbl_data">
            <thead>
                <tr>
                <th>STT</th>
                <th>Họ và Tên</th>
                <th>SĐT</th>
                <th>CCCD</th>
                <th>Trường</th>
                <th>Số phòng</th>
                <th>Ngày nhận phòng</th>
                <th>Xác nhận</th>
                <th>Sửa</th>
                </tr>
            </thead>
                
                <?php
                    if(isset($data["list_students"])){ 
                        $listStudents = json_decode($data["list_students"], true); 
                        $stt = 1;
                ?>
            <tbody>
                <?php
                    if(!empty($listStudents)){ 
                        foreach ($listStudents as $row) {
                            echo '<tr>
                                <td>'.$stt.'</td>
                                <td>'.$row['TenSV'].'</td>
                                <td>'.$row['SDT'].'</td>
                                <td>'.$row['CCCD'].'</td>
                                <td>'.$row['Truong'].'</td>
                                <td>'.$row['SoPhong'].'</td>
                                <td>'.$row['NgayNhanPhong'].'</td>
                                <td>Đã xác nhận</td>
                                <td><a href="./admin/view_Student/'.$row['MaSV'].'" class="ti-pencil-alt"></a></td>
                            </tr>';
                    
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
            'Thay đổi thông tin thành công',
            '',
            'success'
        );
    }

    function Fail(){
        swal(
            'Thay đổi thông tin thất bại',
            'Kiểm tra lại các trường thông tin.',
            'warning'
        );
    }

    function Successful_remove(){
        swal(
            'Xóa thông tin thành công',
            '',
            'success'
        );
    }

    function Fail_remove(){
        swal(
            'Xóa thông tin thất bại',
            '',
            'warning'
        );
    }
</script>

<?php
if(isset($data["result_update"])){
    if($data["result_update"]){
        echo '<script type="text/javascript">Successful();</script>';
    }
    else{
        echo '<script type="text/javascript">Fail();</script>';
    }
}

if(isset($data["result_remove"])){
    if($data["result_remove"]){
        echo '<script type="text/javascript">Successful_remove();</script>';
    }
    else{
        echo '<script type="text/javascript">Fail_remove();</script>';
    }
}
?>