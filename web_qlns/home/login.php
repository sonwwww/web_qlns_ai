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
        <div class="login-web">
            <div class="content_page_login_uv" id="pick-tk">
                <div class="log_content">
                    <h1>Đăng nhập tài khoản để sử dụng web</h1>
                </div>
                <div class="form-content">
                    <div class="log-header">
                        <p>Để tiếp tục đăng nhập bạn vui lòng chọn loại tài khoản</p>
                    </div>
                    <div class="Modal_content">
                        <div class="Modal_khoi_item btn_link_login" id="link_login_cty" data-type="login-cty">
                            <img src="../images/Home_fill.png" />
                            <span>Công ty</span>
                        </div>
                        <div class="Modal_khoi_item btn_link_login" id="link_login_nv" data-type="login-uv">
                            <img src="../images/User_alt_fill.png" />
                            <span>Nhân viên</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- login nhân viên -->
            <div class="content_page_login_uv" id="login-uv" style="display: none;">
                <div class="log_content">
                    <h1>Đăng nhập tài khoản nhân viên để cập nhật thông tin của bạn</h1>
                </div>
                <div class="form-content">
                    <div class="log-header">
                        <div class="icon-out btn_link_out" type="bottom"></div>
                        <p>Tài khoản nhân viên</p>
                    </div>
                    <form id="formSignInNv" method="POST" class="form-tk" data-gtm-form-interact-id="0">
                        <div class="form_uv form_group">
                            <i class="email_lg"></i>
                            <input class="form-control" type="text" id="user_email" name="email" value=""
                                placeholder="Nhập tài khoản đăng nhập" />
                        </div>
                        <div class="form_uv form_group">
                            <i class="pass_lg"></i>
                            <input class="form-control" type="password" maxlength="20" id="user_password_first"
                                name="password" placeholder="Nhập mật khẩu" />
                        </div>
                        <div style="display:none" class="login_err alert alert-danger"></div>

                        <div class="btn_login2">
                            <input class="btn_login_uv m_checkspam" id="login_uv" type="submit" name="Submit_user"
                                value="Đăng nhập" />
                            <div class="triangle-left"></div>
                            <div class="triangle-right"></div>
                        </div>
                    </form>
                    <div class="forget_pw">
                        <a href="#" title="Quên mật khẩu" class="qmk">Quên mật khẩu?</a>
                    </div>
                </div>
                <div class="log-register">
                    <p>Bạn chưa có tài khoản? <a href="#" title="Đăng ký ngay">Đăng ký ngay</a></p>
                </div>
            </div>
            <!-- login cty -->
            <div class="content_page_login_uv" id="login-cty" style="display: none;">
                <div class="log_content">
                    <h1>Đăng nhập tài khoản công ty để bắt đầu quản lý nhân viên của bạn</h1>
                </div>
                <div class="form-content">
                    <div class="log-header">
                        <div class="icon-out btn_link_out" type="bottom"></div>
                        <p>Tài khoản công ty</p>
                    </div>
                    <form id="formSignInCty" method="POST" class="form-tk" data-gtm-form-interact-id="0">
                        <div class="form_uv form_group">
                            <i class="email_lg"></i>
                            <input class="form-control" type="text" id="cty_email" name="email" value=""
                                placeholder="Nhập tài khoản đăng nhập" />
                        </div>
                        <div class="form_uv form_group">
                            <i class="pass_lg"></i>
                            <input class="form-control" type="password" maxlength="20" id="cty_password_first"
                                name="password" placeholder="Nhập mật khẩu" />
                        </div>
                        <div style="display:none" class="login_err alert alert-danger"></div>

                        <div class="btn_login2">
                            <input class="btn_login_uv m_checkspam" id="login_cty" type="submit" name="Submit"
                                value="Đăng nhập" />
                            <div class="triangle-left"></div>
                            <div class="triangle-right"></div>
                        </div>
                    </form>
                    <div class="forget_pw">
                        <a href="#" title="Quên mật khẩu" class="qmk">Quên mật khẩu?</a>
                    </div>
                </div>
                <div class="log-register">
                    <p>Bạn chưa có tài khoản? <a href="#" title="Đăng ký ngay">Đăng ký ngay</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('../includes/footer.php');
    ?>

</body>

<script src="/js/jquery-3.4.1.min.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/view.js"></script>
<script src="../js/login.js"></script>

</html>

<?php
mysqli_close($conn);
?>