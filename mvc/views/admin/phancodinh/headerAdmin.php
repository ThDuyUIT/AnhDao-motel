
    <style>
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        
    }

    .navbar{
        box-shadow: 0 2px 10px grey;
    }
    </style>

    <nav class="nav has-shadow">
        <div class="container columns">
            <div class="nav-left column is-3" align="center">
                <h3 style="width: 72%">
                    AnhDaoMotel
                </h3>
            </div>
        </div>
    </nav>
        
    <script>
        window.onscroll = function() {fixed()};

        var navbar = document.querySelector(".navbar");
        var sticky = navbar.offsetTop;

        function fixed() {
            if (window.pageYOffset > sticky) {
                navbar.classList.add("sticky");
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
