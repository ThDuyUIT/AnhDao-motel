<div class="container_homepage">
    <h3 class="title">Chi tiết thông tin sinh viên.</h3>
    <?php $infoStudent = json_decode($data["get_detailStudent"], true)?>
    <?php foreach ($infoStudent as $row ){?>
    <form action="./admin/updateStudent/<?php echo $row["MaSV"]?>" method="POST">
        <div class="form_admin">
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Họ và tên</label>
                    </div>
                    <input type="text" name="txtName" value="<?php echo $row["TenSV"]?>">
                </div>
                <div class="column">
                    <div>
                        <label>Số điện thoại</label>
                    </div>
                    <input type="text" name="txtNumPhone" value="<?php echo $row["SDT"]?>">
                </div>
            </div>      

            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>CCCD</label>
                    </div>
                    <input type="text" name="txtId" value="<?php echo $row["CCCD"]?>">
                </div>
                <div class="column">
                    <div>
                        <label>Quê quán</label>
                    </div>
                    <input type="text" name="txtHomeTown" value="<?php echo $row["QueQuan"]?>">
                </div>
            </div>
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Địa chỉ thưởng chú</label>
                    </div>
                    <input type="text" name="txtAddress" value="<?php echo $row["DiaChiThuongTru"]?>">
                </div>
                <div class="column">
                    <div>
                        <label>Sinh viên trường</label>
                    </div>
                    <input type="text" name="txtSchool" value="<?php echo $row["Truong"]?>">
                </div>
            </div>      
            <?php $listRooms = json_decode($data["list_AvailableRooms"], true)?>
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Số phòng</label>
                    </div>
                    <select name="sltNumRoom">
                        <option value="<?php echo $row["SoPhong"]?>">
                            <?php echo $row["SoPhong"]?>
                        </option>
                        <?php foreach($listRooms as $row1) {
                                if($row1["SoPhong"] != $row["SoPhong"]){
                        ?>
                            <option value="<?php echo $row1["SoPhong"]?>">
                                <?php echo $row1["SoPhong"]?>
                            </option>
                        <?php 
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="column">
                    <div>
                        <label>Ngày nhận phòng</label>
                    </div>
                    <input type="text" name="dateCheckin" class="Checkin" 
                    value="<?php echo $row["NgayNhanPhong"]?>" onclick="changetype()">
                </div>
            </div>
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <button class="button is-primary" name="btnSave">Lưu</button>
                        <a href="./admin/delete_student/<?php echo $row["MaSV"]?>/<?php echo $row["SoPhong"]?>" class="button is-danger">Xóa</a>
                    </div>
                </div>
            </div>      
        </div>
    </form>
    <?php }?>
</div>

<script>
    function Successful(){
            swal(
                'Lưu thông tin thành công',
                'Bạn có thể chỉnh sửa thông tin trong danh sách sinh viên',
                'success'
            );
        }
    
    var inputDate = document.querySelector(".Checkin");
    function changetype(){
        inputDate.type="date";
    }

    window.onclick = function(event) {
        if (event.target != inputDate) {
            inputDate.type="text";
        }
    }

</script>

<?php
    if(isset($data["result"])){
        if($data["result"]){
            echo '<script type="text/javascript">Successful();</script>';
        }
    }
?>
