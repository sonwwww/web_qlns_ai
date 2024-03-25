<!DOCTYPE html>

<head>
    <title>Roobi203</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="./view.css" type="text/css" />
    <!-- //font-awesome icons -->
    <script src="jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<?php

?>
<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <?php
            // header
            include('/includes/heder2.php');
            ?>
        </div>
    </div>
    <div class="page_content_website" >
        <?php 
            include('./menu_uv.php'); 
            include('./content_uv.php'); 
            include('./cham_cong_nv.php');
        ?>
        <!-- <div class="form-content tinh-luong">
            <div class="loc-cham-cong">
                <p class="title-loc">Lọc: </p>
                <div class="box-pick thang"> tháng 1</div>
                <button class="botton-loc">Lọc</button>
            </div>
        
            <form class="form-tinh-luong">
                <div class="content-box-line exp1">
                    <p class="title-content-tinh-luong">Lương</p>
                    <div class="data-luong">5000000</div>
                </div>
                <div class="content-box-line exp2">
                    <p class="title-content-tinh-luong">Phần trăm lương</p>
                    <div class="data-phan-tram-luong">100%</div>
                </div>
                <div class="content-box-line exp3">
                    <p class="title-content-tinh-luong">Tổng số công</p>
                    <div class="data-cong">27</div>
                </div>
                <div class="content-box-line exp4">
                    <p class="title-content-tinh-luong">Công thực</p>
                    <div class="data-cong-thuc">25</div>
                </div>
                <div class="content-box-line exp5">
                    <p class="title-content-tinh-luong">Thưởng</p>
                    <div class="data-thuong">200000</div>
                </div>
                <div class="content-box-line exp6">
                    <p class="title-content-tinh-luong">Phạt</p>
                    <div class="data-phat">50000</div>
                </div>
                <div class="content-box-line exp7">
                    <p class="title-content-tinh-luong">Tổng lương</p>
                    <div class="data-tong-luong">4900000</div>
                </div>
            </form>
        </div> -->
        
    </div>
    <?php
        include('/includes/footer.php');
    ?>

</body>

<!-- <script src="js/scripts.js"></script> -->
<script src="./view.js"></script>
<!-- <script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/jquery.scrollTo.js"></script> -->

</html>