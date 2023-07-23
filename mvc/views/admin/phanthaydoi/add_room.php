<div class="container_homepage">
    <h3 class="title">Tạo thông tin phòng mới</h3>
    <form action="./admin/add_NewRoom" method="POST">
        <div class="form_admin">
            <?php $NumberRoom = json_decode($data["count_numberRooms"], true)?>
            <?php foreach ($NumberRoom as $row) {?>
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Số phòng</label>
                    </div>
                    <input type="number" name="numRoom" value="<?php if($row["TongSP"]< 10) echo '0'.($row["TongSP"]+1)?>"
                    onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;">
                </div>
                <div class="column">
                    <div>
                        <label>Sức chứa tối đa</label>
                    </div>
                    <select name="sltAccommodation">
                        <option value="1" selected>1 người</option>
                        <option value="2">2 người</option>
                        <option value="3">3 người</option>
                    </select>
                </div>
            </div>
            <?php } ?>      

            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Loại phòng</label>
                    </div>
                    <select name="sltKindroom" id="">
                        <option value="bình thường" selected>Bình thường</option>
                        <option value="có gác">Có gác</option>
                    </select>
                </div>
                <div class="column">
                    <div>
                        <label>Trạng thái</label>
                    </div>
                   <select name="sltStt" id="">
                    <option value="0" selected>Phòng còn trống</option>
                    <option value="1">Phòng đã được thuê</option>
                   </select>
                </div>
            </div>
            
            <div class="columns container_field">
                <div class="column">
                    <div>
                        <label>Giá</label>
                    </div>
                    <input type="text" name="txtPrice">
                </div>
                <div class="column">
                    <div>
                        <label>Dãy phòng</label>
                    </div>
                    <select name="sltString" id="">
                        <option value="1" selected>Dãy 1</option>
                        <option value="2">Dãy 2</option>
                        <option value="3">Dãy 3</option>
                    </select>
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
    function print(){
    console.log(document.getElementById("demo").value)
    }

    function Successful(){
        swal(
            'Thêm thông tin thành công',
                'Bạn có thể chỉnh sửa thông tin trong danh sách phòng',
                'success'
        );
    }

    function Fail(){
        swal(
            'Thêm thông tin thất bại',
            'Hãy đảm bảo các trường thông tin không bị bỏ trống',
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