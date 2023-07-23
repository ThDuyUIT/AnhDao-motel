<div class="container_homepage">
    <h3 class="title">Tạo thông tin sinh viên mới</h3>
    <form action="./admin/addNewStudent" method="POST">
        <div class="form_admin">
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Họ và tên</label>
                    </div>
                    <input type="text" name="txtName">
                </div>
                <div class="column">
                    <div>
                        <label>Số điện thoại</label>
                    </div>
                    <input type="text" name="txtNumPhone">
                </div>
            </div>      

            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>CCCD</label>
                    </div>
                    <input type="text" name="txtId">
                </div>
                <div class="column">
                    <div>
                        <label>Quê quán</label>
                    </div>
                    <input type="text" name="txtHomeTown">
                </div>
            </div>
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Địa chỉ thưởng chú</label>
                    </div>
                    <input type="text" name="txtAddress">
                </div>
                <div class="column">
                    <div>
                        <label>Sinh viên trường</label>
                    </div>
                    <input type="text" name="txtSchool">
                </div>
            </div>      
            <?php $listRooms = json_decode($data["list_AvailableRooms"], true)?>
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Số phòng</label>
                    </div>
                    <select name="sltNumRoom">
                        <?php foreach ($listRooms as $row) {?>
                            <option value="<?php echo $row["SoPhong"]?>">
                                <?php echo $row["SoPhong"]?>
                            </option>
                        <?php }?>
                    </select>
                </div>
                <div class="column">
                    <div>
                        <label>Ngày nhận phòng</label>
                    </div>
                    <input type="date" name="dateCheckin">
                </div>
            </div>
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <button class="button is-primary" name="btnSave">Lưu</button>
                    </div>
                </div>
            </div>      
        </div>
    </form>
</div>

<script>
    function Successful(){
            swal(
                'Lưu thông tin thành công',
                'Bạn có thể chỉnh sửa thông tin trong danh sách sinh viên',
                'success'
            );
        }
        function Fail(){
            swal(
                'Lưu thông tin thất bại',
                'Hãy đảm báo các thông tin không bị bỏ trống',
                'warning'
            );
        }
</script>

<?php
    if(isset($data["result"])){
        if($data["result"]){
            echo '<script type="text/javascript">Successful();</script>';
        }else{
            echo '<script type="text/javascript">Fail();</script>';
        }
    }
?>