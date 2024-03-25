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
        <div class="contain_register_company">
            <div class="content_register_company">
                <form class="register_form" id="formRegisterCty" method="POST">
                    <div class="one_page_qmk">
                        <div class="header_qmk">
                            <h1 class="qlc_tieude_moi">Đăng ký tài khoản công ty, chuyển đổi số nhanh, tiện ích lớn</h1>
                            <div class="qmk_avt_ic">
                                <img src="../images/one_ic_register.png" alt="">
                            </div>
                        </div>
                        <div class="ctn_form">
                            <div class="form-group">
                                <label class="form_label">Tài khoản đăng nhập <span class="cr_red">*</span></label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Nhập tài khoản đăng nhập">
                            </div>
                            <div class="form-group">
                                <label class="form_label">Tên công ty <span class="cr_red">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Nhập tên công ty của bạn">
                            </div>
                            <div class="form-group">
                                <label class="form_label">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <label class="form_label">Nhập mật khẩu <span class="cr_red">*</span></label>
                                <span class="see_log " toggle="#password-field-three"></span>
                                <input type="password" name="password" id="password" class="form-control" id="password-field-three"
                                    placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group">
                                <label class="form_label">Nhập lại mật khẩu <span class="cr_red">*</span></label>
                                <span class="see_log " toggle="#password-field-four"></span>
                                <input type="password" name="res_password" id="res_password" class="form-control" id="password-field-four"
                                    placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="form-group">
                                <label class="form_label">Địa chỉ <span class="cr_red">*</span></label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ">
                            </div>
                        </div>
                        <div class="form-butt-one">
                            <input type="submit" class="tiep_tuc_one" value="Đăng ký" id="register_cty">
                            <p class="bo_qua tex_center">
                                <a href="./register.php" class="share_clr_one">Quay lại</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include('../includes/footer.php');
    ?>

</body>
<script src="/js/jquery-3.4.1.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/register.js"></script>

</html>

<?php
mysqli_close($conn);
?>