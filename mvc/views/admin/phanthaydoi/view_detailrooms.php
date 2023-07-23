<div class="container_homepage">
    <h3 class="title">Thông tin phòng.</h3>
    <?php $infoRoom = json_decode($data["get_detailRoom"], true)?>
    <?php foreach ($infoRoom as $row ){?>
    <form action="./admin/update_InfoRoom" method="POST">
        <div class="form_admin">
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Số phòng</label>
                    </div>
                    <input type="number" name="numRoom" value="<?php echo $row["SoPhong"]?>"
                    onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" readonly="readonly">
                </div>
                <div class="column">
                    <div>
                        <label>Sức chứa tối đa</label>
                    </div>
                    <select name="sltAccommodation" id="succhua">
                        <option value="<?php echo $row["SucChua"]?>"><?php echo $row["SucChua"].' người'?></option>
                        <option value="1">1 người</option>
                        <option value="2">2 người</option>
                        <option value="3">3 người</option>
                    </select>
                </div>
            </div>      

            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Loại phòng</label>
                    </div>
                    <select name="sltKindroom" id="loaiphong">
                        <option value="<?php echo $row["LoaiPhong"]?>">
                            <?php echo $row["LoaiPhong"]?>
                        </option>
                        <option value="bình thường">Bình thường</option>
                        <option value="có gác">Có gác</option>
                    </select>
                </div>
                <div class="column">
                    <div>
                        <label>Trạng thái</label>
                    </div>
                   <select name="sltStt" id="trangthai">
                   <option value="<?php echo $row["TrangThai"]?>">
                    <?php 
                        if($row["TrangThai"] == 0)
                            echo 'Phòng còn trống';
                        else
                            echo 'Phòng đã được thuê';
                    ?>
                    </option>
                    <option value="0">Phòng còn trống</option>
                    <option value="1">Phòng đã được thuê</option>
                   </select>
                </div>
            </div>
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Giá</label>
                    </div>
                    <input type="text" name="txtPrice" value="<?php echo $row["Gia"]?>">
                </div>
                <div class="column">
                    <div>
                        <label>Dãy phòng</label>
                    </div>
                    <select name="sltString" id="day">
                        <option value="<?php echo $row["DayPhong"]?>"><?php echo 'Dãy '.$row["DayPhong"]?></option>
                        <option value="1">Dãy 1</option>
                        <option value="2">Dãy 2</option>
                        <option value="3">Dãy 3</option>
                    </select>
                </div>
            </div>      
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <button class="button is-primary" name="btnSave">Lưu</button>
                        <a href="./admin/delete_room/<?php echo $row["SoPhong"]?>" class="button is-danger">Xóa</a>
                    </div>
                </div>
            </div>      
        </div>
    </form>
    <?php }?>
</div>

<script>
    var optSC = document.getElementById("succhua").options;
    var length_optSC = optSC.length;
    for(var i=1; i<length_optSC;i++){
        if(optSC[i].value == optSC[0].value)
            optSC[i].setAttribute('hidden','');
    }

    var optLP = document.getElementById("loaiphong").options;
    var length_optLP = optLP.length;
    for(var i=1; i<length_optLP;i++){
        if(optLP[i].value == optLP[0].value)
            optLP[i].setAttribute('hidden','');
    }

    var optTT = document.getElementById("trangthai").options;
    var length_optTT = optTT.length;
    for(var i=1; i<length_optTT;i++){
        if(optTT[i].value == optTT[0].value)
            optTT[i].setAttribute('hidden','');
    }

    var optDay = document.getElementById("day").options;
    var length_optDay = optDay.length;
    for(var i=1; i<length_optDay;i++){
        if(optDay[i].value == optDay[0].value)
        optDay[i].setAttribute('hidden','');
    }
</script>