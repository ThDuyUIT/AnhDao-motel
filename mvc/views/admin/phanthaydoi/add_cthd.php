<div class="container_homepage">
    <h3 class="title">Thêm chi tiết hóa đơn mới.</h3>
    <form action="./admin/add_NewdetailReceipt" method="POST">
        <div class="form_admin">
            <?php 
                $listRooms = json_decode($data["get_rooms"], true);
                $listReceipts = json_decode($data["get_receipts"], true);
            ?>
            <div class="columns container_field">
                
                <div class="column">
                    <div>
                        <label>Số phòng</label>
                    </div>
                    <select name="sltNumroom" onchange="getPrice()" id="giaphong">
                    <option value="" hidden>Chọn một phòng</option>
                    <?php foreach ($listRooms as $row) {?>
                        <option value="<?php echo $row["SoPhong"].'/'.$row["Gia"]?>"><?php echo $row["SoPhong"]?></option>
                    <?php }?>
                    </select>
                    
                </div> 
                <div class="column">
                    <div>
                        <label>Hóa đơn</label>
                    </div>
                    <select name="sltMa" id="">
                        <?php foreach ($listReceipts as $row) {?>
                            <option value="<?php echo $row["MaHD"]?>"><?php echo 'Tháng '.$row["Thang"].' năm '.$row["Nam"]?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>     

            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Chỉ số điện</label>
                    </div>
                    <input type="text" name="txtNumElectric">
                </div>
                <div class="column">
                    <div>
                        <label>Chỉ số nước</label>
                    </div>
                   <input type="text" name="txtNumWater">
                </div>
            </div>
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Tiền phòng</label>
                    </div>
                    <input type="text" name="txtPrice" id="priceroom" readonly="readonly">
                </div>
                <div class="column">
                    <div>
                        <label>Vệ sinh</label>
                    </div>
                    <input type="text" name="txtClean">
                </div>
            </div>      

            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Dân phòng</label>
                    </div>
                    <input type="text" name="txtSafe">
                </div>
                <div class="column">
                    <div>
                        <label>Tiền nợ</label>
                    </div>
                    <input type="text" name="txtDebt">
                </div>
            </div>    

            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Ghi chú</label>
                    </div>
                    <input type="text" name="txtNote">
                </div>

                <div class="column">
                </div>
            </div>    
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <button class="button is-primary" name="btnAdd">Thêm</button>
                    </div>
                </div>
            </div>      
        </div>
    </form>
</div>

<script>
    function getPrice(){
        var stringval = document.getElementById("giaphong").value;
        var priceRoom = stringval.slice(stringval.indexOf("/")+1);
        document.getElementById("priceroom").value = priceRoom;
    }
</script>