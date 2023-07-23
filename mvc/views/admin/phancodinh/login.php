
    <div class= "background_login">
        <div class="login_container" >
            <form action="./admin" class="frm_login" method="POST">
                <div class="icon_user" align="center">
                    <img src="/NhatroAnhDao/public/assets/images/user_icon.jpg">
                </div>

                <div class="content">
                    <label><b>Tên đăng nhập:</b></label>
                    <div>
                        <input type="text" placeholder="Username" name="txtUsername">
                    </div>
                </div>

                <div class="content">
                    <label><b id="lable_pass">Mật khẩu:</b></label>
                    <div>
                        <input type="text" id="Password" placeholder="Password" name="txtPass">
                        <input type="text" id="NewPassword" placeholder="New Password" style="display:none" name="txtNewPass">
                    </div>
                </div>

                <div class="content" id="contain_conform" style="display:none">
                    <label><b id="lable_pass">Mã xác nhận chính chủ:</b></label>
                    <div>
                        <input type="text" id="MaXacNhan" placeholder="Code conform" name="txtCodeConform">
                    </div>
                </div>

                <div class="content">
                    <button class="button is-success" id="login" name="btnLogin">Đăng nhập</button>
                </div>

                <div class="content" id="container_forgetPass" align="center" style="font-size:14px">
                    <div align="center">
                        <hr style="background-color: #00d1b2; width:50%; margin:0px">
                    </div>

                    <lable><b>Quên mật khẩu?</b></lable>
                    <a onclick="change_pass()"><u>Thay đổi mật khẩu.</u></a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function change_pass(){
            document.getElementById("Password").style.display="none";
            document.getElementById("NewPassword").style.display="block";
            document.getElementById("lable_pass").textContent = "Mật khẩu mới";
            document.getElementById("container_forgetPass").style.display="none";
            document.getElementById("login").textContent="Thay đổi mật khẩu";
            document.getElementById("login").name="btnChangepass";
            document.getElementById("contain_conform").style.display="block";
            document.querySelector(".frm_login").action = "./admin/change_pass";
        }

        if(document.getElementById("login").textContent=="Đăng nhập"){
            document.getElementById("login").name="btnLogin";
        }
    </script>