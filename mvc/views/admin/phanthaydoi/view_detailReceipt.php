<div class="container_homepage">
    <h3 class="title">Thông tin hóa đơn.</h3>
    <?php $detailReceipt = json_decode($data["get_detailReceipt"], true)?>
    <?php foreach ($detailReceipt as $row ){?>
    <form action="./admin/update_InfoReceipt/<?php echo $row['MaHD']?>" method="POST">
        <div class="form_admin">
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Tháng/năm</label>
                    </div>
                    <input type="text" name="txtMonthYear" value="<?php echo $row['Thang'].'/'.$row['Nam']?>" readonly="readonly">
                </div>
                <div class="column">
                    <div>
                        <label>Số phòng</label>
                    </div>
                    <input type="number" name="numRoom" value="<?php echo $row["SoPhong"]?>"
                    onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" readonly="readonly">
                </div>
            </div>      

            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Chỉ số điện</label>
                    </div>
                    <input type="text" name="txtNumElectric" value="<?php echo $row['ChiSoDien']?>">
                </div>
                <div class="column">
                    <div>
                        <label>Chỉ số nước</label>
                    </div>
                    <input type="text" name="txtNumWater" value="<?php echo $row['ChiSoNuoc']?>">
                </div>
            </div>
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Vệ sinh</label>
                    </div>
                    <input type="text" name="txtCleaning" value="<?php echo $row["VeSinh"]?>">
                </div>
                <div class="column">
                    <div>
                        <label>Dân phòng</label>
                    </div>
                    <input type="text" name="txtSafe" value="<?php echo $row["DanPhong"]?>">
                </div>
            </div>      

            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Tiền phòng</label>
                    </div>
                    <input type="text" name="txtNote" value="<?php echo $row["TienPhong"]?>">
                </div>
                <div class="column">
                    <div>
                        <label>Nợ</label>
                    </div>
                    <input type="text" name="txtDebt" value="<?php echo $row["TienNo"]?>">
                </div>
            </div>      

            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Ghi chú</label>
                    </div>
                    <input type="text" name="txtNote" value="<?php echo $row["GhiChu"]?>">
                </div>

                <div class="column">
                </div>
            </div>      
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <button class="button is-primary" name="btnSave">Lưu</button>
                        <a href="./admin/delete_receipt/<?php echo $row["MaHD"]?>" class="button is-danger">Xóa</a>
                    </div>
                </div>
            </div>      
        </div>
    </form>
    <?php }?>
</div>