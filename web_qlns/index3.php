<?php
    include('database/connectdb.php');
    ob_start();
    session_start();
    ob_end_flush();
?>
<!DOCTYPE html>
<head>
    <title>Roobi203</title>
    <meta charset="UTF-8">
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
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="./css/view.css" type="text/css" />
    <link rel="stylesheet" href="./css/history_timekeeping.css" type="text/css" />
    <link rel="stylesheet" href="./css/register_company.css" type="text/css" />
    <link rel="stylesheet" href="./css/giaodien.css">
    <!-- //font-awesome icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <div class="log-w3" style="display: block;">
        <div class="w3layouts-main">
            <?php
            // header
            if(isset($_GET['nhan-vien'])){
                include('./includes/header3.php');
            }elseif(isset($_GET['cong-ty'])){
                include('./includes/header2.php');
            }else {
                include('./includes/header.php');
            }
            ?>
        </div>
    </div>
    <?php 
        if(isset($_GET['/'])){
            echo 111;
            echo '<div class="page_log" style="display: block;">';
                include('/home/login.php');
                //include('./home/register.php');
                //include('./home/register_company.php'); 
            echo '</div>';
        }else{
            echo '<div class="page_log" style="display: none;"></div>';
        }
    ?>
    <!-- <div class="page_content_website" style="display: block;"> -->
        
    <?php 
        if(isset($_GET['nhan-vien'])){
            echo '<div class="page_content_website" style="display: block;">';
            include('./home/menu_uv.php');
            include('./home/content_uv.php'); 
            include('./home/history_cham_cong_nv.php'); 
            include('./home/tinh_luong_nv.php');
            include('./home/content_update_face.php');
            //include('./home/update_face.php');
            echo '</div>';
        }elseif(isset($_GET['cong-ty'])){
            echo '<div class="page_content_website" style="display: block;">';
            include('./home/menu_cty.php'); 
            include('./home/history_timekeeping.php'); 
            include('./home/content_cty.php'); 
            include('./home/ql_luong.php');
            include('./home/ql_phongban.php');
            include('./home/ql_duyet.php');
            include('./home/giaodien.php');
            include('./home/ql_calamviec.php');
            include('./home/content_cham_cong.php');
            echo '</div>';
            include('./home/chamcong.php');
            $congty = $_GET['cong-ty'];
            if($congty == 'chamcong'){
                include('./home/chamcong.php');
            }

        }else{
            echo '<div class="page_log" style="display: block;">';
            include('/home/login.php');
            //include('./home/register.php');
            //include('./home/register_company.php'); 
            echo '</div>';
        }

    ?>
        
        
        
    <!-- </div> -->
    <!-- <div class="page_cham_cong">
    <video id="video" autoplay></video>
        <canvas id="canvas" width="640" height="480"></canvas>
        <img id="photo" alt="Chụp ảnh" />
        <button id="capture">Chụp Ảnh</button>
    </div> -->
    <?php
        include('./includes/footer.php');
    ?>

</body>

<script src="./js/chamcong.js"></script>
<script src="./js/view.js"></script>

</html>

<?php
mysqli_close($conn);
?>