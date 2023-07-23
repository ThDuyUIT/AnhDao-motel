<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="http://localhost:8000/NhatroAnhDao/home_index">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/NhatroAnhDao/public/assets/css/phancodinh.css">
    <link rel="stylesheet" href="/NhatroAnhDao/public/assets/css/phanthaydoi.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="/NhatroAnhDao/public/assets/fonts/themify-icons/themify-icons.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
    <!-- booking form -->
    <?php require_once "./mvc/views/phancodinh/booking.php"?>
    <!-- end booking form -->

    <!-- header -->
    <?php require_once("./mvc/views/phancodinh/header.php");?>
    <!-- end header -->

    <!-- web con -->
    <?php require_once "./mvc/views/phanthaydoi/".$data["page"].".php";?>
    <!-- end web con -->

    <!-- footer -->
    <?php require_once "./mvc/views/phancodinh/footer.php"?>
    <!-- end footer -->
</body>
</html>