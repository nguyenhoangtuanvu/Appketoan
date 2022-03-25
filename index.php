<?php session_start(); 
if(!isset($_SESSION["logged"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-free-6.0.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&family=Roboto&display=swap" rel="stylesheet">
    <title>Kế Toán</title>
</head>
<body>
    <div class="grid">
        <div class="sidebar">
            <header class="sidebar-header">
                <a href="../index.html" class="sidebar-home"><i class="fa-solid fa-house"></i></a>
                <img src="assets/img/Picture1.png" alt="" class="sidebar-ketoan-img">
                <h3 class="sidebar-head">Kế Toán</h3>
            </header>
            <ul class="sidebar-work-list">
                <li class="sidebar-work-items sidebar-work-list--active">
                    <a class="sidebar-work__link"><i class="fa-solid fa-gauge-high"></i><span class="sidebar-work-title">Tổng quan</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-dollar-sign"></i><span class="sidebar-work-title">Tiền mặt</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-piggy-bank"></i><span class="sidebar-work-title">Tiền gửi</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-bag-shopping"></i><span class="sidebar-work-title">Mua hàng</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-cart-shopping"></i><span class="sidebar-work-title">Bán hàng</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-file-invoice-dollar"></i><span class="sidebar-work-title">Quản lý hóa đơn</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-store"></i><span class="sidebar-work-title">Kho</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-screwdriver-wrench"></i><span class="sidebar-work-title">Công cụ</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-car"></i><span class="sidebar-work-title">Tài sản cố định</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-building-columns"></i><span class="sidebar-work-title">Thuế</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-tag"></i><span class="sidebar-work-title">Giá thành</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-book"></i><span class="sidebar-work-title">Tổng hợp</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-money-bill-1-wave"></i><span class="sidebar-work-title">Ngân sách</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-file-invoice"></i><span class="sidebar-work-title">Báo cáo</span></a>
                </li>
                <li class="sidebar-work-items">
                    <a class="sidebar-work__link"><i class="fa-solid fa-chart-line"></i><span class="sidebar-work-title">Phân tích tài chính</span></a>
                </li>
            </ul>
        </div>
        <div class="container">
            <!-- header -->
            <?php include 'content/header.php'; ?>
            <!-- navigation start -->
            <?php include 'content/navigation.php'; ?>
            <!-- navigation end -->

            <!-- content -->
            <div class="content">
                <!-- overview -->
                <?php include 'content/overview.php';
                    // cash
                    include 'content/cash.php' ;
                    // <!-- banking -->
                    include 'content/banking.php' ;
                    //<!-- purchase -->
                    include 'content/purchase.php' ;
                    //<!-- sales -->
                    include 'content/sales.php' ;
                    //<!-- bill managin -->
                    include 'content/invoice.php' ;
                    //<!-- inventory -->
                    include 'content/inventory.php'; 
                ?>
                
                <div class="content-wrapper tool sidebar--open home-function"></div>
                <div class="content-wrapper fixed-assets sidebar--open home-function"></div>
                <div class="content-wrapper tax sidebar--open home-function"></div>
                <div class="content-wrapper price sidebar--open home-function"></div>
                <!-- general -->
                <?php include 'content/general.php' ?>
                
                <div class="content-wrapper budget sidebar--open home-function"></div>
                <div class="content-wrapper report sidebar--open home-function"></div>
                <div class="content-wrapper financial-analysis sidebar--open home-function"></div>
            </div>
        </div>
    </div>




    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="assets/JS/script.js"></script>
    <!-- <script type="text/javascript">
        var costMonth = <?php json_encode($CostMonth); ?>;
        console.log(costMonth);
    </script> -->
</script>
</body>
</html>