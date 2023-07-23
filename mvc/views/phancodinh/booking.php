    <div class="container_register" id = "display_frm">
        <form action="./home_index/booking" class="frm_register" method="POST">
            <div>
                <span class="ti-close close" onclick="close_frm()"></span>
            </div>
            <br>
            <div class="title" align="center">
                <strong>Hãy đặt phòng ngay</strong>
                <hr style="background-color:#00d1b2; width:80%">

                <div class="columns is-mobile">
                    <div class="column">
                        <input type="text" name="txtFullName" placeholder="Họ và Tên">
                    </div>
                    <div class="column">
                        <input type="text" name="txtPhoneNum" placeholder="Số điện thoại">
                    </div>
                </div>

                <div class="columns is-mobile">
                    <div class="column">
                        <input type="text" name="txtHomeTown" placeholder="Quê quán">
                    </div>
                    <div class="column">
                        <input type="text" name="txtAddress" placeholder="Địa chỉ thường trú">
                    </div>
                </div>

                <div class="columns is-mobile">
                    <div class="column">
                        <input type="text" name="txtSchool" placeholder="Sinh viên trường">
                    </div>
                    <div class="column">
                        <select name="sltPerson" id="numperson1Room" onchange="check_sc()">
                            <option value="" hidden>Chọn số người/phòng</option>
                            <option value="1" id="1">1 người/phòng</option>
                            <option value="2" id="2">2 người/phòng</option>
                            <option value="3" id="3">3 người/phòng</option>
                        </select>
                    </div>
                </div>
                <?php 
                    $listroom = json_decode($data["listRooms"], true);
                ?>
                <div class="columns is-mobile">
                    <div class="column">
                        <select name="sltRoom" id="phong" onchange="handle_values()">
                            <option value="" hidden>Chọn phòng muốn thuê</option>
                            <!-- <option value="">Chọn phòng muốn thuê</option> -->
                            <?php foreach ($listroom as $row) {?>
                                <option value="<?php echo $row["SoPhong"];?>/<?php echo $row["Gia"];?>
                                -<?php echo $row["SucChua"]?>">
                                    Phòng số <?php echo $row["SoPhong"];?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="column">
                        <input type="text" id="datecheckin" name="txtCheckin" onclick="pickdate()" placeholder="Chọn ngày dự định nhận phòng">
                    </div>
                </div>

                <div class="columns is-mobile">
                    <div class="column">
                        <input type="text" placeholder="TIền cọc" readonly="readonly" id="prepay">
                    </div>
                    <div class="column">
                        <button class="button is-primary" name="btnBooking">Đặt phòng ngay</button>
                    </div>
                </div>


                <div>
                    <i style="font-size:14px">*(Vui lòng không bỏ trống thông tin nào!)</i>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        // Get the modal
        var disappear = document.getElementById('display_frm');
        var inputDate = document.getElementById("datecheckin");
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == disappear) {
                disappear.style.display = "none";
                inputDate.type = "text";
                document.querySelector('.navbar').style.display = "flex";
            }
        }

        function pickdate(){
            document.getElementById("datecheckin").type="date";
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("datecheckin").setAttribute("min", today);
        }

        function close_frm(){
            document.getElementById('display_frm').style.display="none";
            document.querySelector('.navbar').style.display = "flex";
        }

        function handle_values(){
            var stringValue = document.getElementById("phong").value;
            var priceRoom = stringValue.slice(stringValue.indexOf("/")+1, stringValue.indexOf("-"));
            var capacityRoom = stringValue.slice(stringValue.indexOf("-")+1);
            document.getElementById("prepay").value = priceRoom/2 + " VND";
            console.log(capacityRoom);
            var i = 1;
            while(i<4){
                var SucChua = document.getElementById(i);
                if(capacityRoom < SucChua.value){
                    SucChua.setAttribute('hidden', '');
                }
                else{
                    SucChua.removeAttribute('hidden');
                }
                i++;
            }
        }

        function check_sc(){
            var SucChua = document.getElementById("numperson1Room");
            var options = document.getElementById("phong").options;
            console.log(options);
            for(var i = 0; i < options.length; i++){
                var capacityRoom = options[i].value.slice(options[i].value.indexOf("-")+1);
                if(capacityRoom < SucChua.value){
                    options[i].setAttribute('hidden', '');
                }
                else{
                    options[i].removeAttribute('hidden');
                }
            }
        }

        function Successful(){
            swal(
                'Đặt phòng thành công',
                'Chúng tôi sẽ sớm liên hệ với bạn.',
                'success'
            );
        }

        function Fail(){
            swal(
                'Đặt phòng thất bại',
                'Kiểm tra lại các trường thông tin.',
                'warning'
            );
        }
    </script>

    <?php
    if(isset($data["result"])){
        if($data["result"]){
            echo '<script type="text/javascript">Successful();</script>';
        }
        else{
            echo '<script type="text/javascript">Fail();</script>';
        }
    }
    ?>