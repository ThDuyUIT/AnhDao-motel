<style>
    .box{
        padding: 60px 30px 60px 30px;
    }
</style>
<?php $listNewMessage = json_decode($data["count_newmessage"], true)?>
<?php 
    $totalRooms = json_decode($data["count_rooms"],true);
    $totalBookedRooms = json_decode($data["count_bookedrooms"],true);
    $totalStudents = json_decode($data["count_students"],true);
?>
<div class="container_homepage">
    <div class= "columns is-mobile estimation_part">
        <?php foreach ($totalRooms as $row){
                foreach ($totalBookedRooms as $row1){
        ?>
        <div class="column is-3 box_calculation">
            <div class="box has-background-danger">
                <h1>
                    <b> 
                        Số phòng thuê: 
                        <?php echo $row1["SPThue"].'/'.$row["TongSP"].' phòng'?>
                    </b>
                </h1>
            </div>
        </div>
        <?php 
            }
        }
        ?>
        <div class="column is-1"></div>
        <div class="column is-3 box_calculation">
            <?php foreach ($totalStudents as $row){ ?>
                <div class="box has-background-link">
                    <h1>
                        <b> 
                            Số sinh viên: 
                            <?php echo $row["TongSV"].' sinh viên'?>
                        </b>
                    </h1>
                </div>
            <?php }?>
        </div>
        <div class="column is-1"></div>
        <div class="column is-3 box_calculation">
            <div class="box has-background-primary">
                <h1><b> Tổng số tiền: </b></h1>
            </div>
        </div>
    </div>

    <table class="table is-fullwidth main_content  has-text-centered" id="tbl_data">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và Tên</th>
                <th>SĐT</th>
                <th>Trường</th>
                <th>Số phòng</th>
                <th>Ngày nhận phòng</th>
                <th>Xác nhận</th>
            </tr>
        </thead>

        <?php 
            if(isset($data["list_sv"])){
                $list_sv = json_decode($data["list_sv"], true); 
                $stt = 1;
        ?>
        <tbody>
            <?php 
                if(!empty($list_sv)){
                    foreach ($list_sv as $row) {
                        echo '<tr>
                                <td>'.$stt.'</td>
                                <td>'.$row["TenSV"].'</td>
                                <td>'.$row['SDT'].'</td>
                                <td>'.$row['Truong'].'</td>
                                <td>'.$row['SoPhong'].'</td>
                                <td>'.$row['NgayNhanPhong'].'</td>
                                <td>
                                    <form action="./admin/demo" method="POST">
                                        <a class="ti-check accept_btn" onclick="validate_action(\''.$row['MaSV'].'\')"></a>
                                        <a class= "ti-close delete_btn" onclick="invalidate_action(\''.$row['MaSV'].'\', \''.$row['SoPhong'].'\')"></a>
                                    </form>
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
    function validate_action(maSV) {
        swal({
            title: "Hãy chắc rằng bạn đã nhận đủ tiền đặt cọc nhe!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willValid) => {
            if (willValid) {
                swal("Bạn đã xác nhận thành công.", {
                    icon: "success",
                }).then(()=>{window.location.href = "./admin/validate_reservation/" + maSV;});
                
            }else {
                swal("Thao tác xác nhận của bạn đã được thu hồi");
            }
        });
        
    }

    function invalidate_action(maSV, soPhong) {
        swal({
            title: "Bạn muôn hủy xác nhận này!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willInvalid) => {
            if (willInvalid) {
                swal("Bạn đã hủy thành công.", {
                    icon: "success",
                }).then(()=>{window.location.href = "./admin/invalidate_reservation/" + maSV + "/" + soPhong;});
                
            }else {
                swal("Thao tác hủy của bạn đã được thu hồi");
            }
        });
        
    }
</script>