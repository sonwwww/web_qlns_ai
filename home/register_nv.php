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
    <style type="text/css">
        .formRegisterNv .group-control .form-control {
            height: auto;
        }
        .formRegisterNv .error {
            margin-left: 12px;
            margin-top: 5px;
        }
    </style>
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
        <div class="page_content_register">
            <div class="form-content-register">
                <form id="registrationForm" method="post" class="formRegisterNv">
                    <h2>Đăng ký tài khoản nhân viên</h2>
                    <div class="group-control name_m">
                        <label for="username" class="control-label"><span style="color:red">*</span>Tên nhân
                            viên:</label>
                        <div class="form-control">
                            <input type="text" id="username" name="username" value=""
                                placeholder="Nhập số tên nhân viên">
                        </div>
                    </div>
                    <div class="group-control mail_m">
                        <label for="email" class="control-label"><span style="color:red">*</span>Email:</label>
                        <div class="form-control">
                            <input type="email" id="email" name="email" placeholder="Nhập email">
                        </div>
                    </div>
                    <div class="group-control pass_m">
                        <label for="password" class="control-label"><span style="color:red">*</span>Mật khẩu:</label>
                        <div class="form-control">
                            <input type="password" id="password" name="password" value=""
                                placeholder="Nhập mật khẩu">
                        </div>
                    </div>
                    <div class="group-control repass_m">
                        <label for="password" class="control-label"><span style="color:red">*</span>Mật lại
                            khẩu:</label>
                        <div class="form-control">
                            <input type="password" id="repassword" name="repassword"
                                placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>
                    <div class="group-control id_cty_m">
                        <label for="id_cty" class="control-label"><span style="color:red">*</span>ID công ty:</label>
                        <div class="form-control">
                            <input type="text" id="id_cty" name="id_cty" placeholder="Nhập ID công ty">
                        </div>
                    </div>
                    <div class="group-control phone_m">
                        <label for="phone" class="control-label"><span style="color:red">*</span>Số điện thoại:</label>
                        <div class="form-control">
                            <input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                    <div class="group-control address_m">
                        <label for="address" class="control-label"><span style="color:red">*</span>Địa chỉ:</label>
                        <div class="form-control">
                            <input type="text" id="address" name="address" placeholder="Nhập địa chỉ">
                        </div>
                    </div>

                    <button type="submit" id="register_web">Đăng ký</button>
                    <p class="bo_qua_nv tex_center">
                        <a href="./register.php" class="share_clr_one">Quay lại</a>
                    </p>
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