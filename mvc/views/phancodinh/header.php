<div class="columns" style="margin-top: 0px; margin-left:0px; background-color:#f6f6f6">
    <div class="column is-4 check-in ti-location-pin" style="font-size: 17px; padding-left: 10px"> 13B Phó Cơ Điều phường 8 Tp.Vĩnh Long</div>
        <div class="column ti-headphone-alt" style="padding-left:0px"> Hotline: 0949508699</div>
</div>

<style>
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
    }

    .sticky .logo {
        width: 100px;
        height: 93px;
        margin-left: 15px
    }

    .sticky.navbar{
        background-color: rgba(255, 255, 255, 0.95);
    }

    .demo{
        position: fixed;
    }
</style>

<nav class="navbar">
    <h1 class="navbar-brand">
        <a class="navbar-item-img-max-height">
            <img src="/NhatroAnhDao/public/assets/images/logo.png" class = "logo">
        </a>
        <div class="navbar-burger" data-target="navbarClient" onclick="navbarmobi()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </h1>

    <div class="navbar-menu" id = "navbarClient">
        <div class="navbar-start">
            <a href="./home_index" class="navbar-item">Home</a>
            <a href="./room" class="navbar-item">Room</a>
            <a href="./contact" class="navbar-item">Contact</a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <div class="button is-primary" onclick="openRegister()">Book a room</div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
window.onscroll = function() {fixed()};

var navbar = document.querySelector(".navbar");
var sticky = navbar.offsetTop;

function fixed() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

function openRegister(){
    document.getElementById('display_frm').style.display = "block";
    document.querySelector('.navbar').style.display = "none";
}

var classActive = '';
function navbarmobi(){
    if(classActive == "is-active"){
        document.getElementById("navbarClient").classList.remove('is-active');
        classActive = ''
        return;
    }
    document.getElementById("navbarClient").classList.add('is-active');
    arrName = [];
    arrName = document.getElementById("navbarClient").className.split(' ');
    classActive = arrName[1];
}

</script>