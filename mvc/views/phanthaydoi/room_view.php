
    <div class="banner_head_page" >
        <div class="add_blur">
            <div class="content" align ="center">
                <div class="name_page">Room</div>
                <div class="link">
                    <a href="./home_index" class = "pre">Home</a>
                    <span class="ti-arrow-right"></span>
                    <span class="now">Room</span>   
                </div>
            </div>
        </div>
    </div>

    <div class="columns img_chart_rooms" align="center">
        <div class="column is-1"></div>
        <div class="column">
            <div class="title"><span class="ti-direction-alt"></span> Sơ đồ các phòng</div>
            <hr style="background-color: #00d1b2; width:30%">
            <img src="/NhatroAnhDao/public/assets/images/chart_rooms.png" alt="">
        </div>
        <div class="column is-1"></div>
    </div>
    
    <div class="chart_rooms">
        <?php $listroomLine1 = json_decode($data["listRoomsLine1"], true);?>
        <div class="columns"> 
            <div class="column is-1"></div>    
            <div class="column title ti-home"> Dãy 1:</div>
        </div>
        <div class="columns is-mobile">
            <div class="column is-1"></div>
            <?php foreach ($listroomLine1 as $row1) {?>
                <div class="column is-1 room" data-stt="<?php echo $row1["TrangThai"]?>" data-numroom=<?php echo $row1["SoPhong"]?> onclick="booking(this.getAttribute('data-numroom'))">
                    <b>
                        <?php echo "Phòng".' '.$row1['SoPhong']?>
                    </b>
                </div>
            <?php } ?>
            <div class="column is-1"></div>
        </div>
        
        <?php $listroomLine2 = json_decode($data["listRoomsLine2"], true);?>
        <div class="columns"> 
            <div class="column is-1"></div>    
            <div class="column title ti-home"> Dãy 2:</div>
        </div>
        <div class="columns is-mobile">
            <div class="column is-1"></div>
            <?php foreach ($listroomLine2 as $row2) {?>
                <div class="column is-1 room" data-stt="<?php echo $row2["TrangThai"]?>" data-numroom=<?php echo $row2["SoPhong"]?> onclick="booking(this.getAttribute('data-numroom'))">
                    <b>
                        <?php echo "Phòng".' '.$row2['SoPhong']?>
                    </b>
                </div>
            <?php } ?>
        </div>

        <?php $listroomLine3 = json_decode($data["listRoomsLine3"], true);?>
        <div class="columns"> 
            <div class="column is-1"></div>    
            <div class="column title ti-home"> Dãy 3 (phòng có gác):</div>
        </div>
        <div class="columns is-mobile">
            <div class="column is-1"></div>
            <?php foreach ($listroomLine3 as $row3) {?>
                <div class="column is-1 room" data-stt="<?php echo $row3["TrangThai"]?>" data-numroom=<?php echo $row3["SoPhong"]?> onclick="booking(this.getAttribute('data-numroom'))">
                    <b>
                        <?php echo "Phòng".' '.$row3['SoPhong']?>
                    </b>
                </div>
            <?php } ?>
            <div class="column is-1"></div>
        </div>
    </div>

    <script>
       
        var arrRoom = document.querySelectorAll('.room');
        var count = arrRoom.length;
        var i = 0;
        while(i < count){
            if(arrRoom[i].getAttribute('data-stt') == 1){
                arrRoom[i].style.background = "red";
                arrRoom[i].style.color = "white";
                arrRoom[i].setAttribute('disabled','');
            }
            else{
                if(arrRoom[i].style.background == 'red'){
                    arrRoom[i].style.background = '#00d1b2';
                    arrRoom[i].style.color = '#4a4a4a';
                    arrRoom[i].removeAttribute('disabled');
                }
            }
            i++;
        }

        function booking(numroom){
            console.log(numroom);
            document.getElementById('display_frm').style.display = "block";
            document.querySelector('.navbar').style.display = "none";
            var options = document.getElementById("phong").options;
            var numberOptions = options.length;
            //console.log(numberOptions);
            for(var i = 0; i < numberOptions;i++){
                var room = options[i].value.slice(0,options[i].value.indexOf("/"));
                var price = options[i].value.slice(options[i].value.indexOf("/")+1,options[i].value.indexOf("-"));
                var capacity = options[i].value.slice(options[i].value.indexOf("-")+1);
                if(room == numroom){
                    console.log(room)
                    options[i].setAttribute('selected','');
                    document.getElementById("prepay").value = price/2 + " VND";
                    var opts = document.getElementById("numperson1Room").options;
                    var numberChooses = opts.length;
                    for(var j = 0; j < numberChooses; j++){
                        if(opts[j].value > capacity){
                            opts[j].setAttribute('hidden','');
                        }else{
                            opts[j].removeAttribute('hidden');
                        }
                    }
                }else{
                    options[i].removeAttribute('selected');
                }
                
            }
        }
    </script>

   