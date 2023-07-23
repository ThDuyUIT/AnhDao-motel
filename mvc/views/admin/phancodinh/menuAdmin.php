
    <div class="container_menu">
        <aside class="menu">
            <div class="welcome_admin" align="center">
                <p>
                    <b>Xin chào quản trị viên Lê Thị Anh Đào.</b>
                    
                </p>

                <p style="margin:10px">
                    <a class="ti-share-alt" href="./admin/logout"> Đăng xuất</a>
                </p>
            </div>

            <a href="" class="menu-lable">
                <span class="ti-layout"></span>
                <b> Trang chủ</b>
            </a>

            <p>
                <span class="ti-comment"></span>
                <b class="menu-lable">Tin nhắn</b>
            </p>
            <?php $listNewMessage = json_decode($data["count_newmessage"], true)?>
            <?php foreach ($listNewMessage as $row) {?>
            <ul class="menu-list">
                <li>
                    <a href="./admin/getallNewMessage" data-countMess="<?php echo $row["TinNhanMoi"]?>" class="newMess">
                        Tin nhắn mới 
                        <span class="circleNumber">
                            <?php echo $row["TinNhanMoi"]?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="./admin/getallOldMessage">
                        Tin nhắn đã đọc
                    </a>
                </li>
            </ul>
            <?php }?>
            <p>
                <span class="ti-id-badge"></span>
                <b class="menu-lable">Sinh viên</b>
            </p>
            <ul class="menu-list">
                <li><a href="./admin/interface_addNewStudent">Thêm sinh viên </a></li>
                <li><a href="./admin/interface_listStudents">Danh sách sinh viên</a></li>
            </ul>

            <p>
                <span class="ti-home"></span>
                <b class="menu-lable">Phòng</b>
            </p>
            <ul class="menu-list">
                <li><a href="./admin/interface_addNewRoom">Thêm phòng mới </a></li>
                <li><a href="./admin/interface_listRooms">Danh sách phòng</a></li>
            </ul>

            <p>
                <span class="ti-home"></span>
                <b class="menu-lable">Hóa đơn</b>
            </p>
            <ul class="menu-list">
                <li><a href="./admin/interface_listReceipts">Danh sách hóa đơn</a></li>
                <li><a href="./admin/interface_detail_listReceipts">Chi tiết hóa đơn</a></li>
                <li><a href="./admin/interface_add_detail_listReceipts">Thêm Chi tiết hóa đơn</a></li>
                <li><a href="./admin/interface_export_exl_file_Receipts">Xuất hóa đơn</a></li>
            </ul>
        </aside>
    </div>

    <script>
        var totalNewMess = document.querySelector(".newMess");
        console.log(totalNewMess)
        var numberNewMess = document.querySelector(".circleNumber");
        if(totalNewMess.getAttribute("data-countMess") == 0){
            numberNewMess.style.display = "none";
        }
    </script>