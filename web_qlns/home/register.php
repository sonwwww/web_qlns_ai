<?php
include('../database/connectdb.php');
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
    <script>
        function confirmDelete(id) {
            var confirmation = confirm("Bạn có chắc muốn xóa?");
            if (confirmation) {
                // Chuyển hướng đến trang xử lý xóa trên server (PHP)
                window.location.href = 'delete.php?id=' + id;
            }
        }
    </script>
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="../css/view.css" type="text/css" />
    <link rel="stylesheet" href="../css/history_timekeeping.css" type="text/css" />
    <link rel="stylesheet" href="../css/register_company.css" type="text/css" />
    <link rel="stylesheet" href="../css/giaodien.css">
    <!-- //font-awesome icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="log-w3" style="display: block;">
        <div class="w3layouts-main">
            <?php
            include('../includes/header.php');
            ?>
        </div>
    </div>
    <div class="page_log" style="display: block;">
        <div class="register-web">
            <div class="content_page_login_uv" id="pick-tk">
                <div class="log_content">
                    <h1>Đăng ký tài khoản để sử dụng web</h1>
                </div>
                <div class="form-content">
                    <div class="log-header">
                        <p>Để tiếp tục đăng ký bạn vui lòng chọn loại tài khoản</p>
                    </div>
                    <div class="Modal_content">
                        <a href="./register_company.php">
                            <div class="Modal_khoi_item" id="pick-cty">
                                <img src="../images/Home_fill.png" />
                                <span>Công ty</span>
                            </div>
                        </a>
                        <a href="./register_nv.php">
                            <div class="Modal_khoi_item" id="pick-uv">
                                <img src="../images/User_alt_fill.png" />
                                <span>Nhân viên</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('../includes/footer.php');
    ?>

</body>

<script src="../js/chamcong.js"></script>
<script src="../js/view.js"></script>

</html>

<?php
mysqli_close($conn);
?>