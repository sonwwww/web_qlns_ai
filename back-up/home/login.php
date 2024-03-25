<?php
session_start();
include('./database/connectdb.php');
?>
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
                <div class="Modal_khoi_item" id="pick-cty">
                    <img src="./images/Home_fill.png" />
                    <span>Công ty</span>
                </div>
                <div class="Modal_khoi_item" id="pick-uv">
                    <img src="./images/User_alt_fill.png" />
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
                <div class="icon-out" type="bottom"></div>
                <p>Tài khoản nhân viên</p>
            </div>
            <form id="formSignIn" method="POST" class="form-tk" data-gtm-form-interact-id="0">
                <div class="form_uv">
                    <i class="email_lg"></i>
                    <input class="form-control" type="text" id="user_email" name="email_user" value=""
                        placeholder="Nhập tài khoản đăng nhập" />
                </div>
                <div class="form_uv">
                    <i class="pass_lg"></i>
                    <input class="form-control" type="password" maxlength="20" id="user_password_first"
                        name="password_first_user" placeholder="Nhập mật khẩu" />
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
                <div class="icon-out" type="bottom"></div>
                <p>Tài khoản công ty</p>
            </div>
            <form id="formSignIn" method="POST" class="form-tk" data-gtm-form-interact-id="0">
                <div class="form_uv">
                    <i class="email_lg"></i>
                    <input class="form-control" type="text" id="cty_email" name="email" value=""
                        placeholder="Nhập tài khoản đăng nhập" />
                </div>
                <div class="form_uv">
                    <i class="pass_lg"></i>
                    <input class="form-control" type="password" maxlength="20" id="cty_password_first"
                        name="password_first" placeholder="Nhập mật khẩu" />
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